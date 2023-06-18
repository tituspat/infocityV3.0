<?php

use App\Http\Controllers\admin\adminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\user\userController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginRegisterController;
use App\Http\Controllers\HomeController;

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
Auth::routes();

// guest
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
});


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::controller(userController::class)->group(function () {
    // view
    Route::get('/user', 'index');
    // profile
    Route::get('/user/profile/{id}', 'profile');
    Route::post('/user/profile/update', 'profile_update');
    // favorite
    Route::get('/user/favorite/{}', 'profile');
    // detail view postingan
    Route::get('/user/postingan/detail/{id}', 'detail');
    // controller postingan kategori
    Route::get('/user/lomba', 'kegiatan_lomba');
    Route::get('/user/event', 'kegiatan_event');
    Route::get('/user/beasiswa', 'kegiatan_beasiswa');
    Route::get('/user/volunteer', 'kegiatan_volunteer');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::controller(adminController::class)->group(function () {
    // view
    Route::get('/admin', 'index');
    // make postingan
    Route::get('/postingan/tambah', 'tambah');
    Route::post('/postingan/store', 'store');
    // detail view postingan
    Route::get('/postingan/detail/{id}', 'detail');
    // search
    Route::get('/postingan/search', 'search');
    // edit postingan
    // Route::get('/postingan/edit/{id}', 'edit');
    // Route::post('/postingan/update/{id}', 'update');
    // delete postingan
    Route::get('/postingan/hapus/{id}', 'delete');
    Route::get('/postingan/{id}', 'delete');

    // controller postingan kategori
    Route::get('/admin/lomba', 'kegiatan_lomba');
    Route::get('/admin/event', 'kegiatan_event');
    Route::get('/admin/beasiswa', 'kegiatan_beasiswa');
    Route::get('/admin/volunteer', 'kegiatan_volunteer');
    Route::get('/admin/homepage', 'index');
});


// auth
Route::controller(LoginRegisterController::class)->group(function () {
    // make user
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    // login
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    // after login
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    // logout
    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(ResetPasswordController::class)->group(function () {
    // token
    Route::get('/password/forget', 'ForgetPassword')->name('forget.password.get');
    Route::post('/password/forget', 'submitForgetPassword')->name('forget.password.get');
    // reset password
    Route::get('/password/reset/{id}', 'ResetPassword')->name('reset.password.get');
    Route::post('/password/reset', 'submitResetPassword')->name('reset.password.post');
});


Route::get('favorite', function () {
    return view('user.favorite');
});
