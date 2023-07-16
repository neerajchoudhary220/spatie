<?php

use App\Http\Controllers\admin\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::get('test', function () {
//     return "working admin route";
// });



// Route::get('login',[AuthController::class,'list']);

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::get('/', 'list')->name('admin.login.page');
    Route::post('login', 'login')->name('admin.login');
});
