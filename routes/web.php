<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[
  'uses'    =>  'NewShopController@index',
    'as'    =>  '/'
]);

Route::get('/category-product',[
    'uses'    =>  'NewShopController@categoryProduct',
    'as'    =>  'category-product'
]);

Route::get('/mail-us',[
    'uses'    =>  'NewShopController@mailUs',
    'as'    =>  'mail-us'
]);

Route::get('/check-out',[
    'uses'    =>  'NewShopController@checkOut',
    'as'    =>  'check-out'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/category/add-category',[
    'uses'  =>  'CategoryController@addCategory',
    'as'    =>  'add-category'
]);

Route::post('/category/new-category',[
    'uses'  =>  'CategoryController@newCategory',
    'as'    =>  'new-category'
]);

Route::get('/category/manage-category',[
    'uses'  =>  'CategoryController@manageCategory',
    'as'    =>  'manage-category'
]);


Route::get('/category/edit-category/{id}',[
    'uses'  =>  'CategoryController@editCategory',
    'as'    =>  'edit-category'
]);

Route::post('/category/update-category',[
    'uses'  =>  'CategoryController@updateCategory',
    'as'    =>  'update-category'
]);

Route::post('/category/delete-category',[
    'uses'  =>  'CategoryController@deleteCategory',
    'as'    =>  'delete-category'
]);

Route::get('category/published/{id}',[
    'uses'  =>  'CategoryController@publishedCategory',
    'as'    =>  'published'
]);

Route::get('category/unpublished/{id}',[
    'uses'  =>  'CategoryController@unpublishedCategory',
    'as'    =>  'unpublished'
]);

Route::get('/brand/add-brand',[
    'uses'  =>  'BrandController@addBrand',
    'as'    =>  'add-brand'
]);






