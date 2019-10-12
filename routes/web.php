<?php

Route::get('/404',[
    'uses'  =>  'ErrorHandleController@error404',
    'as'    =>  '404'
]);

Route::get('/405',[
    'uses'  =>  'ErrorHandleController@error405',
    'as'    =>  '405'
]);

Route::get('/',[
  'uses'    =>  'NewShopController@index',
    'as'    =>  '/'
]);

Route::get('/category-product/{id}',[
    'uses'    =>  'NewShopController@categoryProduct',
    'as'    =>  'category-product'
]);

Route::get('/product-details/{id}',[
    'uses'    =>  'NewShopController@productDetails',
    'as'    =>  'product-details'
]);

Route::post('/cart/add-cart',[
    'uses'    =>  'CartController@addCart',
    'as'      =>  'add-cart'
]);

Route::get('/cart/show-cart',[
    'uses'    =>  'CartController@showCart',
    'as'      =>  'show-cart'
]);


Route::get('/cart/delete-cart-item/{rowId}',[
    'uses'    =>  'CartController@deleteCartItem',
    'as'      =>  'delete-cart-item'
]);


Route::get('/cart/update-cart-item/{rowId}{qty}',[
    'uses'    =>  'CartController@updteCartItem',
    'as'      =>  'update-cart-item'
]);



Route::get('/mail-us',[
    'uses'    =>  'NewShopController@mailUs',
    'as'    =>  'mail-us'
]);

Route::get('/check-out',[
    'uses'    =>  'CheckOutController@checkOut',
    'as'      =>  'check-out'
]);

Route::get('/coustomer-sing-up',[
    'uses'    =>  'CoustomerController@coustomerSignUp',
    'as'      =>  'coustomer-sign-up'
]);

Route::post('/new-coustomer-sign-up',[
    'uses'  =>  'CoustomerController@newCoustomerSignUp',
    'as'    =>  'new-coustomer-sign-up'
]);

Route::post('/checout/coustomer-sign-up',[
    'uses'  =>  'CoustomerController@checkOutCoustomerSignUp',
    'as'    =>  'checkout-coustomer-sign-up'
]);

Route::get('/email-check/{email}',[
    'uses'  =>  'CoustomerController@emailCheck',
    'as'    =>  'email-check'
]);

Route::get('/coustomer-login',[
    'uses'  =>  'CoustomerController@coustomerLogin',
    'as'    =>  'coustomer-login'
]);

Route::post('/new-coustomer-login',[
    'uses'  =>  'CoustomerController@newCoustomerLogin',
    'as'    =>  'new-coustomer-login'
]);

Route::post('/checkout/coustomer-login',[
    'uses'  =>  'CoustomerController@checkOutCoustomerLogin',
    'as'    =>  'checkout-coustomer-login'
]);

Route::post('/coustomer-logout',[
    'uses'  =>  'CoustomerController@coustomerLogout',
    'as'    =>  'coustomer-logout'
]);


Route::get('/checkout/shipping',[
    'uses'  =>  'CoustomerController@shippingForm',
    'as'    =>  'checkout-shipping'
]);

Route::post('/new-shipping',[
    'uses'  =>  'CoustomerController@newShipping',
    'as'    =>  'new-shipping'
]);

Route::get('/checkout/payment',[
    'uses'  =>  'CoustomerController@paymentForm',
    'as'    =>  'checkout-payment'
]);


Route::post('/checkout/new-order',[
    'uses'  =>  'CoustomerController@newOrder',
    'as'    =>  'new-order'
]);

Route::get('/complete/order',[
    'uses'  =>  'CoustomerController@completeOrder',
    'as'    =>  'complete-order'
]);

//admin route
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin login check
Route::group(['middleware'   =>  'auth'], function(){

    Route::get('/slide/add-slide',[
        'uses'  =>  'SlideController@addSlide',
        'as'    =>  'add-slide'
    ]);

    Route::post('/slide/new-slide',[
        'uses'  =>  'SlideController@newSlide',
        'as'    =>  'new-slide'
    ]);

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

    Route::get('category/published-category/{id}',[
        'uses'  =>  'CategoryController@publishedCategory',
        'as'    =>  'published-category'
    ]);

    Route::get('category/unpublished-category/{id}',[
        'uses'  =>  'CategoryController@unpublishedCategory',
        'as'    =>  'unpublished-category'
    ]);

    Route::get('/brand/add-brand',[
        'uses'  =>  'BrandController@addBrand',
        'as'    =>  'add-brand'
    ]);

    Route::post('/brand/new-brand',[
        'uses'  =>  'BrandController@newBrand',
        'as'    =>  'new-brand'
    ]);

    Route::get('/brand/manage-brand',[
        'uses'  =>  'BrandController@manageBrand',
        'as'    =>  'manage-brand'
    ]);

    Route::get('/brand/edit-brand/{id}',[
        'uses'  =>  'BrandController@editBrand',
        'as'    =>  'edit-brand'
    ]);

    Route::post('/brand/update-brand',[
        'uses'  =>  'BrandController@updateBrand',
        'as'    =>  'update-brand'
    ]);

    Route::post('/brand/delete-brand',[
        'uses'  =>  'BrandController@deleteBrand',
        'as'    =>  'delete-brand'
    ]);


    Route::get('/brand/published/{id}',[
        'uses'  =>  'BrandController@publishedBrand',
        'as'    =>  'published'
    ]);


    Route::get('/brand/unpublished/{id}',[
        'uses'  =>  'BrandController@unpublishedBrand',
        'as'    =>  'unpublished'
    ]);

    Route::get('/product/add-product',[
        'uses'  =>  'ProductController@addProduct',
        'as'    =>  'add-product'
    ]);

    Route::post('/product/new-product',[
        'uses'  =>  'ProductController@newProduct',
        'as'    =>  'new-product'
    ]);

    Route::get('/product/manage-product',[
        'uses'  =>  'ProductController@manageProduct',
        'as'    =>  'manage-product'
    ]);

    Route::get('/product/edit-product/{id}',[
        'uses'  =>  'ProductController@editProduct',
        'as'    =>  'edit-product'
    ]);

    Route::post('/product/update-product',[
        'uses'  =>  'ProductController@updateProduct',
        'as'    =>  'update-product'
    ]);

    Route::post('/product/delete-product',[
        'uses'  =>  'ProductController@deleteProduct',
        'as'    =>  'delete-product'
    ]);

    Route::get('/product/published-product/{id}',[
        'uses'  =>  'ProductController@publishedProduct',
        'as'    =>  'published-product'
    ]);

    Route::get('/product/unpublished-product/{id}',[
        'uses'  =>  'ProductController@unpublishedProduct',
        'as'    =>  'unpublished-product'
    ]);

    Route::get('/manage-order',[
        'uses'  =>  'OrderController@manageOrder',
        'as'    =>  'manage-order'
    ]);

    Route::get('/view-order-details/{id}',[
        'uses'  =>  'OrderController@viewOrderDetails',
        'as'    =>  'view-order-details'
    ]);

//Route::get('/mail',[
//    'uses'  =>  'CoustomerController@mail',
//    'as'    =>  'mail'
//]);


    Route::get('/view-order-invoice/{id}',[
        'uses'  =>  'OrderController@viewOrderInvoice',
        'as'    =>  'view-order-invoice'
    ]);

    Route::get('/download-order-invoice/{id}',[
        'uses'  =>  'OrderController@downloadOrderInvoice',
        'as'    =>  'download-order-invoice'
    ]);

    Route::get('/edit-order/{id}',[
        'uses'  =>  'OrderController@editOrder',
        'as'    =>  'edit-order'
    ]);
});















