<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\StudentAPIController;
use App\Http\Controllers\API\StudentAPIController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::apiResource('students', StudentAPIController::class);

//Route::post('students/{student}', '\App\Http\Controllers\API\StudentAPIController@update');

Route::resource('students', '\App\Http\Controllers\API\StudentAPIController', ['except' => ['update']]);
//Route::get('studentssss', '\App\Http\Controllers\API\StudentAPIController@index');