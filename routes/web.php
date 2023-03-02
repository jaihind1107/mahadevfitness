<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\feeController;
use Illuminate\Support\Facades\Artisan;


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache is cleared";
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', [HomeController::class, 'homePage'])->name('home');
Route::get('/landing', [HomeController::class, 'landingpage'])->name('landingpage');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'homePage'])->name('dashboard');

    Route::get('/register', [registerController::class, 'regview'])->name('register');
    Route::post('/register_mem', [registerController::class, 'register_menber'])->name('register_mem');

    Route::get('/delete/{id}', [registerController::class, 'delete'])->name('delete');
    Route::get('/member_view', [registerController::class, 'member_view'])->name('member_view');
    Route::post('/edit', [registerController::class, 'edit_member'])->name('edit');

    Route::get('/fee', [feeController::class, 'fee_view'])->name('fee');
    Route::get('/view', [feeController::class, 'pay_view'])->name('view');
    Route::post('/pay_fee', [feeController::class, 'pay_fee'])->name('pay_fee');
    Route::any('/fee_report', [feeController::class, 'fee_report'])->name('fee_report');

});
