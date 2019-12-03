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
});

Route::get('saludo', function(){
    return view('saludo');
});

Route::get('rent_requets', function(){
    return view('DispachCenter/rent_requets');
});

Route::get('example', function(){
    return view('example');
});

Route::resource('renta', 'RentRequestController');

Route::get('/', 'RentRequestController@index'); // localhost:8000/
Route::post('/save', 'RentRequestController@store');

//Route::get('dashboard', function(){
//    return view('DispachCenter/daily_delivery_dashboard');
//});
Route::get('/dashboard', 'delivery_driver@index'); // localhost:8000/
