<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//Admin rute
Route::controller(AdminController::class)->group(function (){
   Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout')/*->middleware('can:isAdmin')*/;
   Route::get('/admin/profile', [AdminController::class, 'Profile'])->name('admin.profile')/*->middleware('can:isAdmin')*/;
   Route::get('/edit/profile', [AdminController::class, 'EditProfile'])->name('edit.profile')/*->middleware('can:isAdmin')*/;
   Route::post('/store/profile', [AdminController::class, 'StoreProfile'])->name('store.profile');
});

// Select korisnika
Route::get('user/select', [\App\Http\Controllers\UserController::class, 'UserSelect'])->name('user.select');

//// Home Slide All Route
//    Route::controller(HomeSliderController::class)->group(function () {
//        Route::get('/home/slide', 'HomeSlider')->name('home.slide');
//        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
//
//    });

});
//Route::resource('exercise', );
//Login i registracija - koriste se rute iz auth.php
require __DIR__.'/auth.php';
