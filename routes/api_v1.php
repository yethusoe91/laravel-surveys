<?php

use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormInputController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('user')->group(function(){
    Route::post('register',[UserController::class ,'register']);
    Route::post('login',[UserController::class ,'login']);
});

Route::prefix('backend')->middleware('auth:sanctum')->group(function(){

    Route::prefix('forms')->group(function(){
        Route::get('/', [FormController::class, 'getAllForms']);
        Route::post('create',[FormController::class,'createForm']);
        Route::post('update/{id}',[FormController::class,'updateForm']);
        Route::post('destroy/{id}',[FormController::class,'deleteForm']);

        Route::prefix('input')->group(function(){
            Route::get('types', [FormInputController::class, 'types']);
            Route::post('addtoform',[FormInputController::class,'addInputToForm']);
            Route::post('update/{id}',[FormInputController::class,'updateInput']);
            Route::post('destroy/{id}',[FormInputController::class,'deleteInput']);
        });
    });

    

});