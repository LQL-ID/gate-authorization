<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
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

Route::group(['prefix' => 'auth', 'as' => 'login.'], function () {
    Route::get('/login', [LoginController::class, 'loginPageForm'])->middleware(['guest'])->name('form');
    Route::post('/authenticate', [LoginController::class, 'authenticate'])->middleware(['guest'])->name('authenticate');
    Route::get('/logout', [LogoutController::class, 'logout'])->middleware(['auth'])->name('destroy');
});

Route::group(['prefix' => '/dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function () {
    Route::get('/welcome', [DashboardController::class, 'displayWelcomingPage'])->name('welcome');

    Route::get('/user-data', [DashboardController::class, 'displayUserDataPage'])->middleware('can:admin')->name('user-data');
    Route::get('/user-roles', [DashboardController::class, 'displayUserGroupByRolesPage'])->middleware('can:manager')->name('user-roles');
    Route::get('/count-user-roles', [DashboardController::class, 'displayCountUserRolesPage'])->middleware('can:user')->name('count-user-roles');
});
