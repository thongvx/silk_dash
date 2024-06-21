<?php

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
Route::middleware('auth:sanctum')->group(function (){
    Route::get('me', [\App\Http\Controllers\Auth\ProfileController::class, 'getUserInfo'])->name('user.me');
    Route::get('videos', [\App\Http\Controllers\Dashboard\VideoController::class, 'getVideoData']);
});

