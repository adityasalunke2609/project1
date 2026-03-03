<?php

namespace App\Http\Controllers;

use App\Models\tbl_addtocart;
use App\Models\tbl_category;
use App\Models\tbl_product;
use App\Models\tbl_shipping;
use App\Models\tbl_subcategory;
use App\Models\tbl_wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class websiteController extends Controller
{
    public function index()
    {
        $products = tbl_product::all();

        return view('website.pages.index', compact('products'));
    }

    public function shop()
    {
        $products = tbl_product::all();
        $category = tbl_category::all();
        $subcategory = tbl_subcategory::all();

        return View('website.pages.shop', compact('products', 'category', 'subcategory'));
    }

    public function shopping_cart()
    {
        $cart = DB::table('tbl_addtocart')
            ->join('tbl_product', 'tbl_addtocart.product_id', '=', 'tbl_product.product_id')
            ->select(
                'tbl_addtocart.cart_id',
                'tbl_addtocart.user_id',
                'tbl_addtocart.cart_price',
                'tbl_addtocart.cart_quantity',
                'tbl_addtocart.cart_total',
                'tbl_product.*'
            )
            ->where('tbl_addtocart.user_id', auth()->id())
            ->get();

        return View('website.pages.shopping_cart', compact('cart'));
    }

    public function shop_details($id)
    {
      
            $products = tbl_product::all();
    
            return View('website.pages.shop_details', compact('products'));
    }


    public function checkout()
    {
        $cart = DB::table('tbl_addtocart')
            ->join('tbl_product', 'tbl_addtocart.product_id', '=', 'tbl_product.product_id')
            ->select(
                'tbl_addtocart.cart_id',
                'tbl_addtocart.user_id',
                'tbl_addtocart.cart_price',
                'tbl_addtocart.cart_quantity',
                'tbl_addtocart.cart_total',
                'tbl_product.*'
            )
            ->where('tbl_addtocart.user_id', auth()->id())
            ->get();

        return View('website.pages.checkOut', compact('cart'));
    }

    public function addtocheckout(Request $request)
    {
        if (! Auth::check()) {
            return redirect('/login');
        }

        $grandTotal = array_sum($request->cart_total);

        $orderMasterId = DB::table('tbl_order_master')->insertGetId([
            'order_master_user_id' => auth()->id(),
            'order_master_total' => $grandTotal,
            'order_master_payment_status' => 'pending',
            'order_master_payment_mode' => 'cash on delivery',
            'order_master_status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        foreach ($request->product_id as $key => $productId) {
            DB::table('tbl_order_child')->insert([
                'order_child_master_id' => $orderMasterId,
                'order_child_user_id' => auth()->id(),
                'order_child_product_id' => $productId,
                'order_child_cart_price' => $request->cart_price[$key],
                'order_child_cart_quantity' => $request->cart_quantity[$key],
                'order_child_cart_total' => $request->cart_total[$key],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        DB::table('tbl_addtocart')
            ->where('user_id', auth()->id())
            ->delete();

        return redirect('/checkOut');
    }

    public function placeOrder(Request $request)
    {
        if ($request->streetAddress == '') {
            return redirect('/checkOut')->with('error', 'Street address is required.');
        }
        if ($request->pinCode == '') {
            return redirect('/checkOut')->with('error', 'Pin code is required.');
        }

        $shipping = new tbl_shipping;
        $shipping->shipping_user_id = $request->userId;
        $shipping->shipping_address = $request->streetAddress;
        $shipping->shipping_pin_code = $request->pinCode;
        $shipping->save();
    }

    public function about()
    {
        return View('website.pages.about');
    }

    public function contact()
    {
        return View('website.pages.contact');
    }

    public function blog()
    {
        return View('website.pages.blog');
    }

    public function blog_details()
    {
        return View('website.pages.blog_details');
    }

    public function editprofile()
    {
        $user = auth()->user();

        return View('website.pages.editprofile', compact('user'));
    }

    public function updateprofile(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255,unique:users,email,'.auth()->id(),
        ]);
        $user = auth()->user();
        $user->name = request('name');
        $user->email = request('email');
        $user->save();

        return redirect('/')->with('success', 'Profile updated successfully.');
    }

    public function addToCart(Request $request)
    {
        $product = tbl_product::find($request->productId);
        $cart = new tbl_addtocart;
        $cart->product_id = $request->productId;
        $cart->user_id = $request->userId;
        $cart->cart_price = $product->product_sale;
        $cart->cart_quantity = $request->quantity;
        $cart->cart_total = $product->product_sale * $request->quantity;
        $cart->save();

        return redirect('/shoppingCart');
    }

    public function updateToCart(Request $request)
    {
        $cart = tbl_addtocart::find($request->cartID);
        $cart->cart_quantity = $request->quantity;
        $cart->cart_total = $request->cart_price * $request->quantity;
        $cart->save();

        return redirect('/shoppingCart');
    }

    public function removeFromCart(Request $request)
    {

        $cart = tbl_addtocart::find($request->cartID);
        if ($cart) {
            $cart->delete();
        }

        return redirect('/shoppingCart');
    }

    public function wishlist()
    {

        $wishlist = tbl_wishlist::where('wishlist_user_id', auth()->id())->get();

        return View('website.pages.wishlist', compact('wishlist'));
    }

    public function addtoWishlist(Request $request)
    {
        if (! Auth::check()) {
            return redirect('/login');
        }

        $wishlist = new tbl_wishlist;
        $wishlist->wishlist_user_id = auth()->id();
        $wishlist->wishlist_product_id = $request->product_id;
        $wishlist->save();

        return redirect('/wishlist');
    }

    public function removeFromWishlist(Request $request)
    {
        $wishlist = tbl_wishlist::find($request->wishlistId);
        $wishlist->delete();

        return redirect('/wishlist');
    }

    public function order()
    {
        if (! Auth::check()) {
            return redirect('/login');
        }

        $order = DB::table('tbl_order_child')
            ->join('tbl_order_master', 'tbl_order_child.order_child_master_id', '=', 'tbl_order_master.order_master_id')
            ->join('tbl_product', 'tbl_order_child.order_child_product_id', '=', 'tbl_product.product_id')
            ->select(
                'tbl_order_master.order_master_id as order_id',
                'tbl_order_master.order_master_status as status',
                'tbl_order_child.order_child_cart_quantity as quantity',
                'tbl_order_child.order_child_cart_total as total_price',
                'tbl_product.product_name',
                'tbl_product.product_image'
            )
            ->where('tbl_order_child.order_child_user_id', auth()->id())
            ->get();

        return view('website.pages.order', compact('order'));
    }

    public function viewOrder($id)
    {

        $orderDetails = DB::table('tbl_order_child')
            ->join('tbl_product', 'tbl_order_child.order_child_product_id', '=', 'tbl_product.product_id')
            ->where('tbl_order_child.order_child_master_id', $id)
            ->where('tbl_order_child.order_child_user_id', Auth::id())
            ->select(
                'tbl_order_child.*',
                'tbl_product.*'
            )
            ->get();

        return view('website.pages.orderDetails', compact('orderDetails'));

        return $id;
    }
}
