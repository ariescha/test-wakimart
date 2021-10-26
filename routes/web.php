<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserWakiController;

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
Route::post('/userData/get',[UserWakiController::class,'index']);

Route::post('/userData',[UserWakiController::class,'store']);
Route::post('/userData/edit',[UserWakiController::class,'edit']);
Route::post('/userData/delete',[UserWakiController::class,'delete']);


