<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Deal;
use App\User;

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

Auth::routes();

Route::post('/register', 'RegisterController@create');


Route::get('/deals', 'DealController@index');
Route::get('/import',  function() {
    (new Deal())->importToDb();
    // dd('done');
    return redirect('deals');
});
Route::post('/deals', 'DealController@store');
Route::post('/setDeal', 'DealController@create');
Route::get('/', function () {
    return view('login');
});

Route::get('/clients', 'ClientController@index');
Route::post('/clients', 'ClientController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

