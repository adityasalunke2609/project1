<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
  
    function subcategory()
    {
        return view("admin.pages.subcategory.index");
    }
}
