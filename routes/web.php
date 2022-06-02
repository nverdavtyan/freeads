<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/home', function () {
//     return view('home');
// })->name('home');





Auth::routes(['verify' => true]);

/* User Routes */
Route::get('/users/profile', [UsersController::class, 'edit'])->name('users.edit-profile');
Route::put('/users/profile', [UsersController::class, 'update'])->name('users.update-profile');
Route::get('/users/annonces', [UsersController::class, 'index'])->name('users.ads');
Route::get('/users/annonces/{id}', [UsersController::class, 'editads'])->name('users.editads');
Route::post('/users/annonces/update/{id}', [UsersController::class, 'updateads'])->name('users.updateads');


Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::delete('/users/anonnces/{id}', [UsersController::class, 'addestroy'])->name('users.ad-destroy');
/* Ads Routes */

Route::get('/annonce', [AdController::class, 'create'])->name('ad.create');
Route::get('/annonce/details/{id}', [AdController::class, 'addetails'])->middleware(['auth','verified'])->name('ad.details');
Route::match(['GET', 'POST'], '/annonce/create', [AdController::class, 'store'])->name('ad.store');
Route::post('upload', [UploadController::class, 'store']);
Route::get('/', [AdController::class, 'index'])->name('ad.index');
Route::post('/search', [AdController::class, 'search'])->name('ad.search');

/* Messages Routes */

Route::get('/message/{seller_id}/{ad_id}', [MessageController::class, 'create'])->name('message.create');
Route::post('/messages/create', [MessageController::class, 'store'])->name('message.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/messages', [App\Http\Controllers\HomeController::class, 'index'])->name('messages');







