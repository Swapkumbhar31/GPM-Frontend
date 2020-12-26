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
    return view('welcome');
})->name('home');
Route::get('/about-us', function () {
    return view('aboutus');
})->name('aboutus');
Route::get('/contact-us', function () {
    return view('contactus');
})->name('contactus');

Route::get('/refund-policy', function () {
    return view('refund-policy');
})->name('refund-policy');

Route::get('/term-and-conditions', function () {
    return view('term-and-conditions');
})->name('term-and-conditions');

Route::get('/membership', function () {
    return view('membership');
})->name('membership');

Route::get('/membership/basic', function () {
    return view('membership.basic');
})->name('membershipbasic');


Route::get('/activities', 'HomeController@showActivities')->name('activities');


Route::get('/membership/core', function () {
    return view('membership.core');
})->name('membershipcore');

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
  ])->name('login');
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
  ]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
  ]);
  Route::get('forgot-password', function () {
    return view('auth.forgot-password');
});
Route::get('/profile', 'HomeController@index')->name('dashboard');

Route::get('/register/information', 'HomeController@information');
  
Route::get('/register/{code?}', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
  ]);
