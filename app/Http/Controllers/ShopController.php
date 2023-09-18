<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function home()
    {
        return view('shop',[
            "title" => "Home"
        ]);
    }

    public function about()
    {
        return view('about',[
            "title" => "About"
        ]);
    }
}
