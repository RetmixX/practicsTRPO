<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth', \App\Http\Controllers\Account\AuthController::class);
Route::apiResource('groups', \App\Http\Controllers\Group\GroupController::class);

Route::group(['middleware' => 'auth:sanctum'], function (){

});
