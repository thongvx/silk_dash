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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/datatable', [\App\Http\Controllers\DatatableController::class, 'datatableControl']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/example', function () {
        // Your code here
    });
});
Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::get('/example', function () {
        // Your code here
    });
   Route::resource('/user',\App\Http\Controllers\admin\UsersAdminController::class);
});
