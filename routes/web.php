<?php

use Illuminate\Support\Facades\Route;

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




//phần đăng nhập
//========= Auth
Route::match(['get','post'],'/login','AuthController@Login')   ->name('Auth.Login');
Route::get('/logout','AuthController@Logout')     ->name('Auth.Logout');
Route::match(['get','post'] , '/register','AuthController@register')     ->name('Auth.register');


//phần giao diện


Route::get('/timkiem', 'BackendController@timkiem')->name('timkiem');
Route::get('/', 'BackendController@home')->name('home');
Route::get('/contact', 'BackendController@contact')->name('contact');
Route::get('/man', 'BackendController@man')->name('man');
Route::get('/woman', 'BackendController@woman')->name('woman');
Route::get('/cart', 'BackendController@cart')->name('cart');
Route::get('/myaccount', 'BackendController@myaccount')->name('myaccount');
Route::get('/singleproduct/{id}', 'BackendController@singleproduct')
    ->where(['id'=>'[0-9]+'])
    ->name('singleproduct');

//phần giỏ hàng
Route::get('/add-cart/{id}','cartController@AddCart')
    ->name('AddCart')
    ->where('id','[0-9]+');

Route::get('/gio-hang','cartController@GioHang')
    ->name('GioHang');
    


//phần admin
Route::group(['middleware'=> 'admin', 'prefix' => 'admin'], function () {
    Route::get('/index', 'CategoryController@index')->name('index');
//danh mục
Route::match(['get','post'],'/addCategory','CategoryController@addCategory')->name('addCategory');
Route::match(['get', 'post'],'/editCategory/{id}', 'CategoryController@editCategory')
    ->where(['id'=>'[0-9]+'])
    ->name('editCategory');
Route::match(['get', 'post'],'/DeleteCategory/{id}', 'CategoryController@DeleteCategory')
    ->where(['id'=>'[0-9]+'])
    ->name('DeleteCategory');
Route::get('/ListCategories', 'CategoryController@ListCategories')->name('ListCategories');
//sản phẩm
Route::match(['get','post'],'/addProduct','ProductController@addProduct')->name('addProduct');
Route::match(['get', 'post'],'/editProduct/{id}', 'ProductController@editProduct')
    ->where(['id'=>'[0-9]+'])
    ->name('editProduct');
Route::get('/ListProduct', 'ProductController@ListProduct')->name('ListProduct');
Route::get('/DeleteProduct/{id}', 'ProductController@DeleteProduct')
    ->where(['id'=>'[0-9]+'])
    ->name('DeleteProduct');
//admin danh sách
Route::match(['get', 'post'],'/editUser/{id}', 'UserController@editUser')
    ->where(['id'=>'[0-9]+'])
    ->name('editUser');
Route::get('/ListUser', 'UserController@ListUser')->name('ListUser');
Route::get('/DeleteUser/{id}', 'UserController@DeleteUser')
    ->where(['id'=>'[0-9]+'])
    ->name('DeleteUser');
//Slide
Route::match(['get','post'],'/addSlide','SlideController@addSlide')->name('addSlide');
Route::match(['get', 'post'],'/editSlide/{id}', 'SlideController@editSlide')
    ->where(['id'=>'[0-9]+'])
    ->name('editSlide');
Route::get('/ListSlide', 'SlideController@ListSlide')->name('ListSlide');
Route::get('/DeleteSlide/{id}', 'SlideController@DeleteSlide')
    ->where(['id'=>'[0-9]+'])
    ->name('DeleteSlide');
//hóa đơn
Route::get('/ListOrder', 'OrderController@ListOrder')->name('ListOrder');
});
