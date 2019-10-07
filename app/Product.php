<?php

namespace App;
use DB;
use App\Category;
use App\Brand;

use Image;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


   public static function addProductInfo($request){
       $image           =  $request->file('product_image');
       $image_extention =  $image->getClientOriginalExtension();
       $image_name      =  date('YMDHis.').$image_extention;

       $directory       = 'product-images/';
       Image::make($image)->resize(300,300)->save($directory.$image_name);
//       $image->move($directory,$image_name);

       $product = new Product ();
       $product->category_id = $request->category_id;
       $product->brand_id = $request->brand_id;
       $product->product_name = $request->product_name;
       $product->product_price = $request->product_price;
       $product->product_quantity = $request->product_quantity;
       $product->product_tax = $request->product_tax;
       $product->short_description = $request->short_description;
       $product->long_description = $request->long_description;
       $product->product_image = $directory.$image_name;
       $product->publication_status = $request->publication_status;
       $product->save();
   }

   public static function getAllProductInfo(){
       $products = DB::table('products')
           ->join('categories','products.category_id' ,'=','categories.id')
           ->join('brands','products.brand_id','=','brands.id')
           ->select('products.*','categories.category_name','brands.brand_name')
           ->orderBy('products.id','desc')
           ->get();
       return $products;
   }
}
