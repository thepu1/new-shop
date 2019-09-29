<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }

    protected function categoryValidation(Request $request){
        $this->validate($request,[
            'category_name' => 'required',
            'category_description' => 'required',
            'publication_status' => 'required'
        ]);
    }

    public function newCategory(Request $request){
        $this->categoryValidation($request);
      Category::addCategoryInfo($request);
      return redirect('/category/add-category')->with('message','Successfully save Category Info');
    }

    public function manageCategory(){
       $category = new Category();
      $category = $category->getAllCategoryInfo();
      return view('admin.category.manage-category',[
          'categories'  => $category
      ]);
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.category.edit-category',[
            'category'  => $category
        ]);
    }

    public function updateCategory(Request $request){
       Category::updateCategoryInfo($request);
       return redirect('/category/manage-category')->with('message','Category Update Successfully');
    }

    public function deleteCategory(Request $request){
        $category = Category::find($request->id);
        $category->delete();
        return redirect('/category/manage-category')->with('message','Category delete successfully');
    }


    public function publishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();
        return redirect('/category/manage-category')->with('message','Categort Info Unpublished Successfully');
    }

    public function unpublishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();
        return redirect('/category/manage-category')->with('message','Categort Info Published Successfully');
    }
}
