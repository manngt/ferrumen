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

/*Route::get('/', function () {
    return view('index');
});
*/


Route::get('/user', function () {
    return view('users');
});

Route::get('/productdetail', function () {
    return view('productdetail');
});

Route::get('/form', function () {
    return view('form');
});

Route::resource('/','HomeController');

Route::resource('brand','BrandController');

Route::resource('color','ColorController');

Route::resource('category','CategoryController');

Route::resource('supplier','SupplierController');

Route::resource('magnitude','MagnitudeController');

Route::resource('metric','MetricController');

Route::resource('product','ProductController');

Route::get('/searchproduct','ProductController@searchProduct');

Route::resource('purchasestatus','PurchaseStatusController');

Route::resource('purchase','PurchaseController');

Route::get('/searchpurchase','PurchaseController@searchPurchase');

Route::resource('purchasedetail','PurchaseDetailController');

Route::resource('paymentmethod','PaymentMethodController');

Route::resource('salestatus','SaleStatusController');

Route::resource('customer','CustomerController');

Route::get('/searchsale','SaleController@searchSale');

Route::resource('sale','SaleController');

Route::resource('saledetail','SaleDetailController');

Route::resource('payment','PaymentController');



