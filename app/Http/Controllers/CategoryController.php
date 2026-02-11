<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = tbl_category::all();

        return view('admin.pages.category.index', compact('category'));
    }

    public function store(Request $request)
    {
        $category = new tbl_category;
        $category->category_name = $request->categoryName;
        $category->category_image = '';
        $category->category_banner_image = '';
        $category->save();

        return redirect('/admin/category');
    }

    public function remove(Request $request)
    {
        $category = tbl_category::find($request->category_id);
        $category->delete();
        return redirect('/admin/category');

    }

    public function edit(Request $request)
    {
        $category = tbl_category::find($request->category_id);
        $category->category_name = $request->categoryName;
        $category->save();
        return redirect('/admin/category');
    }
}
