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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/product','ProductController@kirim');
Route::resource('/product','ProductController');
Route::get('admin/sam','adminsamController@kirim');
Route::get('admin/sam','adminsamController@download');
Route::resource('admin/sam','adminsamController');
Route::resource('admin/produk','adminprodukController');
Route::resource('/user','UserController');
Route::get('/samkey','SamController@download');
Route::get('/samkey','SamController@kirim');
Route::resource('/samkey','SamController');
// Route::resource('/product/form','provController');
Route::get('kab/{id}','ProductController@getTowns');
Route::get('/table/user', 'UserController@dataTable')->name('table.user');
Route::get('/table/Product', 'ProductController@dataTable')->name('table.Product');
Route::get('/table/Produk', 'adminprodukController@dataTable')->name('table.Produk');
Route::get('/table/sam', 'adminsamController@dataTable')->name('table.sam');
Route::get('/table/samkey', 'SamController@dataTable')->name('table.samkey');
Route::PATCH('/table/Product{id}', 'ProductController@kirim')->name('table.kirim');
Route::PATCH('/table/sam{id}', 'adminsamController@kirim')->name('table.kirimsam');
Route::get('/table/sam{id}', 'adminsamController@kirim')->name('table.download');
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('Auth/login','Auth\LoginController@showLoginForm')->name('auth.login');
Route::get('Auth/Register','Auth\RegisterController@showRegistrationForm')->name('auth.register');
Route::get('Auth/activate','Auth\ActivationController@activate')->name('auth.activate');
Route::get('/home','HomeController@index')->name('home');
Route::get('Auth/activate/resend','Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('Auth/activate/resend', 'Auth\ActivationResendController@resend');

    Route::get('/admin', 'AdminController@index')->name('admin.home');
    Route::get('/admin/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/admin/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/admin/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    Route::get('/admin/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/admin/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/admin/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/admin/password/reset', 'AuthAdmin\ResetPasswordController@reset');

