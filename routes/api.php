<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ScoreController;
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

Route::get('players', [PlayerController::class, 'index']);
Route::get('players/{id}', [PlayerController::class, 'show']);
Route::post('players', [PlayerController::class, 'store']);
Route::put('players/{id}', [PlayerController::class, 'update']);
Route::delete('players/{id}', [PlayerController::class, 'destroy']);


Route::post('submitScore/{id}', [PlayerController::class, 'submitScore']);