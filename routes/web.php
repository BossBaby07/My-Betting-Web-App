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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// Admin

Route::prefix('admin')->group(function(){
    //Dashboard
    Route::GET('/', 'AdminController@index')->name('admin.dashboard');

    // Admin Login
    Route::GET('/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::POST('/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');

    //Admin Logout
    Route::POST('/logout', 'Admin\AdminLoginController@logout')->name('admin.logout');

    //Admin Register
    Route::GET('/register', 'Admin\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::GET('/register', 'Admin\AdminRegisterController@register')->name('admin.register.submit');

    //Admin Password Reset
    Route::get('/password/reset', 'Admin\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email', 'Admin\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}', 'Admin\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset', 'Admin\AdminResetPasswordController@reset')->name('admin.password.update');

    //----------Admin Panel Data----------//

    //User Data
    Route::get('/all-user', 'UserController@index');
    Route::delete('/user-delete/{id}', 'UserController@userdelete');

    //Category Data
    Route::get('/all-category', 'CategoryController@index');
    Route::get('/add-category', 'CategoryController@showCategoryAddForm');
    Route::post('/save-category', 'CategoryController@save');
    Route::delete('/category-delete/{id}', 'CategoryController@delete');

    //Sport Data
    Route::get('/all-sport', 'SportController@index');
    // Route::get('/add-sport', 'SportController@showSportAddForm');
    // Route::post('/save-sport', 'SportController@save');
    // Route::delete('/sport-delete/{id}', 'SportController@delete');

});




