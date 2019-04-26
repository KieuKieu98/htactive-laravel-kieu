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
// 
// Route::group(['prefix' => '/admin', 'middleware' => ['checkAdmin', 'CheckLogin'], 'namespace' => 'Admin'], function() {
    // Route::get('users', 'AdminUserController@sayHello')->middleware('checkAdmin');
    // 
    // Route::resource('photos', 'UserController');
// });



Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('/service', 'ServiceController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/about', 'AboutController');
    Route::resource('/blog', 'BlogController');
    Route::resource('/portfolio', 'PortfolioController');
    Route::resource('/user', 'AdminUserController');
    Route::delete('/myproductsDeleteAll', 'ServiceController@deleteAll');
    Route::get('/pagination/fetch_data', 'ServiceController@fetch_data');
    Route::get('/', 'AdminUserController@getAdmin');
    
});

/*************Login*****************/
Route::get('/login', 'MainController@index')->name('login');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/logout', 'MainController@logout');

/***************Register****************/
Route::get('/register', 'MainController@create')->name('register');
Route::post('/register/checkRegister', 'MainController@checkRegister');

// /***************Password Reset Routes***************/
// Route::get('auth/password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
// Route::post('auth/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// Route::post('auth/password/reset', 'Auth\ResetPasswordController@reset');




// Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
