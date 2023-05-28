<?php

use App\Http\Controllers\UserController;
<<<<<<< HEAD
use App\Http\Controllers\FolderController;
=======
use App\Http\Controllers\ProfileController;
>>>>>>> 050c5e14d1f41edfc10ee5b7709b383ec5a62be4
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MarkerController;
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
<<<<<<< HEAD
Route::resource('marker',MarkerController::class);
=======

Route::get('/', function () {
    return 'MARKER-API';
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'authenticate']);

/*Route::middleware('jwt.verify')->group(function () {
    Route::resource('/users', UserController::class);
<<<<<<< HEAD
});

Route::resource('folder', FolderController::class);

=======
});*/

Route::resource('profile', ProfileController::class);
>>>>>>> 050c5e14d1f41edfc10ee5b7709b383ec5a62be4
>>>>>>> 7c61ccf566f521fc43d4a58e33681517423ad315
