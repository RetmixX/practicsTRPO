<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::post('auth',)

Route::group(['middleware' => 'auth:sanctum'], function (){

});
