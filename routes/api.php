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

    crud('voucher_categories', 'VoucherCategoryController');
    crud('vouchers', 'VoucherController');
    crud('main_hotels', 'MainHotelController');
    crud('hotels', 'HotelController');

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

Route::get('province', function () {
    return  $provinces = Factory::province();
});

Route::resource('photos', 'Test');

Route:: get('test', 'TestController@index');
