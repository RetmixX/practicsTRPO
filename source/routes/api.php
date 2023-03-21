<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth', \App\Http\Controllers\Account\AuthController::class);

Route::group(['middleware' => 'auth:sanctum'], function (){
    //group
    Route::apiResource('groups', \App\Http\Controllers\Group\GroupController::class);
    Route::post('groups/{group}/students/{student}/add', [\App\Http\Controllers\Group\GroupController::class, 'addStudentToGroup']);
    Route::post('groups/{group}/students/{student}/remove', [\App\Http\Controllers\Group\GroupController::class, 'removeStudentFromGroup']);

    //student
    Route::apiResource('students', \App\Http\Controllers\Workers\StudentController::class);

    //teacher
    Route::apiResource('teachers', \App\Http\Controllers\Workers\TeacherController::class);

    //event
    Route::apiResource('events', \App\Http\Controllers\EventController::class);
});
