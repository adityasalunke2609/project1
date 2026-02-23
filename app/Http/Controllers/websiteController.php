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
            ->select('tbl_addtocart.cart_id as cart_id', 'tbl_product.*')
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

    public function addToCart(Request $request)
    {

        $cart = new tbl_addtocart;
        $cart->user_id = $request->input('user_id');
        $cart->product_id = $request->input('product_id');
        $cart->save();

        return redirect('/shoppingCart');

    }

    public function wishlist()
    {
        
        $wishlist = tbl_wishlist::where('wishlist_user_id', auth()->id())->get();
        return View('website.pages.wishlist', compact('wishlist'));
    }

    function addtoWishlist(Request $request)
    {
        $wishlist = new tbl_wishlist;
        $wishlist->wishlist_user_id = $request->input('user_id');
        $wishlist->wishlist_product_id = $request->input('product_id');
        $wishlist->save();

        return redirect('/wishlist');
    }

    public function checkout()
    {
        return View('website.pages.checkOut');
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

    
}
