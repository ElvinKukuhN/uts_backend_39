<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agama39Controller;
use App\Http\Controllers\User39Controller;
use App\Http\Controllers\Detail_data39Controller;
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

Route::get('/', function () {

    if (Auth::check()) {
        $role = Auth::user()->role;
    } else {
        $role = null;
    }

    return view('dashboard', [
        'role' => $role
    ]);
})->name('index39');

Route::middleware(['auth', 'hakakses:role'])->group(function () {

    // User
    Route::get('/users39', [User39Controller::class, 'users39'])->name('users39');
    Route::get('/detailUser39/{id}', [User39Controller::class, 'detailUser39'])->name('detailUser39');
    Route::get('/profile39', [User39Controller::class, 'profile39'])->name('profile39');


    Route::get('/updatePassword39', [User39Controller::class, 'updatePassword39'])->name('updatePassword39');
    Route::post('/updatePasswordProses39/{id}', [User39Controller::class, 'updatePasswordProses39'])->name('updatePasswordProses39');


    Route::get('/register39', [User39Controller::class, 'register39'])->name('register39');
    Route::post('/registerProses39', [User39Controller::class, 'registerProses39'])->name('registerProses39');

    Route::get('/logout39', [User39Controller::class, 'logout39'])->name('logout39');

    // Detail data
    Route::get('/detailData39', [Detail_data39Controller::class, 'detailData39'])->name('detailData39');

    Route::get('/createData39', [Detail_data39Controller::class, 'createData39'])->name('createData39');
    Route::post('/createDataProses39', [Detail_data39Controller::class, 'createDataProses39'])->name('createDataProses39');

    Route::get('/updateData39', [Detail_data39Controller::class, 'updateData39'])->name('updateData39');
    Route::post('/updateDataProses39', [Detail_data39Controller::class, 'updateDataProses39'])->name('updateDataProses39');
});

Route::middleware(['auth', 'hakadmin:role'])->group(function () {
    // agama
    Route::get('/agama39', [Agama39Controller::class, 'agama39'])->name('agama39');

    Route::get('/createAgama39', [Agama39Controller::class, 'createAgama39'])->name('createAgama39');
    Route::post('/createAgama39Proses', [Agama39Controller::class, 'createAgama39Proses'])->name('createAgama39Proses');

    Route::get('/deleteAgama39Proses/{id}', [Agama39Controller::class, 'deleteAgama39Proses'])->name('deleteAgama39Proses');

    Route::get('/updateAgama39/{id}', [Agama39Controller::class, 'updateAgama39'])->name('updateAgama39');
    Route::post('/updateAgama39Proses/{id}', [Agama39Controller::class, 'updateAgama39Proses'])->name('updateAgama39Proses');

    // user
    Route::get('/deleteUser39/{id}', [User39Controller::class, 'deleteUser39'])->name('deleteUser39');
    Route::get('/approveUser39/{id}', [User39Controller::class, 'approveUser39'])->name('approveUser39');
});

Route::get('/login39', [User39Controller::class, 'login39'])->name('login39');
Route::post('/loginProses39', [User39Controller::class, 'loginProses39'])->name('loginProses39');
