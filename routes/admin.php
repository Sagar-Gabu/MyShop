<?php

use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    
    Route::get('setting',[SettingController::class,'index'])->name('setting.index');
    Route::post('setting',[SettingController::class,'update'])->name('setting.update');
});

