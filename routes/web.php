<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::post('/register', 'Auth\RegisterController@register')->name('register');


// Dashboard page controller methods
Route::get('/home/dashboard', [DashboardController::class, 'index'])->name('home.dashboard');
Route::get('//home/dashboard/stocksearch', [DashboardController::class, 'index'])->name('dashboard.search');


// Settings page controller methods
Route::get('/home/settings', [SettingsController::class, 'index'])->name('home.settings');
Route::post('/home/settings/update-password', [SettingsController::class, 'updatePassword'])->name('settings.updatePassword');
Route::post('/home/settings/update-profile', [SettingsController::class, 'updateProfile'])->name('settings.updateProfile');
Route::post('/home/settings/delete-profile-picture', [SettingsController::class, 'deleteProfilePicture'])->name('settings.deleteProfilePicture');


