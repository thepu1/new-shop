<?php

namespace App\Http\Controllers;
use App\Category;
use Cart;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function checkOut(){
        $categories = Category::where('publication_status',1)->get();
        $cart_count = Cart::count();
        return view('front.checkout.check-out',[
            'categories'    => $categories,
            'cart_count'     => $cart_count
        ]);
    }

}
