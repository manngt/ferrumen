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


/*Route::get('/user', function () {
    return view('users');
});*/

Route::get('/productdetail', function () {
    return view('productdetail');
})->middleware('auth');

Route::get('/form', function () {
    return view('form');
})->middleware('auth');

//Route::resource('/','HomeController');

Route::resource('user','UserController');

Route::get('/searchuser','UserController@searchUser')
    ->middleware('auth');

Route::resource('/','HomeController');

Route::resource('brand','BrandController');

Route::get('/searchbrand','BrandController@searchBrand')
    ->middleware('auth');

Route::resource('color','ColorController');

Route::get('/searchcolor','ColorController@searchColor')
    ->middleware('auth');

Route::resource('category','CategoryController');

Route::get('/searchcategory','CategoryController@searchCategory')
    ->middleware('auth');

Route::resource('supplier','SupplierController');

Route::get('/searchsupplier','SupplierController@searchSupplier')
    ->middleware('auth');

Route::resource('magnitude','MagnitudeController');

Route::get('/searchmagnitude','MagnitudeController@searchMagnitude')
    ->middleware('auth');

Route::resource('metric','MetricController');

Route::get('/searchmetric','MetricController@searchMetric')

    ->middleware('auth');

Route::resource('product','ProductController');

Route::get('/searchproduct','ProductController@searchProduct')
    ->middleware('auth');

Route::resource('purchasestatus','PurchaseStatusController');

Route::get('/searchpurchasestatus','PurchaseStatusController@searchPurchaseStatus')
    ->middleware('auth');

Route::resource('purchase','PurchaseController');

Route::get('/searchpurchase','PurchaseController@searchPurchase')
    ->middleware('auth');

Route::resource('purchasedetail','PurchaseDetailController');

Route::resource('paymentmethod','PaymentMethodController');

Route::get('/searchpaymentmethod','PaymentMethodController@searchPaymentMethod')

    ->middleware('auth');

Route::resource('salestatus','SaleStatusController');

Route::get('/searchsalestatus','SaleStatusController@searchSaleStatus')

    ->middleware('auth');

Route::resource('customer','CustomerController');

Route::get('/searchcustomer','CustomerController@searchCustomer')
    ->middleware('auth');

Route::get('/searchsale','SaleController@searchSale')
    ->middleware('auth');

Route::resource('sale','SaleController');

Route::resource('saledetail','SaleDetailController');

Route::resource('payment','PaymentController');



Route::resource('productmeasure','ProductMeasureController');

Route::get('/report', function () {
    return view('report.index');
})->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
