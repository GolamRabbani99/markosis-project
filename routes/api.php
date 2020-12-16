<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\ApiloginController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
   
   
    Route::post('/logout', [ApiloginController::class, 'logout']);
});


Route::get('create-token', [ApiloginController::class, 'createtoken']);
Route::get('products', [ProductController::class, 'index']);
Route::post('login', [ApiloginController::class, 'login']);
Route::post('register', [ApiloginController::class, 'register']);


