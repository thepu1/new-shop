<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use App\Category;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request){
        $product = Product::find($request->id);
        Cart::setGlobalTax($product->product_tax);
             Cart::add([
            'id'    => $request->id,
            'name'  => $product->product_name,
            'price' => $product->product_price,
            'qty'   => $request->qty,
            'weight' => 1,
            'options'   =>  [
                'image' => $product->product_image
            ],


        ]);
        return redirect('/cart/show-cart');
    }

    public function showCart(){
        $categories = Category::where('publication_status',1)->get();
        $cartProducts = Cart::content();
        $tax= Cart::tax(0);
        $total=Cart::total(0,'.',',');
        $item_total=Cart::initial(0,'.',',');
        $cart_count = Cart::count();
        return view('front.cart.show-cart',[
            'categories' => $categories,
            'cartProducts' => $cartProducts,
            'tax'=>$tax,
            'total'=>$total,
            'item_total'=>$item_total,
            'cart_count' => $cart_count,


        ]);
    }
//    public function showCart1(){
//        $categories = Category::where('publication_status',1)->get();
//        $cartProducts = Cart::content();
//        return view('front.cart.show-cart1',[
//            'categories' => $categories,
//            'cartProducts' => $cartProducts
//        ]);
//    }

    public function deleteCartItem($rowId){
        $cart = Cart::remove($rowId);
        return redirect('/cart/show-cart');
    }

    public function updteCartItem($rowId,$qty){
       Cart::update($rowId,$qty);
             $total=Cart::total(0,'.',',');
             $item_total=Cart::initial(0,'.',',');
             $tax= Cart::tax(0);
             $cart_count = Cart::count();
             return [
                 'total' =>$total,
                 'item_total' =>$item_total,
                 'tax'=> $tax,
                 'cart_count' => $cart_count
             ];
    }

}
