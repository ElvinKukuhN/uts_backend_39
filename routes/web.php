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

//
Route::get('/', function () {
    return redirect('/login39');
});

Route::group(['middleware' => ['isNotLogin']], function () {
    // Register Login
    Route::view('/register39', 'register');
    Route::view('/login39', 'login');
    Route::post('/register39', [App\Http\Controllers\Register39Controller::class, 'register39']);
    Route::post('/login39', [App\Http\Controllers\Login39Controller::class, 'login39']);
});

// Role Admin
Route::group(['middleware' => ['isAdmin']], function () {

    // API DATA USER
    Route::get('/dashboard39', [User39Controller::class, 'dashboardPage39']);
    Route::get('/user39/{id}', [User39Controller::class, 'detailPage39']);
    Route::get('/user39/{id}/status', [User39Controller::class, 'putUserStatus39']);
    Route::post('/user39/{id}/agama', [User39Controller::class, 'putUserAgama39']);
    Route::get('/user39/{id}/delete', [User39Controller::class, 'deleteUser39']);

    // API AGAMA
    Route::get("/agama39", [Agama39Controller::class, "agamaPage39"]);
    Route::post("/agama39", [Agama39Controller::class, "createAgama39"]);
    Route::get("/agama39/{id}/edit", [Agama39Controller::class, "editAgamaPage39"]);
    Route::post("/agama39/{id}/update", [Agama39Controller::class, "updateAgama39"]);
    Route::get("/agama39/{id}/delete", [Agama39Controller::class, "deleteAgama39"]);

    // API CLIENT DATA USER
    Route::get("/apiclient/dashboard39", [ClientUser39Controller::class, "dashboardPage39"]);
    Route::get("/apiclient/user39/{id}", [ClientUser39Controller::class, "detailPage39"]);
    Route::get("/apiclient/user39/{id}/status", [ClientUser39Controller::class, "putUserStatus39"]);
    Route::post("/apiclient/user39/{id}/agama", [ClientUser39Controller::class, "putUserAgama39"]);
    Route::get("/apiclient/user39/{id}/delete", [ClientUser39Controller::class, "deleteUser39"]);

    // API CLIENT AGAMA
    Route::get("/apiclient/agama39", [ClientAgama39Controller::class, "agamaPage39"]);
    Route::get("/apiclient/agama39/{id}/edit", [ClientAgama39Controller::class, "editAgamaPage39"]);
    Route::post("/apiclient/agama39", [ClientAgama39Controller::class, "createAgama39"]);
    Route::post("/apiclient/agama39/{id}/update", [ClientAgama39Controller::class, "updateAgama39"]);
    Route::get("/apiclient/agama39/{id}/delete", [ClientAgama39Controller::class, "deleteAgama39"]);
});


// Role User
Route::group(['middleware' => ['isUser']], function () {

    // API User
    Route::view('/changePassword39', 'editPW');
    Route::get('/profile39', [User39Controller::class, 'profilePage39']);
    Route::post('/user39', [User39Controller::class, 'putUserDetail39']);
    Route::post('/user39/photo', [User39Controller::class, 'putUserPhoto39']);
    Route::post('/user39/photoKTP', [User39Controller::class, 'putUserPhotoKTP39']);
    Route::post('/user39/password', [User39Controller::class, 'putUserPassword39']);

    // API Client User
    Route::view('/apiclient/changePassword39', 'editPW', ['Use_API' => true]);
    Route::get('/apiclient/profile39', [ClientUser39Controller::class, 'profilePage39']);
    Route::post('/apiclient/user39', [ClientUser39Controller::class, 'putUserDetail39']);
    Route::post('/apiclient/user39/photo', [ClientUser39Controller::class, 'putUserPhoto39']);
    Route::post('/apiclient/user39/photoKTP', [ClientUser39Controller::class, 'putUserPhotoKTP39']);
    Route::post('/apiclient/user39/password', [ClientUser39Controller::class, 'putUserPassword39']);
});

// Welcome Page
Route::get('/halo39', [App\Http\Controllers\Halo39Controller::class, 'halo39']);

// Logout Session
Route::get('/logout39', [User39Controller::class, 'logout39'])->middleware('isLogin');
