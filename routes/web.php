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
    return view('index');
});

Auth::routes();

// User

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'HomeController@categoryItemShow')->name('homes');
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// -------------User Data---------------//

Route::get('/sport-details/{id}', 'HomeController@showSportDetails')->name('sports');
Route::get('/place-bid/{id}', 'HomeController@showPlaceBidForm')->name('bidforms'); // All bid list

//Bid Users

Route::post('/save-bid/{id}', 'HomeController@saveBid')->name('bidsave');
Route::post('/confirm-bet/{id}/{sp_id}/{bid_amount}/{user_id}', 'HomeController@confirmBid')->name('bidconfirm');
Route::get('/post-form/{id}/{team}', 'HomeController@showPostForm')->name('postforms');
Route::post('/save-post/{id}/{team}', 'HomeController@savePost')->name('savepost');



// Admin

Route::prefix('/admin')->group(function(){
    //Dashboard
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

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
    Route::get('/add-sport', 'SportController@showSportAddForm');
    Route::post('/save-sport', 'SportController@save');
    Route::get('/sport-edit/{id}', 'SportController@showSportUpdateForm');
    Route::put('/update-sport/{id}', 'SportController@update');
    Route::delete('/sport-delete/{id}', 'SportController@delete');

    //Confirm Bet Data
    Route::get('/all-bet', 'ConfirmBetController@index');
    Route::get('/post-info/{id}', 'ConfirmBetController@showPostInfo');
    Route::post('/placer-win/{id}/{amount}/{bet_id}', 'ConfirmBetController@placerWin');
    Route::post('/taker-win/{id}/{amount}/{bet_id}', 'ConfirmBetController@takerWin');
    Route::delete('/bet-delete/{id}', 'ConfirmBetController@delete');

    //Withdraw Request Data
    Route::get('/all-withdraw', 'WithdrawRequestController@index');
    Route::get('/user-info/{id}', 'WithdrawRequestController@showUserInfo');
    Route::post('/withdraw-success/{id}/{user_id}/{amount}', 'WithdrawRequestController@withdrawSuccess');

    //Contact Us Amount Data
    Route::get('/all-contact', 'ContactUsController@index');
    Route::delete('/message-delete/{id}', 'ContactUsController@delete');

    //Refer Amount Data
    Route::get('/add-referamount', 'ReferAmountController@showReferForm');
    Route::post('/save-referamount', 'ReferAmountController@update');

});




