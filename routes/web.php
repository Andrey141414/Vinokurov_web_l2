<?php

use Illuminate\Support\Facades\Route;
use App\Models\recieptModel;
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

Route::get('/search', function () {
    return view('search');
});

Route::get('/add_reciept', function () {
    return view('add_reciept',['show'=>1]);
})->name('add_reciept');

Route::get('/my_reciepts', function () {
    return view('my_resiepts',['reciepts'=>recieptModel::all()]);
});

Route::get('/show_reciept/{id}', function () {
    return view('show_reciept');
})->name('show_reciept');


Route::get('/reciept/{id}', function () {
    return view('reciept');
});


Route::get('/test', function () {
    return view('test');
});