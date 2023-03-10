<?php

use App\Http\Controllers\CountryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('country', [CountryController::class, 'index']);
Route::get('country/{id}', [CountryController::class, 'show']);
Route::post('country', [CountryController::class, 'store']);
Route::put('country/{id}', [CountryController::class, 'update']);
Route::delete('country/{id}', [CountryController::class, 'destroy']);
