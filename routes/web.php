<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RevisorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class, 'index']);
Route::get('/cerca', [AdController::class, 'search'])->name('search');

Route::post('/locale/{locale}', [PublicController::class, 'locale'])->name('locale');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//? Create
Route::get('/crea/annuncio', [AdController::class, 'create'])->name('ads.create');
Route::post('/salva/annuncio', [AdController::class, 'store'])->name('ads.store');
//*IMMAGINI
Route::post('/ad/images/upload', [AdController::class, 'uploadImage'])->name('ads.images.upload');
Route::delete('/ad/images/remove', [AdController::class, 'removeImage'])->name('ads.images.remove');
Route::get('/ad/images', [AdController::class, 'getImages'])->name('ads.images');
//? READ
Route::get('/tutti/gli/annunci',[AdController::class,'index'])->name('ads.index');
Route::get('/visualizza/annuncio/{ad}',[AdController::class,'show'])->name('ads.show');
Route::get ('/category/{name}/{id}/ads', [PublicController::class, 'adByCategory'])->name('public.ads.category');

//!REVISOR AREA
Route::get('/revisor/home',[RevisorController::class,'index'])->name('revisor.home');

Route::post('/revisor/ad/{id}/accept',[RevisorController::class,'accept'])->name('revisor.accept');

Route::post('/revisor/ad/{id}/reject',[RevisorController::class,'reject'])->name('revisor.reject');

Route::post('/revisor/ad/{id}',[RevisorController::class,'undo'])->name('revisor.undo');

//? REQUEST REVISOR MAIL
Route::get('/contattaci', [ContactController::class,'contactUs'] )->name('contact_us');
Route::post('/salva/contatto', [ContactController::class, 'storeContact'])->name('save_contact');

//? REQUEST GUEST MAIL
Route::get('/contattaci/guest', [ContactController::class,'guestContact'] )->name('guest_contact');
Route::post('/salva/contatto/guest', [ContactController::class, 'storeGuestContact'])->name('save_guest_contact');

//!ADMIN AREA
Route::get('/admin/home',[AdminController::class,'index'])->name('admin.home');

Route::post('/admin/user/{id}/accept',[AdminController::class,'accept'])->name('admin.accept');

Route::post('/admin/user/{id}/reject',[AdminController::class,'reject'])->name('admin.reject');

// Route::post('/rendi/revisore/{user}',[AdminController::class,'makeRevisor'])->middleware('auth.admin')->name('make_revisor');

//? USER FAVOURITES

Route::post('/attach/user/announcement/{ad}', [AdController::class, 'adsAttachUser'])->name('ads.attach_user');
Route::delete('/detach/user/announcement/{ad}', [AdController::class, 'adsDetachUser'])->name('ads.detach_user');

Route::get('/all/user/ads/saved', [AdController::class, 'adsIndexUser'])->name('ads.index_user');
