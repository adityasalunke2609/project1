<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
    function category()
    {
        return view("admin.pages.category.index");
    }

    function getvalue(Request $request): RedirectResponse
    {
        $categoryName=$request->categoryName ;
        return redirect(to:"/save/$categoryName");

    }

    function save($categoryName):mixed
    {
     return $categoryName;
    }
}
