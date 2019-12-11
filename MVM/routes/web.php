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


Route::get('example', function(){
    return view('example');
});

//Route::get('dashboard', function(){
//    return view('DispachCenter/daily_delivery_dashboard');
//});

//RUTAS DEL DISPACH -------------------------------------------------------

            //REDIRECCIONES

Route::get('delivery_data', function(){
    return view('DispachCenter/data_machinery_input');
});

Route::get('contract', function(){
    return view('DispachCenter/document_contract');
});

    Route::get('deliver2',function (){
    return view('DispachCenter/pickup_machinery');
});

Route::get('index1',function (){
    return view('DispachCenter/test_toggle');
});

Route::get('rent_requets', function(){
    return view('DispachCenter/rent_requets');
});

            //POST
Route::post('/save', 'RentRequestController@store');

Route::post('/store_delivery','delivery_driver@store');


            //INDEX

Route::get('/dashboard', 'delivery_driver@index'); // localhost:8000/

Route::get('/', 'RentRequestController@index'); // localhost:8000/

Route::resource('renta', 'RentRequestController');

Route::get('/deliver2','pickup_machinery@index');





