<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slide;
use Cart;
use Illuminate\Http\Request;

class NewShopController extends Controller
{
    public function index(){
        $categories = Category::where('publication_status',1)->get();
        $slides = Slide::where('publication_status',1)->get();
        $products = Product::where('publication_status',1)->orderBy('id','DESC')->take(8)
            ->get();
        $cart_count = Cart::count();
        return view('front.home.home',[
            'categories' => $categories,
            'products'  => $products,
            'slides' => $slides,
            'cart_count'     => $cart_count
        ]);
    }

    public function categoryProduct($id){
        $categories = Category::where('publication_status',1)->get();
        $products = Product::where('category_id',$id)->orderBy('id','DESC')->get();
        $cart_count = Cart::count();
        return view('front.category.category-product',[
            'categories'    => $categories,
            'products'       => $products,
            'cart_count'     => $cart_count
        ]);
    }

    public function productDetails($id){
        $categories = Category::where('publication_status',1)->get();
        $product = Product::find($id);
        $cart_count = Cart::count();
        return view('front.product.product-details',[
            'categories'    => $categories,
            'product' => $product,
            'cart_count'     => $cart_count
            ]);
    }

    public function mailUs(){
        $categories = Category::where('publication_status',1)->get();
        return view('front.mail.mail-us',[
            'categories' => $categories
        ]);
    }

    public function checkOut(){
        $categories = Category::where('publication_status',1)->get();
        $cart_count = Cart::count();
        return view('front.checkout.check-out',[
            'categories'    => $categories,
            'cart_count'     => $cart_count
        ]);
    }
}
