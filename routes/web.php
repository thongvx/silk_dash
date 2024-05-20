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

Route::get('/play', function () {
    return view('play');
});


Route::get('/uploadvideo', [\App\Http\Controllers\Dashboard\UploadController::class, 'uploadVideo']);

//-------------------------encoderController-------------------------------------------------------
Route::get('/startEncoderTask', [\App\Http\Controllers\admin\encoderController::class, 'startEncoderTask']);
Route::get('/finishEncoder', [\App\Http\Controllers\admin\encoderController::class, 'finishEncoder']);
//-------------------------storageController-------------------------------------------------------
Route::get('/startStorageTask', [\App\Http\Controllers\admin\storageController::class, 'startStorageTask']);
Route::get('/finishStorage', [\App\Http\Controllers\admin\storageController::class, 'finishStorage']);
//-------------------------transferController-------------------------------------------------------
Route::get('/startTransferTask', [\App\Http\Controllers\admin\TransferController::class, 'startTransferTask']);
Route::get('/updateLinkTransfer', [\App\Http\Controllers\admin\TransferController::class, 'updateLinkTransfer']);
Route::get('/updateFailedTransfer', [\App\Http\Controllers\admin\TransferController::class, 'updateFailedTransfer']);

Route::get('/t/{slug}', [\App\Http\Controllers\play\playController::class, 'play']);
Route::post('/update-minimenu', [\App\Http\Controllers\MiniMenuController::class, 'update'])->name('update.minimenu');

Auth::routes();
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Dashboard\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/upload', [\App\Http\Controllers\Dashboard\UploadController::class, 'upload'])->name('upload');
    Route::post('/postTransfer', [\App\Http\Controllers\Dashboard\UploadController::class, 'postTransfer'])->name('post.link.transfer');
    Route::get('/getProgressTransfer', [\App\Http\Controllers\Dashboard\UploadController::class, 'getProgressTransfer']);
    Route::get('/video', [\App\Http\Controllers\Dashboard\VideoController::class, 'index'])->name('video.index');
    Route::get('/control', [\App\Http\Controllers\Dashboard\VideoController::class, 'control'])->name('video.control');

    Route::get('/uploadRemoteStatus', [\App\Http\Controllers\Dashboard\UploadController::class, 'getProgress']);
    Route::post('/uploadRemote', [\App\Http\Controllers\Dashboard\UploadController::class, 'remoteUploadDirect']);
    Route::post('/download', [\App\Http\Controllers\DownloadController::class, 'download']);


    route::get('report',function (){
        $data['title'] = 'report';
        return view('report.report', $data);
    });
    route::get('support',function (){
        $data['title'] = 'Support';
        return view('support.support', $data);
    });
    Route::get('/setting', [\App\Http\Controllers\Setting\SettingController::class, 'index'])->name('setting.index');

    // load page
    Route::get('/loadPage', [\App\Helpers\ModelHelpers::class, 'loadPage']);
    Route::get('/loadPageVideo', [\App\Helpers\ModelHelpers::class, 'loadPagevideo']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/video/{id}', [App\Http\Controllers\VideoController::class, 'index'])->name('video');
Route::get('/videos', [App\Http\Controllers\VideosController::class, 'index'])->name('videos');
Route::get('/video/{id}/download', [App\Http\Controllers\DownloadController::class, 'download']);
Route::get('/video/{id}/stream', [App\Http\Controllers\StreamController::class, 'index']);
Route::get('/video/{id}/stream/hls', [App\Http\Controllers\StreamController::class, 'hls']);
Route::get('/video/{id}/stream/dash', [App\Http\Controllers\StreamController::class, 'dash']);
Route::get('/video/{id}/stream/hls/{segment}', [App\Http\Controllers\StreamController::class, 'hlsSegment']);
Route::get('/video/{id}/stream/dash/{segment}', [App\Http\Controllers\StreamController::class, 'dashSegment']);
Route::get('/video/{id}/stream/hls/{segment}/download', [App\Http\Controllers\StreamController::class, 'hlsSegmentDownload']);
Route::get('/video/{id}/stream/dash/{segment}/download', [App\Http\Controllers\StreamController::class, 'dashSegmentDownload']);
Route::get('/video/{id}/stream/hls/{segment}/info', [App\Http\Controllers\StreamController::class, 'hlsSegmentInfo']);
Route::get('/video/{id}/stream/dash/{segment}/info', [App\Http\Controllers\StreamController::class, 'dashSegmentInfo']);
Route::get('/video/{id}/stream/hls/{segment}/info/download', [App\Http\Controllers\StreamController::class, 'hlsSegmentInfoDownload']);
Route::get('/video/{id}/stream/dash/{segment}/info/download', [App\Http\Controllers\StreamController::class, 'dashSegmentInfoDownload']);

Route::get('/video/{id}/stream/hls/playlist.m3u8', [App\Http\Controllers\StreamController::class, 'hlsPlaylist']);

