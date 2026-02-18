<?php

namespace App\Http\Controllers;

class adminController extends Controller
{
    public function dashboard()
    {
        if (Auth()->user()->user_type == '2') {
            return redirect('/');
        } else {
            return view('admin.pages.index');
        }
    }
}
