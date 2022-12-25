<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiclient\User39Controller;
use App\Http\Controllers\apiclient\Agama39Controller;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('users39', User39Controller::class);

// Route::middleware(['auth', 'hakakses:role'])->group(function () {

//     // User
//     Route::get('/users39', [User39Controller::class, 'users39'])->name('users39');
//     Route::get('/detailUser39/{id}', [User39Controller::class, 'detailUser39'])->name('detailUser39');
//     Route::get('/profile39', [User39Controller::class, 'profile39'])->name('profile39');


//     Route::get('/updatePassword39', [User39Controller::class, 'updatePassword39'])->name('updatePassword39');
//     Route::post('/updatePasswordProses39/{id}', [User39Controller::class, 'updatePasswordProses39'])->name('updatePasswordProses39');


//     Route::get('/register39', [User39Controller::class, 'register39'])->name('register39');
//     Route::post('/registerProses39', [User39Controller::class, 'registerProses39'])->name('registerProses39');

//     Route::get('/logout39', [User39Controller::class, 'logout39'])->name('logout39');

//     // // Detail data
//     // Route::get('/detailData39', [Detail_data39Controller::class, 'detailData39'])->name('detailData39');

//     // Route::get('/createData39', [Detail_data39Controller::class, 'createData39'])->name('createData39');
//     // Route::post('/createDataProses39', [Detail_data39Controller::class, 'createDataProses39'])->name('createDataProses39');

//     // Route::get('/updateData39', [Detail_data39Controller::class, 'updateData39'])->name('updateData39');
//     // Route::post('/updateDataProses39', [Detail_data39Controller::class, 'updateDataProses39'])->name('updateDataProses39');
// });

// Route::get('/login39', [User39Controller::class, 'login39'])->name('login39');
// Route::post('/loginProses39', [User39Controller::class, 'loginProses39'])->name('loginProses39');

Route::get("/user39", [User39Controller::class, "getUsers39"]);
Route::get("/user39/{id}", [User39Controller::class, "getUserDetail39"]);
Route::put("/user39/{id}", [User39Controller::class, "putUserDetail39"]);
Route::put("/user39/{id}/photo", [User39Controller::class, "putUserPhoto39"]);
Route::put("/user39/{id}/photoKTP", [User39Controller::class, "putUserPhotoKTP39"]);
Route::put("/user39/{id}/password", [User39Controller::class, "putUserPassword39"]);
Route::put("/user39/{id}/status", [User39Controller::class, "putUserStatus39"]);
Route::put("/user39/{id}/agama", [User39Controller::class, "putUserAgama39"]);
Route::delete("/user39/{id}", [User39Controller::class, "deleteUser39"]);

Route::get("/agama39", [Agama39Controller::class, "getAgama39"]);
Route::get("/agama39/{id}", [Agama39Controller::class, "getDetailAgama39"]);
Route::post("/agama39", [Agama39Controller::class, "postAgama39"]);
Route::put("/agama39/{id}", [Agama39Controller::class, "putAgama39"]);
Route::delete("/agama39/{id}", [Agama39Controller::class, "deleteAgama39"]);
