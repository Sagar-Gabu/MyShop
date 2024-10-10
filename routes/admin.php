<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function() {
    
    Route::get('setting',[SettingController::class,'index'])->name('setting.index');
    Route::post('setting',[SettingController::class,'update'])->name('setting.update');

    Route::resource('category',CategoryController::class);
    Route::resource('subcategory',SubCategoryController::class);
    



})->middleware('auth');

