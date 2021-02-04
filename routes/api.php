<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

function crud($name, $controller)
{
    Route::resource("{$name}", "{$controller}");
    Route::post("{$name}/{id}/delete", "{$controller}@destroy");
    Route::post("{$name}/{id}/update", "{$controller}@update");
}

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', 'Auth\UserController@current');
    Route::get('/voucher_categories/search', 'VoucherCategoryController@searchq');

    Route::get('/hotels_me', 'HotelController@indexMe');


    crud('voucher_categories', 'VoucherCategoryController');
    crud('vouchers', 'VoucherController');
    crud('vouchers_approve', 'VoucherApproveController');

    crud('main_hotels', 'MainHotelController');
    crud('hotels', 'HotelController');
    crud('users', 'UserController');


    Route::get('voucher_hotel_stats', 'VoucherHotelController@stats');

    crud('voucher_hotels', 'VoucherHotelController');

    Route::post('image/upload', 'UploadController@imageUploadPost');

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});

use PA\ProvinceTh\Factory;

Route::resource('lifestyle', 'LifestyleController');
Route::post('lifestyle/set/{id}', 'LifestyleController@set');
Route::post('carts', 'CartController@store');
Route::get('myVouchers', 'MyVoucherController@index');
Route::get('myVouchers/{id}/use', 'MyVoucherController@use');
Route::get('myVouchers/{id}/cancel', 'MyVoucherController@cancel');

Route::get('myVouchers/{id}', 'MyVoucherController@show');
Route::get('myVouchers/key/{id}', 'MyVoucherController@showKey');
Route::get('roles', 'UserController@roles');

Route::get('sendExpirySMS', 'SMSController@index');

Route::get('match/vouchers', 'VoucherController@matching');
Route::get('dashboard', 'DashboardController@index');

Route::get('province', function () {
    return $provinces = Factory::province();
});

Route::get('migrate', function () {
    \Artisan::call('migrate');
});
Route::resource('photos', 'Test');