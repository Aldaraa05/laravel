<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\V1\AngiController;
use App\Http\Controllers\Api\V1\SuragchController;
use App\Http\Controllers\Api\V1\BagshController;
 
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

    Route::group(['middleware' => ['auth:sanctum']], function() {
        Route::apiResource('angiud', AngiController::class);
        Route::apiResource('suragchNar', SuragchController::class);
        Route::apiResource('bagshNar', BagshController::class);
        
        Route::delete('deleteSuragch/{id}', 'SuragchController@destroy');
        Route::delete('deleteBagsh/{id}', 'BagshController@destroy');

        Route::put('updateBagsh/{id}', 'BagshController@edit');
        Route::put('updateSuragch/{id}', 'SuragchController@edit');

        Route::post('logout', 'BagshController@logout');

        Route::post('addAngi', 'AngiController@add');

    });
    
    Route::post('signInSuragch', 'SuragchController@signIn');
    Route::post('signInBagsh', 'BagshController@signIn');

    Route::post('addBagsh', 'BagshController@create');
    Route::post('addSuragch', 'SuragchController@create');
    
});

 



