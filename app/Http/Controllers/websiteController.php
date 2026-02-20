<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use App\Models\tbl_product;
use App\Models\tbl_subcategory;

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
