<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(App\Http\Controllers\addController::class)->group(function () {
    Route::post('/add_reciept', 'createReciept');
    Route::post('/add_ingridients', 'addIngridients');
});


Route::controller(App\Http\Controllers\showController::class)->group(function () {
    Route::post('/show_reciept', 'showReciept');
});

Route::controller(App\Http\Controllers\searchController::class)->group(function () {
    Route::post('/search_reciept', 'searchReciept');
    Route::post('/test', 'test');
});

Route::controller(App\Http\Controllers\changeController::class)->group(function () {
    Route::post('/get_all_reciept_data', 'get_all_reciept_data');
    Route::post('/change_reciept_data', 'change_reciept_data');
    Route::post('/delete_all_reciept_data', 'delete_all_reciept_data');
    
});

