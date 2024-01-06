<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\StudentAPIController;
use App\Http\Controllers\API\StudentAPIController;
use App\Http\Controllers\API\MarkAPIController;;


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


Route::resource('students', '\App\Http\Controllers\API\StudentAPIController', ['except' => ['update']]);
Route::post('students/{student}', '\App\Http\Controllers\API\StudentAPIController@update');

Route::resource('marks', '\App\Http\Controllers\API\MarkAPIController', ['except' => ['update']]);



// TODO: Implement changes for middleware concept later on

// Route::group([
//     'middleware' => ['auth:api'],
// ], function () {

//     Route::resource('students', '\App\Http\Controllers\API\StudentAPIController', ['except' => ['update']]);
//     Route::post('students/{student}', '\App\Http\Controllers\API\StudentAPIController@update');

// });
