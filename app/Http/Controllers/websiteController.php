<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class websiteController extends Controller
{
   function index()
    {
        return view('website.pages.index');
    }
}
