<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Route;

// Route::name('site.')->controller(SiteController::class)->group(function(){
//     Route::get('/','index')->name('index');
// });

Route::get('/',[SiteController::class,'index'])->name('site.index');
Route::get('about',[SiteController::class,'about'])->name('site.about');
Route::get('contact',[SiteController::class,'contact'])->name('site.contact');
Route::get('shop',[SiteController::class,'shop'])->name('site.shop');
Route::get('cart',[SiteController::class,'cart'])->name('site.cart');
Route::get('blog',[Sitecontroller::class,'blog'])->name('site.blog');
Route::get('blogdetail',[Sitecontroller::class,'blogdetail'])->name('site.blogdetail');


Route::post('Contactmail', [MailController::class, 'Contactmail'])->name('site.contactmail');









