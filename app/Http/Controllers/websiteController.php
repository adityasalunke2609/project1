<?php

namespace App\Http\Controllers;

use App\Models\tbl_product;

class websiteController extends Controller
{
    public function index()
    {
        $products = tbl_product::all();
        return view('website.pages.index', compact('products'));
    }
    

    public function shop()
    {
        return View('website.pages.shop');
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
        return View('website.pages.shop_details');
    }

    public function shopping_cart()
    {
        return View('website.pages.shopping_cart');
    }

    public function checkout()
    {
        return View('website.pages.checkOut');
    }

    public function blog_details()
    {
        return View('website.pages.blog_details');
    }
}
