<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'userStore'])->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');
    Route::get('/user/change-password', [UserController::class, 'userChangePassword'])->name('user.change.password');
    Route::post('/user/change-password', [UserController::class, 'userChangePasswordStore'])->name('password.change.store');

});

require __DIR__.'/auth.php';

Route::middleware(['auth','roles:admin'])->group(function(){
  Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');  
  Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
  Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile'); 
  Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store'); 
  Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password'); 
  Route::post('/admin/password/update', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update'); 
});

Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');   

Route::controller(BookController::class)->group(function() {
    Route::get('/book', 'book')->name('book');
    Route::post('/book/update', 'bookUpdate')->name('book.book.update');
});

Route::controller(RoomTypeController::class)->group(function() {
    Route::get('/room/type/list', 'roomTypeList')->name('room.type.list');
    Route::get('/add/room/type', 'addRoomType')->name('add.room.type');
    Route::post('/room/type/store', 'roomTypeStore')->name('room.type.store');
});

Route::controller(RoomController::class)->group(function() {
    Route::get('/edit/room/{id}', 'editRoom')->name('edit.room');
});