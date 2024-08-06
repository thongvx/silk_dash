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
    Route::get('info', [\App\Http\Controllers\Auth\ProfileController::class, 'getUserInfo'])->name('user.me');

    Route::prefix('file')->group(function () {
        Route::get('listFile', [\App\Http\Controllers\Dashboard\VideoController::class, 'getListFile']);
        Route::get('infoFile', [\App\Http\Controllers\Dashboard\VideoController::class, 'findVideoBySlug']);
        Route::get('renameFile/{id}', [\App\Http\Controllers\Dashboard\VideoController::class, 'update']);
        Route::get('deleteFile', [\App\Http\Controllers\Dashboard\VideoController::class, 'destroyMultiple']);
        Route::get('cloneFile', [\App\Http\Controllers\Dashboard\VideoController::class, 'cloneVideo']);
        Route::get('moveFile', [\App\Http\Controllers\Dashboard\VideoController::class, 'moveVideos']);
        Route::get('deleteFile', [\App\Http\Controllers\Dashboard\VideoController::class, 'destroyMultiple']);
    });
    Route::prefix('folder')->group(function () {
        Route::get('listFolder', [\App\Http\Controllers\Dashboard\FolderController::class, 'getAllFolders']);
        Route::get('renameFolder/{id}', [\App\Http\Controllers\Dashboard\FolderController::class, 'update']);
        Route::get('createFolder', [\App\Http\Controllers\Dashboard\FolderController::class, 'store']);
        Route::get('deleteFolder/{id}', [\App\Http\Controllers\Dashboard\FolderController::class, 'destroy']);
    });
    Route::prefix('upload')->group(function () {
        Route::get('sever', [\App\Http\Controllers\Dashboard\UploadController::class, 'getServer']);
        Route::get('uploadUrl', [\App\Http\Controllers\Dashboard\UploadController::class, 'postTransfer']);
    });
});


