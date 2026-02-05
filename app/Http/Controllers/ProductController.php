<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
     function product()
    {
        return view("admin.pages.product.index");
    }
}




