<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaxController extends Controller
{
    function tax()
    {
        return view("admin.pages.tax.index");
    }
}
