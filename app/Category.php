<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category_name','slug','category_description','publication_status'];

    public static function addCategoryInfo($request){
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->slug = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();

    }

    public function getAllCategoryInfo(){
       $categories = Category::all();
       return $categories;
    }

    public static function updateCategoryInfo($request){
        $category = Category::find($request->id);
        $category->category_name         = $request->category_name;
        $category->slug                  = $request->category_name;
        $category->category_description  = $request->category_description;
        $category->publication_status    = $request->publication_status;
        $category->save();
    }
}
