<?php

namespace App\Http\Controllers;

use App\Models\tbl_addtocart;
use App\Models\tbl_category;
use App\Models\tbl_order_child;
use App\Models\tbl_order_master;
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

    public function shop(Request $request)
    {

        $category = tbl_category::all();
        $subCategory = tbl_subcategory::all();
        $query = tbl_product::query();

        if ($request->category_id) {
            $query->where('product_caterogy_id', $request->category_id);
        }

       
        if ($request->subcategory_id) {
            $query->where('product_subcaterogy_id', $request->subcategory_id);
        }
     
        if ($request->price) {

            if ($request->price == '0-55') {
                $query->whereBetween('product_sale', [0, 55]);
            }

            if ($request->price == '55-100') {
                $query->whereBetween('product_sale', [55, 100]);
            }

        }
        
        $product = $query->get();
        
        return view('website.pages.shop', compact('product', 'category', 'subCategory'));
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

        $products = tbl_product::where('product_id', $id)->first();

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

        $orderMaster = new tbl_order_master;
        $orderMaster->order_master_user_id = $request->user_id;
        $orderMaster->order_master_total = $request->cart_total;
        $orderMaster->order_master_payment_status = 'pending';
        $orderMaster->order_master_payment_mode = 'cash on delivery';
        $orderMaster->order_master_status = 'pending';
        $orderMaster->save();

        // get all cart items for the user
        $cartItems = tbl_addtocart::where('user_id', $request->user_id)->get();

        foreach ($cartItems as $data) {

            $orderchild = new tbl_order_child;
            $orderchild->order_child_master_id = $orderMaster->order_master_id;
            $orderchild->order_child_user_id = $request->user_id;
            $orderchild->order_child_product_id = $data->product_id;
            $orderchild->order_child_cart_price = $data->cart_price;
            $orderchild->order_child_cart_quantity = $data->cart_quantity;
            $orderchild->order_child_cart_total = $data->cart_price * $data->cart_quantity;

            $orderchild->save();

        }

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

        $cart = tbl_addtocart::where('user_id', $request->userId)->get();
        foreach ($cart as $data) {
            $data->delete();
        }

        return redirect('/order');
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
        // $product = tbl_product::find($request->productId);
        $cart = tbl_addtocart::find($request->cartID);
        $cart->product_id = $request->productId;
        $cart->user_id = $request->userId;
        $cart->cart_price = $request->price;
        $cart->cart_quantity = $request->quantity;
        $cart->cart_total = $request->price * $request->quantity;
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

        $order = DB::table('tbl_order_master')
            ->where('order_master_user_id', auth()->id())
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
