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
    return view('dashboard.home.home');
});

Route::get('/play', function () {
    return view('play');
});


//-------------------------encoderController-------------------------------------------------------
Route::get('/startEncoderTask', [\App\Http\Controllers\admin\EncoderController::class, 'startEncoderTask']);
Route::get('/finishEncoder', [\App\Http\Controllers\admin\EncoderController::class, 'finishEncoder']);
//-------------------------storageController-------------------------------------------------------
Route::get('/startStorageTask', [\App\Http\Controllers\admin\StorageController::class, 'startStorageTask']);
Route::get('/finishStorage', [\App\Http\Controllers\admin\StorageController::class, 'finishStorage']);
//-------------------------transferController------------------------------------------------------
Route::get('/startTransferTask', [\App\Http\Controllers\admin\TransferController::class, 'startTransferTask']);
Route::get('/updateLinkTransfer', [\App\Http\Controllers\admin\TransferController::class, 'updateLinkTransfer']);
Route::get('/updateFailedTransfer', [\App\Http\Controllers\admin\TransferController::class, 'updateFailedTransfer']);
//-------------------------updateController--------------------------------------------------------
Route::get('/updatePoster', [\App\Http\Controllers\admin\UpdateController::class, 'updatePoster']);
Route::get('/uploadvideo', [\App\Http\Controllers\admin\UpdateController::class, 'uploadVideo']);

Route::get('/t/{slug}', [\App\Http\Controllers\PlayController::class, 'play'])->name('play');
Route::post('/update-minimenu', [\App\Http\Controllers\MiniMenuController::class, 'update'])->name('update.minimenu');

Auth::routes();
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->middleware('check.reset.token');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Dashboard\HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/upload', [\App\Http\Controllers\Dashboard\UploadController::class, 'index'])->name('index');
    Route::post('/postTransfer', [\App\Http\Controllers\Dashboard\UploadController::class, 'postTransfer'])->name('post.link.transfer');
    Route::get('/getProgressTransfer', [\App\Http\Controllers\Dashboard\UploadController::class, 'getProgressTransfer']);

    Route::resource('/video', \App\Http\Controllers\Dashboard\VideoController::class);
    Route::get('/control', [\App\Http\Controllers\Dashboard\VideoController::class, 'control'])->name('dashboard.video.control');
    Route::post('/video/multiple', [\App\Http\Controllers\Dashboard\VideoController::class, 'destroyMultiple'])->name('dashboard.video.destroyMultiple');
    Route::post('/videos/move', [\App\Http\Controllers\Dashboard\VideoController::class, 'moveVideos'])->name('dashboard.video.move');
    Route::resource('folder', \App\Http\Controllers\Dashboard\FolderController::class);

    Route::get('/uploadRemoteStatus', [\App\Http\Controllers\Dashboard\UploadController::class, 'getProgress']);
    Route::post('/uploadRemote', [\App\Http\Controllers\Dashboard\UploadController::class, 'remoteUploadDirect']);
    Route::post('/download', [\App\Http\Controllers\DownloadController::class, 'download']);

    route::get('dmca',function (){
        $data['title'] = 'DMCA';
        return view('dashboard.dmca.dmca', $data);
    });
    route::get('dmca/1',function (){
        $data['title'] = 'DMCA';
        return view('dashboard.dmca.dmcaInfo', $data);
    });

    route::get('report',function (){
        $data['title'] = 'report';
        return view('dashboard.report.report', $data);
    });
    Route::resource('/support', \App\Http\Controllers\Support\TicketController::class);

    route::get('premium',function (){
        $data['title'] = 'Premium';
        return view('dashboard.premium', $data);
    });
    Route::resource('/setting', \App\Http\Controllers\Setting\SettingController::class);

    Route::post('/updatesetting', [\App\Http\Controllers\Setting\SettingController::class, 'update']);

    Route::post('/update-profile', [App\Http\Controllers\Auth\ProfileController::class, 'update'])->name('update.profile');
    // load page
    Route::get('/loadPage', [\App\Helpers\ModelHelpers::class, 'loadPage']);
});

Route::middleware(['role:admin'])->prefix('admin')->group(function () {

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

