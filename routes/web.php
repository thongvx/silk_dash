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

Route::get('/loadPage', [\App\Helpers\ModelHelpers::class, 'loadPage']);
Route::get('/uploadvideo', [\App\Http\Controllers\Dashboard\UploadController::class, 'uploadVideo']);


Auth::routes();
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Dashboard\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/upload', [\App\Http\Controllers\Dashboard\UploadController::class, 'upload'])->name('upload');
    Route::get('/video', [\App\Http\Controllers\Dashboard\VideoController::class, 'index'])->name('video.index');
    Route::get('/setting', [\App\Http\Controllers\Setting\SettingController::class, 'index'])->name('setting.index');
});

Route::get('/control', [\App\Http\Controllers\Dashboard\VideoController::class, 'control'])->name('video.control');

Route::get('/uploadRemoteStatus', [\App\Http\Controllers\Dashboard\UploadController::class, 'getProgress']);
Route::post('uploadRemote', [\App\Http\Controllers\Dashboard\UploadController::class, 'remoteUploadDirect']);
Route::post('/download', [\App\Http\Controllers\DownloadController::class, 'download']);





