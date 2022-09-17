<?php

//my ecommerce project overview
//sign up and in  page
//main page -> general landing page
//products page -> view all products per category
//product page -> view a single product
//cart page -> add product to cart if interested in shoping
//check out page -> delivery address for buyers


use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth::routes(['register'=>false]);
/// Simple User Login /////
///

Route::group(['middleware'=>'frontLogin'],function (){
    //account details
    Route::get('/myaccount','UsersController@account');
    Route::put('/update-profile/{id}','UsersController@updateprofile');
    Route::put('/update-password/{id}','UsersController@updatepassword');

    //apply coupon code
    Route::post('/apply-coupon','CouponController@applycoupon');
    //checkout
    Route::get('/check-out','CheckOutController@index');
    Route::post('/submit-checkout','CheckOutController@submitcheckout');
    Route::get('/order-review',[OrdersController::class,"index"]);
    Route::post('/submit-order','OrdersController@order');
    Route::get('/cod','OrdersController@cod');
    Route::get('/paypal','OrdersController@paypal');
});


///// Cart Area /////////
Route::post('/addToCart','CartController@addToCart')->name('addToCart');
Route::get('/viewcart','CartController@index');
Route::get('/cart/deleteItem/{id}','CartController@deleteItem');
Route::get('/cart/update-quantity/{id}/1','CartController@add');
Route::get('/cart/update-quantity/{id}/-1','CartController@remove');

//user simple login
Route::get('/login_page','UsersController@index')->name('user_login');
Route::get('/signin','UsersController@signin');

Route::get('/customer_login','UsersController@customer');
Route::post('/logingin','UsersController@customerloggedin');
Route::get('/signup','UsersController@signup');
Route::post('/register_user','UsersController@register');
Route::post('/user_login','UsersController@login');
Route::get('/logout','UsersController@logout')->name("logout");
Route::get('/forgot-password','UsersController@forgotpassword')->name('forgot');
Route::post('/forgot-password','UsersController@resetpassword')->name('password_reset');

//view product
Route::get('/product-detail/{id}','IndexController@productdetials');
Route::post('/product-detail/{id}','ProductsController@reviews');
Route::get('/list-products/{id}','IndexController@listbycategory');
//Route::post('/product/reviews','ProductsController@reviews')->name('reviews');

//categories view products per category
Route::get('/category/{id}/view','IndexController@listbycategory');

//home page
Route::get('/','IndexController@index');

Route::get('/users/charts','AdminController@users')->name('users');
Route::get('/adminlte/charts', function (){
    return view('backend/layouts/adminlte/index');
});

//Admin area
Route::group(['middleware'=>['auth','admin']],function (){
    Route::get('/admin',[AdminController::class,"index"]);
    /// Category Area
    Route::get('/admin/categories','CategoriesController@index')->name('categories_index');
    Route::get('/admin/category/create',[CategoriesController::class,"create"])->name('category_create');
    Route::post('/admin/category/create','CategoriesController@store')->name('category_store');
    Route::post('/admin/category/{id}','CategoriesController@edit')->name('category_edit');

    /// Products Area
    Route::get('/admin/product/create','ProductsController@create')->name('products_create');
    Route::post('/admin/product/create',[ProductsController::class,"store"])->name('products_store');
    Route::get('/admin/products','ProductsController@index')->name('products_index');
    Route::get('/admin/product/{id}/edit','ProductsController@edit')->name('product_edit');
    Route::put('/admin/product/{id}/update','ProductsController@update')->name('product_update');
    Route::get('/admin/delete-product/{id}',[ProductsController::class,"destroy"])->name('product_delete');

    //coupons area
    Route::get('/admin/coupon','CouponController@index')->name('coupon_index');
    Route::get('/admin/coupon/create','CouponController@create')->name('coupon_create');
    Route::post('/admin/coupon/create','CouponController@store')->name('coupon_store');
    Route::get('/admin/coupon/{id}/edit','CouponController@edit')->name('coupon_edit');
    Route::put('/admin/coupon/{id}/update','CouponController@update')->name('coupon_update');
    Route::get('delete-coupon/{id}','CouponController@destroy');

    //countries area
    Route::get('/admin/country/add',[CountriesController::class,"create"])->name('country_create');
    Route::post('/admin/country/add','CountriesController@store')->name('country_store');
    Route::get('/admin/countries/list','CountriesController@index')->name('countries_index');


    Route::get('/admin/delete-image/{id}',[AdminController::class,"delete_image"])->name('images_delete');




});
