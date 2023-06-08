<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutplanController;
use App\Http\Middleware\adminCheckMiddleware;
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

//Route::group(['middleware' => adminCheckMiddleware::class],function (){
    //Admin rute
Route::controller(AdminController::class)->group(function (){
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout')/*->middleware('can:isAdmin')*/;
    Route::get('/admin/profile', [AdminController::class, 'Profile'])->name('admin.profile')/*->middleware('can:isAdmin')*/;
    Route::get('/edit/profile', [AdminController::class, 'EditProfile'])->name('edit.profile')/*->middleware('can:isAdmin')*/;
    Route::post('/store/profile', [AdminController::class, 'StoreProfile'])->name('store.profile');
});
// Rad sa korisnicima
    Route::get('/users/select', [UserController::class, 'UserIndex'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'UserSelect'])->name('users.select');
    Route::get('/user/create', [UserController::class, 'UserCreate'])->name('users.create');
    Route::post('/user/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/users/update/{user}', [UserController::class, 'UserUpdate'])->name('users.update');
    Route::delete('/user/{id}', [UserController::class, 'UserDestroy'])->name('users.destroy');
    Route::get('/users/search/{email}', [UserController::class, 'SearchUser'])->name('users.search');
    Route::get('/users/sort/{role}', [UserController::class, 'UserSort'])->name('users.sort');
//});



//  Workout Plan
Route::get('/workoutplans', [WorkoutplanController::class, 'index'])->name('plans.index');
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
