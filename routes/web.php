<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Dashboard\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/upload', [\App\Http\Controllers\Dashboard\UploadController::class, 'upload'])->name('upload');
    Route::get('/video', [\App\Http\Controllers\Dashboard\VideoController::class, 'index'])->name('video.index');
});

Route::get('/control', [\App\Http\Controllers\Dashboard\VideoController::class, 'control'])->name('video.control');

Route::get('/box-upload', [\App\Http\Controllers\Dashboard\UploadController::class, 'box_upload']);
Route::post('getProgress', [\App\Http\Controllers\Dashboard\UploadController::class, 'getProgress']);
Route::post('uploadRemote', [\App\Http\Controllers\Dashboard\UploadController::class, 'remoteUploadDirect']);
Route::post('/download', [\App\Http\Controllers\DownloadController::class, 'download']);




