<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Studentapi;
use App\Http\Controllers\StudentData;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;

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

// secure api routes
Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::get('data',[Studentapi::class,'getData']);

    //Students api list
    Route::get('list/{id?}',[StudentData::class,'list']);
    
    // students api add
    Route::post('add',[StudentData::class,'add']);
    
    // students api updated
    Route::put('update',[StudentData::class,'update']);
    
    // students api deleted
    Route::delete('delete/{id}',[StudentData::class,'delete']);
    
    // students api deleted
    Route::get('search/{name}',[StudentData::class,'search']);
    
    // students api validation
    Route::post('save',[StudentData::class,'testData']);
    
    Route::apiResource("member",MemberController::class);
    });

// login api
Route::post("login",[UserController::class,'index']);