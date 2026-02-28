<?php

namespace App\Http\Controllers;

use App\Models\tbl_addtocart;
use App\Models\tbl_category;
use App\Models\tbl_product;
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

    public function blog()
    {
        return View('website.pages.blog');
    }

    public function contact()
    {
        return View('website.pages.contact');
    }

    public function about()
    {
        return View('website.pages.about');
    }

    public function shop_details()
    {
        $products = tbl_product::all();

        return View('website.pages.shop_details', compact('products'));
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


    public function removeFromCart(Request $request)
    {

        $cart = tbl_addtocart::find($request->cartID);
        if ($cart) {
            $cart->delete();
        }

        return redirect('/shoppingCart');
    }


    function addToCart(Request $request)
    {
        $product = tbl_product::find($request->productId);
        $cart = new tbl_addtocart();
        $cart->product_id = $request->productId;
        $cart->user_id = $request->userId;
        $cart->cart_price = $product->product_sale;
        $cart->cart_quantity = $request->quantity;
        $cart->cart_total = $product->product_sale * $request->quantity;
        $cart->save();
        return redirect('/shoppingCart');
    }

    public function wishlist()
    {

        $wishlist = tbl_wishlist::where('wishlist_user_id', auth()->id())->get();

        return View('website.pages.wishlist', compact('wishlist'));
    }

     function removeFromWishlist(Request $request)
    {
        $wishlist = tbl_wishlist::find($request->wishlistId);
        $wishlist->delete();
        return redirect('/wishlist');
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

    public function checkout()
    {
        return View('website.pages.checkOut');
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
}
