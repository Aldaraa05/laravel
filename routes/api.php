<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\V1\AngiController;
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


Route:: group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function() {
    Route::apiResource('angiud', AngiController::class);
    Route::apiResource('suragchNar', SuragchController::class);
    Route::apiResource('bagshNar', BagshController::class);

    Route::post('addAngi', 'AngiController@add');
    Route::post('addBagsh', 'BagshController@create');
    Route::post('addSuragch', 'SuragchController@create');

    Route::delete('removeSuragch/{id}', 'SuragchController@destroy');
    Route::delete('removeBagsh/{id}', 'BagshController@destroy');

    Route::put('updateBagsh/{id}', 'BagshController@edit');
    Route::put('updateSuragch/{id}', 'SuragchController@edit');

    Route::get('signInSuragch', 'SuragchController@signIn');
    Route::get('signInBagsh', 'BagshController@signIn');
});

Route::get('api/v1/angiud/{id}', [AngiController::class, 'show']);
Route::get('api/v1/suragchNar/{id}', [SuragchController::class, 'show']);
Route::get('api/v1/bagshNar/{id}', [BagshController::class, 'show']);


