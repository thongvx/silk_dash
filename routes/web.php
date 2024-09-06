<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mail\EmailController;
use App\Http\Controllers\Dashboard\Upload\TransferController;

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
//-------------------------landing-page-------------------------------------------------------
Route::get('/', function () {
    return view('landing-page.home');
});
Route::get('/affiliate', function () {
    return view('landing-page.affiliate');
});
Route::get('/premium', function () {
    return view('landing-page.premium');
});
Route::get('/api', function () {
    return view('landing-page.api');
});
Route::get('/terms', function () {
    return view('landing-page.terms');
});
Route::get('/copyright', function () {
    return view('landing-page.copyright');
});
Route::get('/play', function () {
    return view('play');
});


//-------------------------encoderController-------------------------------------------------------
Route::get('/startEncoderTask', [\App\Http\Controllers\admin\EncoderController::class, 'startEncoderTask']);
Route::get('/finishEncoder', [\App\Http\Controllers\admin\EncoderController::class, 'finishEncoder']);
Route::get('/deleteFinishedEncoderTask', [\App\Http\Controllers\admin\EncoderController::class, 'deleteFinishedEncoderTask']);
Route::get('/encoderFaild', [\App\Http\Controllers\admin\EncoderController::class, 'encoderFaild']);
//----------------------------audio controller-----------------------------------------------------
Route::get('/uploadAudio', [\App\Http\Controllers\admin\AudioController::class, 'uploadAudio']);
Route::get('/startCopyAudio', [\App\Http\Controllers\admin\AudioController::class, 'startCopyAudio']);
Route::get('/finishCopyAudio', [\App\Http\Controllers\admin\AudioController::class, 'finishCopyAudio']);

//-------------------------storageController-------------------------------------------------------
Route::get('/startStorageTask', [\App\Http\Controllers\admin\StorageController::class, 'startStorageTask']);
Route::get('/finishStorage', [\App\Http\Controllers\admin\StorageController::class, 'finishStorage']);

//-----------------------------TiktokController----------------------------------------------------
Route::get('/addVideoTiktok/{slug}', [\App\Http\Controllers\admin\TiktokController::class, 'addVideoTiktok']);
Route::get('/updateVideoTiktok', [\App\Http\Controllers\admin\TiktokController::class, 'updateVideoTiktok']);

//-------------------------transferController------------------------------------------------------
Route::get('/startTransferTask', [\App\Http\Controllers\admin\TransferController::class, 'startTransferTask']);
Route::get('/updateLinkTransfer', [\App\Http\Controllers\admin\TransferController::class, 'updateLinkTransfer']);
Route::get('/updateFailedTransfer', [\App\Http\Controllers\admin\TransferController::class, 'updateFailedTransfer']);
Route::get('/deleteTransferTask', [\App\Http\Controllers\admin\TransferController::class, 'deleteTransferTask']);

//-------------------------updateController--------------------------------------------------------
Route::get('/updatePoster', [\App\Http\Controllers\admin\UpdateController::class, 'updatePoster']);
Route::get('/uploadvideo', [\App\Http\Controllers\admin\UpdateController::class, 'uploadVideo']);
Route::get('/updateInfoStream', [\App\Http\Controllers\admin\UpdateController::class, 'updateInfoStream']);
Route::get('/updateInfoDownload', [\App\Http\Controllers\admin\UpdateController::class, 'updateInfoDownload']);
Route::get('/updateInfoEncoder', [\App\Http\Controllers\admin\UpdateController::class, 'updateInfoEncoder']);
Route::get('/getFolderid/{userid}', [\App\Http\Controllers\admin\UpdateController::class, 'getFolderid']);
Route::get('/copyHlsTiktok', [\App\Http\Controllers\admin\UpdateController::class, 'copyHlsTiktok']);
//-------------------------Play and download--------------------------------------------------------
Route::get('/p/{slug}', [\App\Http\Controllers\PlayController::class, 'play'])->name('play');
Route::get('/testplay/{id}', [\App\Http\Controllers\PlayController::class, 'testplay'])->name('testplay');
Route::get('/d/{slug}', [\App\Http\Controllers\DownloadController::class, 'showDownloadPage'])->name('download');
Route::post('/verify-recaptcha/{slug}', [\App\Http\Controllers\DownloadController::class, 'download'])->name('verify-recaptcha');
Route::post('/addDownloadVideo', [\App\Http\Controllers\DownloadController::class, 'addDownloadVideo']);

//-------------------------menu--------------------------------------------------------
Route::post('/update-minimenu', [\App\Http\Controllers\MiniMenuController::class, 'update'])->name('update.minimenu');

//-------------------------auth user-------------------------------------------------------
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->middleware('check.reset.token');
Route::get('/getUserID/{keyAPI}', [App\Http\Controllers\getUserIDController::class, 'getUserID']);

Route::get('/zoom-me', [App\Http\Controllers\Dashboard\HomeController::class, 'zoomMe']);

Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Dashboard\HomeController::class, 'dashboard'])->name('dashboard');
    //Upload
    Route::get('/upload', [\App\Http\Controllers\Dashboard\UploadController::class, 'index'])->name('index');
    Route::post('/cloneVideo', [\App\Http\Controllers\Dashboard\VideoController::class, 'cloneVideo']);
    //Transfer
    Route::post('/postTransfer', [\App\Http\Controllers\Dashboard\UploadController::class, 'postTransfer'])->name('post.link.transfer');
    Route::get('/getProgressTransfer', [\App\Http\Controllers\Dashboard\UploadController::class, 'getProgressTransfer']);
    Route::post('/retryTransfer', [TransferController::class, 'retryTransfer']);
    Route::post('/removeTransfer', [TransferController::class, 'removeTransfer']);
    Route::post('/removeAllTransferFailed', [TransferController::class, 'removeAllTransferFailed']);
    //webUpload
    Route::get('/uploadRemoteStatus', [\App\Http\Controllers\Dashboard\UploadController::class, 'getProgress']);
    Route::post('/uploadRemote', [\App\Http\Controllers\Dashboard\UploadController::class, 'remoteUploadDirect']);
    //Manage Video
    Route::resource('/video', \App\Http\Controllers\Dashboard\VideoController::class);
    Route::get('/control', [\App\Http\Controllers\Dashboard\VideoController::class, 'control'])->name('dashboard.video.control');
    Route::post('/video/multiple', [\App\Http\Controllers\Dashboard\VideoController::class, 'destroyMultiple'])->name('dashboard.video.destroyMultiple');
    Route::post('/videos/move', [\App\Http\Controllers\Dashboard\VideoController::class, 'moveVideos'])->name('dashboard.video.move');
    Route::resource('folder', \App\Http\Controllers\Dashboard\FolderController::class);
    Route::post('/video/edit/multiple', [\App\Http\Controllers\Dashboard\VideoController::class, 'updateMultipleTitles']);
    Route::get('/edit-video/{video}', [\App\Http\Controllers\Dashboard\VideoController::class, 'editVideo'])->name('video.editVideo');
    Route::post('/uploadSub', [\App\Http\Controllers\Dashboard\UploadController::class, 'uploadSub']);
    // DMCA
    Route::get('dmca',function (){
        $data['title'] = 'DMCA';
        return view('dashboard.dmca.dmca', $data);
    });
    Route::get('dmca/1',function (){
        $data['title'] = 'DMCA';
        return view('dashboard.dmca.dmcaInfo', $data);
    });
    //Report
    Route::resource('report', \App\Http\Controllers\Dashboard\Report\ReportController::class);
    Route::post('/request-payment', [\App\Http\Controllers\Dashboard\Report\PaymentController::class, 'store'])->name('request.payment');
    //Support
    Route::resource('/support', \App\Http\Controllers\Dashboard\Support\TicketController::class);
    Route::post('/postTicket', [\App\Http\Controllers\Dashboard\Support\TicketController::class, 'postTicket']);
    Route::get('/completeTicket/{ticketID}', [\App\Http\Controllers\Dashboard\Support\TicketController::class, 'completeTicket'])->name('complete.ticket');
    //MyAccount
    Route::resource('/setting', \App\Http\Controllers\Dashboard\Setting\SettingController::class);
    Route::post('/update-profile', [App\Http\Controllers\Auth\ProfileController::class, 'update'])->name('update.profile');
    Route::post('/update-player', [\App\Http\Controllers\Dashboard\Setting\PlayerSettingController::class, 'update'])->name('update.player');
    Route::post('/change-password', [\App\Http\Controllers\Auth\ProfileController::class, 'changePassword'])->name('change.password');
    Route::post('/change-email', [\App\Http\Controllers\Auth\ProfileController::class, 'changeEmail'])->name('change.email');
    Route::post('/updateSetting', [\App\Http\Controllers\Dashboard\Setting\SettingController::class, 'update']);
    Route::post('/updateCustomAds', [\App\Http\Controllers\Dashboard\Setting\CustomAdsController::class, 'updateCustomAds'])->name('updateCustomAds');
    //Notification
    Route::post('/notifications/readall', [\App\Http\Controllers\Dashboard\Statistic\NotificationController::class, 'readAll'])->name('notifications.readall');
    Route::post('/notifications/deleteall', [\App\Http\Controllers\Dashboard\Statistic\NotificationController::class, 'deleteAll'])->name('notifications.deleteall');
    Route::post('/notifications/read/{id}', [\App\Http\Controllers\Dashboard\Statistic\NotificationController::class, 'read'])->name('notifications.read');
    //API
    Route::get('/regenerateToken', [App\Http\Controllers\Auth\ProfileController::class, 'regenerateToken'])->name('regenerate.token');
    Route::get('/retryKeyApi', [App\Http\Controllers\Auth\ProfileController::class, 'retryKeyApi'])->name('retryKeyApi');
    // load page
    Route::get('/loadPage', [\App\Helpers\ModelHelpers::class, 'loadPage']);
    Route::post('/control-datatable', [\App\Http\Controllers\DatatableController::class, 'datatableControl']);
    //direct play
    Route::get('/v/{slug}', [\App\Http\Controllers\PlayController::class, 'directPage'])->name('vPlay');
});

Route::middleware(['role:admin', 'auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\admin\HomeAdminController::class, 'index'])->name('admin');
    //compute
    Route::resource('/compute', \App\Http\Controllers\admin\ComputeController::class);
    //mail
    Route::get('/mail', [\App\Http\Controllers\admin\EmailAdminController::class, 'index'])->name('mail');
    //user
    Route::resource('/user', \App\Http\Controllers\admin\UsersAdminController::class);
    Route::post('/updateEarning', [\App\Http\Controllers\admin\UsersAdminController::class, 'updateEarning']);
    Route::post('/updateUser', [\App\Http\Controllers\admin\UsersAdminController::class, 'updateUser']);
    Route::post('send-email/{user}', [\App\Http\Controllers\admin\UsersAdminController::class, 'sendMail'])->name('send.email');
    //manageTask
    Route::get('/manageTask', [\App\Http\Controllers\admin\ManageTaskController::class, 'index'])->name('manageTask');
    Route::post('/manageTask/retryEncoder', [\App\Http\Controllers\admin\ManageTaskController::class, 'retryEncoder'])->name('retryEncoder');
    Route::post('/manageTask/removeEncoder', [\App\Http\Controllers\admin\ManageTaskController::class, 'removeEncoder'])->name('removeEncoder');
    Route::post('/manageTask/retryTransfer', [\App\Http\Controllers\admin\ManageTaskController::class, 'retryTransferTask']);
    Route::post('/manageTask/removeTransfer', [\App\Http\Controllers\admin\ManageTaskController::class, 'removeTransferTask']);
    //statistic
    Route::get('/statistic', [\App\Http\Controllers\admin\StatisticController::class, 'index'])->name('statistic');
    //supportAdmin
    Route::resource('/supportAdmin', \App\Http\Controllers\admin\TicketAdminController::class);
    //reportAdmin
    Route::resource('/payment', \App\Http\Controllers\admin\PaymentController::class);
    //videoAdmin
    Route::resource('/videoAdmin', \App\Http\Controllers\admin\VideoAdminController::class);
    Route::get('/removeRedis/{slug}', [\App\Http\Controllers\admin\VideoAdminController::class, 'removeCacheVideo']);
    Route::get('/deleteVideo/{slug}', [\App\Http\Controllers\admin\VideoAdminController::class, 'deleteVideo']);
    Route::get('/addPremium', [\App\Http\Controllers\admin\UsersAdminController::class, 'addPremium']);
});
//-------------------------send mail-------------------------------------------------------
Route::prefix('email')->group(function () {
    Route::get('/send-email', [EmailController::class, 'sendEmails']);
    Route::post('/send-discount-emails', [EmailController::class, 'sendDiscountProgramEmails'])->name('send.discount.emails');
    Route::get('/view-discount-emails', [EmailController::class, 'viewDiscountProgramEmails']);
    Route::post('/send-zoom-emails', [EmailController::class, 'sendZoomEmails'])->name('send.zoom.emails');
});
Route::get('/send-mail-api', [\App\Http\Controllers\Mail\EmailAPIController::class, 'SendMailAPI']);
Route::get('/getDataRedis/{slug}', [\App\Http\Controllers\admin\UsersAdminController::class, 'getDataRedis']);

Route::get('updateViewUpdate/{videoId}', [\App\Http\Controllers\VideoViewController::class, 'updateView']);
//-------------------------statistic-------------------------------------------------------
Route::prefix('statistic')->group(function () {
    Route::get('topCountry', [\App\Http\Controllers\Dashboard\Statistic\StatisticController::class, 'topCountry'])->name('statistic.topCountry');
    Route::get('topVideo', [\App\Http\Controllers\Dashboard\Statistic\StatisticController::class, 'topVideo'])->name('statistic.topVideo');
});
//-------------------------login user-------------------------------------------------------
Route::get('/login-as/{user}', [\App\Http\Controllers\admin\UsersAdminController::class, 'loginAs'])->name('admin.login-as');

Route::get('/test', function () {
    $data['title'] = 'Upload';
    $data['folders'] = '1';
    $data['currentFolderName'] = '1';
    return view('dashboard.upload.webupload1', $data);
});

//-------------------------test-------------------------------------------------------
Route::get('/getAllVideo/{user_id}', [\App\Http\Controllers\admin\TestController::class, 'getAllVideo']);
