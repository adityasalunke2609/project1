<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class websiteController extends Controller
{
   function dashboard()
    {
        return view("website.pages.index");
    }
}
