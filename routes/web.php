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
// Route::get('/Admin', function () {
//     return view('auth.login');
// });

Route::resource('/report','ReportController');
Route::resource('/Adminreport','AdminReportController');
// Route::get('admin/sam','adminsamController@kirim');
// Route::get('admin/sam','adminsamController@download');
// Route::resource('admin/sam','adminsamController');
// Route::resource('admin/produk','adminprodukController');
Route::resource('/user','UserController');
Route::get('/samkey','SamController@download');
Route::get('/samkey','SamController@kirim');
Route::resource('/samkey','SamController');
// Route::resource('/report/form','provController');
Route::get('kab/{id}','reportController@getTowns');
Route::get('/table/user', 'UserController@dataTable')->name('table.user');
Route::get('/table/report', 'ReportController@dataTable')->name('table.report');
Route::get('/table/Produk', 'AdminReportController@dataTable')->name('table.admin');
Route::get('/table/sam', 'adminsamController@dataTable')->name('table.sam');
Route::get('/table/samkey', 'SamController@dataTable')->name('table.samkey');
Route::PATCH('/table/report{id}', 'reportController@kirim')->name('table.kirim');
Route::PATCH('/table/sam{id}', 'adminsamController@kirim')->name('table.kirimsam');
Route::get('/table/sam{id}', 'adminsamController@kirim')->name('table.download');
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/Admin','Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin','Auth\LoginController@adminLogin');
Route::get('Auth/login','Auth\LoginController@showLoginForm')->name('auth.login');
Route::get('Auth/Register','Auth\RegisterController@showRegistrationForm')->name('auth.register');
 Route::get('Auth/Register/Admin','Auth\RegisterController@showAdminRegisterForm')->name('auth.adminregister');
// Route::post('Auth/Register/Admin','Auth\RegisterController@createAdmin');
Route::post('Auth/Register','Auth\RegisterController@create');
Route::get('Auth/activate','Auth\ActivationController@activate')->name('auth.activate');

// Route::get('/home','HomeController@index')->name('home');
Route::get('/home','HomeController@Alltoday')->name('home');
Route::get('Auth/activate/resend','Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
Route::post('Auth/activate/resend', 'Auth\ActivationResendController@resend');

    Route::get('/admin', 'AdminController@Admintoday')->name('admin.home');
    // Route::get('/admin/Register', 'AuthAdmin\AdminRegisterController@showRegistrationForm')->name('admin.register');
    // Route::get('/admin/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    // Route::post('/admin/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
    // Route::get('/admin/logout', 'AuthAdmin\LoginController@logout')->name('admin.logout');
    // Route::get('/admin/password/reset', 'AuthAdmin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    // Route::post('/admin/password/email', 'AuthAdmin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    // Route::get('/admin/password/reset/{token}', 'AuthAdmin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    // Route::post('/admin/password/reset', 'AuthAdmin\ResetPasswordController@reset');

