<?php

use App\Http\Controllers\UserController;
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

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('/', function () {
    return 'MARKER-API';
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', 'App\Http\Controllers\Auth\AuthController@authenticate');
Route::middleware('jwt.verify')->group(function () {
    Route::resource('/users', UserController::class);
});
