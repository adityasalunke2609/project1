<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class CategoryController extends Controller
{

    function index()
    {
        $category = tbl_category::all();

        return view("admin.pages.category.index", compact("category"));
    }

    function store(Request $request)
    {
        $category = new tbl_category();
        $category->category_name = $request->categoryName;
        $category->category_image = "";
        $category->category_banner_image = "";
        $category->save();
        return redirect("/admin/category");
    }
}
