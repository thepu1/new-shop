<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewShopController extends Controller
{
    public function index(){
        return view('front.home.home');
    }

    public function categoryProduct(){
        return view('front.category.category-content');
    }

    public function mailUs(){
        return view('front.mail.mail-us');
    }

    public function checkOut(){
        return view('front.checkout.check-out');
    }
}
