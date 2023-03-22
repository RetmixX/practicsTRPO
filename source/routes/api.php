<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth', \App\Http\Controllers\Account\AuthController::class);
Route::post('registration', \App\Http\Controllers\Account\RegistrationController::class);

Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::post('users/{user}/approve', \App\Http\Controllers\Account\ApprovedAccountController::class);

    //group
    Route::apiResource('groups', \App\Http\Controllers\Group\GroupController::class);
    Route::post('groups/{group}/students/{student}/add', [\App\Http\Controllers\Group\GroupController::class, 'addStudentToGroup']);
    Route::post('groups/{group}/students/{student}/remove', [\App\Http\Controllers\Group\GroupController::class, 'removeStudentFromGroup']);

    //student
    Route::apiResource('students', \App\Http\Controllers\Workers\StudentController::class);

    //teacher
    Route::apiResource('teachers', \App\Http\Controllers\Workers\TeacherController::class);

    //event
    Route::get('events/search', [\App\Http\Controllers\EventController::class, 'searchEvent']);
    Route::apiResource('events', \App\Http\Controllers\EventController::class);

    Route::get('groups/{group}/tasks/search', [\App\Http\Controllers\TaskController::class, 'searchTasks']);
    Route::apiResource('groups.tasks', \App\Http\Controllers\TaskController::class);
});
