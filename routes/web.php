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
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/', 'RouteController@welcome');
Route::get('test', 'RouteController@test');
Route::get('welcome', 'RouteController@welcome');
Route::get('dashboard', 'RouteController@index');
Route::get('login', 'RouteController@login');
Route::get('signup', 'RouteController@signup');
Route::get('program', 'RouteController@program');
Route::get('contact', 'RouteController@contact');
Route::get('store', 'RouteController@store');
Route::get('singleprogram/{id}', 'RouteController@singleprogram');
Route::get('singleclass', 'RouteController@singleclass');
Route::get('viewItem/{id}', 'RouteController@viewItem');
Route::get('viewGift/{id}', 'RouteController@viewGift');
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
Route::get('single-news/{id}', 'RouteController@terms');
Route::get('cart/{id}', 'RouteController@cart');
Route::get('cart', 'RouteController@cart');

Route::get('wh-admin', 'RouteController@adminLogin');
Route::get('wh-admin-forgetpassword', 'RouteController@adminForgetPassword');
Route::get('wh-editProfile', 'RouteController@adminEditProfile');
Route::get('wh-dashboard', 'RouteController@adminDashboard');
Route::get('wh-addCompany', 'RouteController@addCompany');
Route::get('wh-addDistrict', 'RouteController@addDistrict');
Route::get('wh-addCategory', 'RouteController@addCategory');
Route::get('wh-coupon', 'RouteController@addcoupon');
Route::get('wh-voucher', 'RouteController@addVoucher');
Route::get('wh-product', 'RouteController@addProduct');
Route::get('wh-point-product', 'RouteController@addPointProduct');
Route::get('wh-class', 'RouteController@addClass');
Route::get('wh-faqs', 'RouteController@addFAQ');
Route::get('wh-contactinfo', 'RouteController@addContactinfo');
Route::get('wh-addProgram', 'RouteController@addProgram');
Route::get('wh-addNews', 'RouteController@addNews');
Route::get('wh-manageCompany', 'RouteController@manageCompany');
Route::get('wh-manageCategory', 'RouteController@manageCategory');
Route::get('wh-manageOrders', 'RouteController@manageOrders');
Route::get('wh-manageUsers', 'RouteController@manageUsers');
Route::get('wh-detailUsers/{id?}', 'RouteController@detailUsers');
Route::get('wh-detailOrders/{id?}', 'RouteController@detailOrders');
Route::get('wh-detailSession/{id?}', 'RouteController@detailSession');
Route::get('wh-manageReservedClasses/{id?}', 'RouteController@manageReservedClasses');
Route::get('wh-manageClass', 'RouteController@manageClass');
Route::get('wh-manageProduct', 'RouteController@manageProduct');
Route::get('wh-manageNews', 'RouteController@manageNews');
Route::get('wh-manageDistrict', 'RouteController@manageDistricts');
Route::get('wh-manageCoupon', 'RouteController@manageCoupons');
Route::get('wh-manageVouchers', 'RouteController@manageVouchers');
Route::get('wh-managefaqs', 'RouteController@manageFAQs');
Route::get('wh-manageContactinfo', 'RouteController@manageContactinfo');
Route::get('wh-managenews', 'RouteController@manageNews');
Route::get('wh-manageProgram', 'RouteController@manageProgram');
Route::get('wh-inbox', 'RouteController@inbox');
Route::post('wh-inbox-reply', 'PhpmailerController@sendEmail');
Route::post('radeem_now_coupon', 'PhpmailerController@radeem_now_coupon');
Route::post('radeem_now_voucher', 'PhpmailerController@radeem_now_voucher');
Route::post('resetAdminPassword', 'PhpmailerController@resetAdminPassword');
Route::post('program_thgh_companies', 'RouteController@program_thgh_companies');


Route::get('attendance_calendar', 'RouteController@attendance_calendar');

Route::post('reset_password', 'UserController@reset_password');
Route::get('changeQuantity', 'UserController@changeQuantity')->name('changeQuantity');
Route::get('deleteCart', 'UserController@deleteCart')->name('deleteCart');
Route::post('postOrder', 'UserController@postOrder');
Route::get('signout', 'UserController@signout');


Route::post('reserve_class', 'UserController@reserve_class');
Route::post('mark_attendance', 'UserController@mark_attendance');
Route::get('register', 'UserController@sign');
Route::post('register', 'UserController@signup');
Route::post('terms', 'UserController@terms');
Route::post('checkCoupon', 'RouteController@checkCoupon');

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
Route::post('postPointProduct', 'AdminController@addPointProducts');
Route::post('postClass', 'AdminController@createClass');
Route::post('postFAQ', 'AdminController@postFAQ');
Route::post('postContactinfo', 'AdminController@postContactinfo');
Route::post('postProgram', 'AdminController@postProgram');
Route::post('postNews', 'AdminController@addNews');
Route::post('changepass', 'UserController@changePass');
Route::post('add-to-cart', 'UserController@addToCart');
Route::post('radeem_now', 'UserController@radeem_now');

Route::post('updateProfile', 'AdminController@updateProfile');

Route::get('wh-editCompany/{id?}', 'RouteController@editCompany');
Route::post('deleteCompany', 'AdminController@deleteCompany');
Route::post('updateCompany', 'AdminController@updateCompany');

Route::get('wh-editCategory/{id?}', 'RouteController@editCategory');
Route::post('deleteCategory', 'AdminController@deleteCategory');
Route::post('updateCategory', 'AdminController@updateCategory');

Route::get('wh-editProduct/{id?}', 'RouteController@editProduct');
Route::post('deleteProduct', 'AdminController@deleteProduct');
Route::post('updateProduct', 'AdminController@updateProduct');

Route::get('wh-editClass/{id?}', 'RouteController@editClass');
Route::post('deleteClass', 'AdminController@deleteClass');
Route::post('updateClass', 'AdminController@updateClass');

Route::get('wh-editNews/{id?}', 'RouteController@editNews');
Route::post('deleteNews', 'AdminController@deleteNews');
Route::post('updateNews', 'AdminController@updateNews');

Route::get('wh-editDistricts/{id?}', 'RouteController@editDistrict');
Route::post('deleteDistricts', 'AdminController@deleteDistrict');
Route::post('updateDistrict', 'AdminController@updateDistrict');

Route::get('wh-editCoupon/{id?}', 'RouteController@editCoupon');
Route::post('deleteCoupon', 'AdminController@deleteCoupon');
Route::post('updateCoupon', 'AdminController@updateCoupon');

Route::get('wh-editVoucher/{id?}', 'RouteController@editVoucher');
Route::post('deleteVoucher', 'AdminController@deleteVoucher');
Route::post('updateVoucher', 'AdminController@updateVoucher');

Route::get('wh-editFaqs/{id?}', 'RouteController@editFaqs');
Route::post('deleteFaqs', 'AdminController@deleteFaqs');
Route::post('updateFaqs', 'AdminController@updateFaqs');

Route::get('wh-editContactinfo/{id?}', 'RouteController@editContactinfo');
Route::post('deleteContactinfo', 'AdminController@deleteContactinfo');
Route::post('updateContactinfo', 'AdminController@updateContactinfo');

Route::get('wh-editProgram/{id?}', 'RouteController@editProgram');
Route::post('deleteProgram', 'AdminController@deleteProgram');
Route::post('updateProgram', 'AdminController@updateProgram');

Route::post('deleteInboxMessage', 'AdminController@deleteInboxMessage');
Route::post('changeOrderStatus', 'AdminController@changeOrderStatus');


Route::get('/payment', 'RouteController@paymentForm');
Route::post('/pay_now', 'PaymentsController@pay_now');
Route::get('/token', 'PaymentsController@token');
Route::get('/payment/process', 'PaymentsController@process')->name('payment.process');

Route::get('my-qrcode', ['uses' => 'QrController@ViewUserQrCode']);


Route::post('create-reserved-classes-qrcode', ['uses' => 'QrController@CreateReservedClassesQrcode']);
Route::post('new-qrcode', ['uses' => 'QrController@QrAutoGenerate']);
Route::get('attendance/{id?}', 'QrController@attendance_form');
Route::POST('checkUserAttendance', 'QrController@checkUser');
Route::POST('checkClassAttendance', 'QrController@checkClassAttendance');
