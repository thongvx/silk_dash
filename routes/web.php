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
Route::get('/updateInfoStream', [\App\Http\Controllers\admin\UpdateController::class, 'updateInfoStream']);

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

    Route::get('dmca',function (){
        $data['title'] = 'DMCA';
        return view('dashboard.dmca.dmca', $data);
    });
    Route::get('dmca/1',function (){
        $data['title'] = 'DMCA';
        return view('dashboard.dmca.dmcaInfo', $data);
    });

    Route::resource('report', \App\Http\Controllers\Dashboard\Report\ReportController::class);
    Route::resource('/support', \App\Http\Controllers\Dashboard\Support\TicketController::class);

    Route::get('premium',function (){
        $data['title'] = 'Premium';
        return view('dashboard.premium', $data);
    });
    Route::resource('/setting', \App\Http\Controllers\Dashboard\Setting\SettingController::class);
    Route::get('affiliate',function (){
        $data['title'] = 'Affiliate';
        return view('dashboard.affiliate', $data);
    });

    Route::post('/notifications/readall', [\App\Http\Controllers\Dashboard\NotificationController::class, 'readAll'])->name('notifications.readall');
    Route::post('/notifications/deleteall', [\App\Http\Controllers\Dashboard\NotificationController::class, 'deleteAll'])->name('notifications.deleteall');
    Route::post('/notifications/read/{id}', [\App\Http\Controllers\Dashboard\NotificationController::class, 'read'])->name('notifications.read');

    Route::post('/updatesetting', [\App\Http\Controllers\Dashboard\Setting\SettingController::class, 'update']);

    Route::post('/update-profile', [App\Http\Controllers\Auth\ProfileController::class, 'update'])->name('update.profile');
    // load page
    Route::get('/loadPage', [\App\Helpers\ModelHelpers::class, 'loadPage']);
    Route::post('/control-datatable', [\App\Http\Controllers\DatatableController::class, 'datatableControl']);

});

Route::middleware(['role:admin', 'auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\admin\HomeAdminController::class, 'index'])->name('admin');
    Route::resource('/compute', \App\Http\Controllers\admin\ComputeController::class);
    Route::resource('/user', \App\Http\Controllers\admin\UsersAdminController::class);
    Route::get('/login-as/{user}', [\App\Http\Controllers\admin\UsersAdminController::class, 'loginAs'])->name('admin.login-as');
    Route::get('/manageTask', [\App\Http\Controllers\admin\ManageTaskController::class, 'index'])->name('manageTask');
    Route::get('/statistic', function (){
        $title = 'Users';
        return view('admin.statistic.statistic', compact('title'));
    });
    Route::get('/support', function (){
        $title = 'support';
        return view('admin.support.support', compact('title'));
    });
    Route::get('/payment', [\App\Http\Controllers\admin\PaymentController::class, 'index'])->name('payment');
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

Route::get('updateView/{videoId}', [\App\Http\Controllers\VideoViewController::class, 'updateView']);
Route::prefix('statistic')->group(function () {
    Route::get('topCountry', [\App\Http\Controllers\Dashboard\StatisticController::class, 'topCountry'])->name('statistic.topCountry');
    Route::get('topVideo', [\App\Http\Controllers\Dashboard\StatisticController::class, 'topVideo'])->name('statistic.topVideo');
    Route::get('viewDate', [\App\Http\Controllers\Dashboard\StatisticController::class, 'viewDate'])->name('statistic.viewDate');
});

