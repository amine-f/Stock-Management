<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@loginPost')->name('login.post');


Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@registerPost')->name('register.post');

//Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//Route::post('/register', [RegisterController::class, 'register'])->name('register.post');


//stock controller
Route::get('/', 'StockController@view')->name('stock');
Route::post('/save-purchase-old-invoice', 'StockController@save_purchaseOLD');
Route::post('/save-purchase', 'StockController@save_purchase')->name('save_purchase');
Route::get('/add-stock', 'StockController@index')->name('StockPurchase-purchase');
Route::get('/stock-manage', 'StockController@view')->name('home');
Route::get('/view-stock-details/{ID}', 'StockController@viewDetails');
Route::post('/update-product-details', 'StockController@updateproductDetails');

//supplyer controller
Route::get('/supplyer', 'SupplyerController@index')->name('SupplyerMangement');
Route::get('/view-supplyer/{ID}', 'SupplyerController@view_supplyer');
Route::post('/update-supplyer', 'SupplyerController@update_info');
Route::get('/published-supplyer/{ID}', 'SupplyerController@published_supplyer');
Route::get('/unpublished-supplyer/{ID}', 'SupplyerController@unpublished_supplyer');
Route::post('/save-supplyer', 'SupplyerController@save_supplyer');
Route::get('/getAllSupplyer', 'SupplyerController@getAllsupplyer');
Route::post('/save-supplyerAJAX', 'SupplyerController@save_supplyerAJAX');

//supplyerPayment
Route::get('/supplyerPayment', 'SupplyerController@viewPayment');
Route::get('/supplyerPaymentDetails/{ID}', 'SupplyerController@paymentDetails');
Route::post('/save-supplyer-payment', 'SupplyerController@save_supplyer_payment');

//Settings route controller
Route::get('/settings', 'SettingsController@index');
Route::post('/save-brand', 'SettingsController@save_brand');
Route::get('/published-brand/{productId}', 'SettingsController@published_brand');
Route::get('/unpublished-brand/{productId}', 'SettingsController@unpublished_brand');
Route::post('/update-brand-info', 'SettingsController@update_brand_info');

//Product Category -STYLE
Route::get('/get-brand', 'SettingsController@getBrand');
Route::get('/get-style', 'ProductController@get');
Route::post('/save-style', 'ProductController@save');
Route::get('/published-style/{ID}', 'ProductController@publish');
Route::get('/unpublished-style/{ID}', 'ProductController@unpublish');
Route::post('/update-style-info', 'ProductController@update');

Route::get('/makepdfpurchase/{ID}', 'StockController@pdf');

// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Named routes for password reset from ForgotPasswordController
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
