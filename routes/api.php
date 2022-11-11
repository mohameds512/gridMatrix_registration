<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\handController;
use App\Http\Controllers\userController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/countries',[handController::class,'getCountries']);
Route::get('/cities/{country_id}',[handController::class,'getCities']);
Route::get('/languages',[handController::class,'getLanguages']);
Route::get('/certs',[handController::class,'getCerts']);

Route::post('/store', [userController::class,'store']);
Route::get('/users',[userController::class,'users']);
