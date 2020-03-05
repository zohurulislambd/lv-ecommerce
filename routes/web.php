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
Route::get('/basic','PagesController@basic');
Route::get('/','PagesController@index');
Route::get('/contact-page', 'PagesController@contact');
Route::get('/about-page','PagesController@about');
Route::get('/shop-page','PagesController@shop');
Route::get('/postsController', function (){
    return view("contact");
});
// Product Controller
Route::get('/products','PagesController@products');
Route:: redirect('/about','/contact');
//Route::get('/post/{id}','PostsController@index');

Route::get('product', function () {
    $products = DB::table('products')->orderBy('id','desc')->get();
    return view('pages/products/index', ['products' => $products]);
});
//Admin pages routing
/*Route::group(['prefix'=> 'admin'], function (){
    Route::get('/','AdminPagesController@product')->name('admin.product');
    Route::get('/create','AdminPagesController@create')->name('admin.product.create');
    Route::post('/create','AdminPagesController@store')->name('admin.product.store');
});*/

//Route::get('/test','CrudController@index');
Route::get('/admin','AdminPagesController@index')->name('admin');
//Route::get('/admin/product','ProductItemController@index')->name('productList');
Route::get('/admin/productItem','ProductItemController@list')->name('productItem');
Route::get('/admin/create','ProductItemController@create')->name('addProduct');
Route::post('/admin/store','ProductItemController@store');

Route::get('/admin/product/{item}/edit','ProductItemController@edit');
Route::patch('admin/product/{item}/edit','ProductItemController@update');
Route::delete('/admin/product/{item}','ProductItemController@delete');
/*
 * categories
 * */

Route::get('admin/categories','CategoryController@index')->name('categories');



//registration with file upload form
Route::get('/register','PagesController@registerForm')->name('register');
Route::post('/register','PagesController@processRegistration');

// signup & login
Route::get('signup','AuthController@signupForm')->name('registration');
Route::post('signup','AuthController@signupProcess');
/*
Route::get('signin','AuthController@loginForm')->name('signin');
Route::post('signin','AuthController@loginProcess');

Route::get('/profile','AuthController@showProfile')->name('profile');
Route::get('/logout','AuthController@logout')->name('logout');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



