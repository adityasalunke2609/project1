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
        $path = public_path('uploads/category');

        $categoryimage = $request->file('categoryimage');
        $categoryname = '';
        if ($categoryimage) {
            $categoryname = time().'.png';
            $categoryimage->move($path, $categoryname);
        }

        $categoryBannerImage = $request->file('categorybannerimage');
        $categoryBannername = '';
        if ($categoryBannerImage) {
            $categoryBannername = time().'banner.png';
            $categoryBannerImage->move($path, $categoryBannername);
        }

        $category->category_name = $request->categoryName;
        $category->category_image = $categoryname;
        $category->category_banner_image = $categoryBannername;
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
