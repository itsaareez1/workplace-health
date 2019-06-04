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
Route::get('/', 'RouteController@welcome');
Route::get('test', 'RouteController@test');
Route::get('welcome', 'RouteController@welcome');
Route::get('index', 'RouteController@index');
Route::get('login', 'RouteController@login');
Route::get('signup', 'RouteController@signup');
Route::get('program', 'RouteController@program');
Route::get('contact', 'RouteController@contact');
Route::get('store', 'RouteController@store');
Route::get('singleprogram/{id}', 'RouteController@singleprogram');
Route::get('singleclass', 'RouteController@singleclass');
Route::get('viewItem/{id}', 'RouteController@viewItem');
Route::get('viewGift', 'RouteController@viewGift');
Route::get('loyalty', 'RouteController@loyalty');
Route::get('loyaltyPoints', 'RouteController@loyaltyPoints');
Route::get('myOrder', 'RouteController@myOrder');
Route::get('history', 'RouteController@history');
Route::get('help', 'RouteController@help');
Route::get('changepass', 'RouteController@changepass');
Route::get('buyCredits', 'RouteController@buyCredits');
Route::get('accountDetails', 'RouteController@accountDetails');
Route::get('resetpassword', 'RouteController@resetpassword');
Route::get('verifyAccount1', 'RouteController@verifyAccount1');
Route::get('verifyAccount2', 'RouteController@verifyAccount2');
Route::get('verifyPass', 'RouteController@verifyPass');
Route::get('paymentMethod', 'RouteController@paymentMethod');
Route::get('editProfile', 'RouteController@editProfile');
Route::get('forgetpassword', 'RouteController@forgetpassword');
Route::get('gift-store', 'RouteController@gifts');
Route::get('terms-of-service', 'RouteController@terms');


Route::get('wh-admin', 'RouteController@adminLogin');
Route::get('wh-dashboard', 'RouteController@adminDashboard');
Route::get('wh-addCompany', 'RouteController@addCompany');
Route::get('wh-addDistrict', 'RouteController@addDistrict');
Route::get('wh-addCategory', 'RouteController@addCategory');
Route::get('wh-coupon', 'RouteController@addcoupon');
Route::get('wh-voucher', 'RouteController@addVoucher');
Route::get('wh-product', 'RouteController@addProduct');
Route::get('wh-class', 'RouteController@addClass');
Route::get('wh-faqs', 'RouteController@addFAQ');
Route::get('wh-addProgram', 'RouteController@addProgram');
Route::get('wh-addNews', 'RouteController@addNews');
Route::get('wh-manageCompany', 'RouteController@manageCompany');
Route::get('wh-manageCategory', 'RouteController@manageCategory');
Route::get('wh-manageClass', 'RouteController@manageClass');
Route::get('wh-manageProduct', 'RouteController@manageProduct');
Route::get('wh-manageNews', 'RouteController@manageNews');
Route::get('wh-manageDistrict', 'RouteController@manageDistricts');
Route::get('wh-manageCoupon', 'RouteController@manageCoupons');
Route::get('wh-manageVouchers', 'RouteController@manageVouchers');
Route::get('wh-managefaqs', 'RouteController@manageFAQs');
Route::get('wh-managenews', 'RouteController@manageNews');


Route::get('signout', 'UserController@signout');

Route::get('register', 'UserController@sign');
Route::post('register', 'UserController@signup');
Route::post('terms', 'UserController@terms');

Route::post('signin', 'UserController@login');
Route::post('sendmessage', 'UserController@contactus');
Route::post('upPro', 'UserController@editProfile');
Route::post('admin-login', 'AdminController@login');
Route::post('postDistrict', 'AdminController@addDistricts');
Route::post('postCompany', 'AdminController@addCompany');
Route::post('postCategory', 'AdminController@addCategories');
Route::post('postCoupon', 'AdminController@addcoupon');
Route::post('postVoucher', 'AdminController@addVouchers');
Route::post('postProduct', 'AdminController@addProducts');
Route::post('postClass', 'AdminController@createClass');
Route::post('postFAQ', 'AdminController@postFAQ');
Route::post('postProgram', 'AdminController@postProgram');
Route::post('postNews', 'AdminController@addNews');

Route::post('changepass', 'UserController@changePass');



