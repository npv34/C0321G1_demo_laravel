<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return redirect()->route('admin.dashboard');
})->name('home');

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('auth.showFormLogin');

Route::post('/login', [AuthController::class,'login'])->name('submitLogin');

Route::get('register', [AuthController::class, 'showFormRegister'])->name('auth.showFormRegister');
Route::post('register', [AuthController::class, 'register'])->name('auth.register')->middleware('checkAge');

Route::middleware(['auth', 'setLocale'])->prefix('admin')->group(function () {

    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/{id}/detail', [UserController::class, 'show'])->name('users.show');
        Route::post('/{id}/update', [UserController::class, 'edit'])->name('users.edit');
        Route::get('/{id}/update', [UserController::class, 'update'])->name('users.update');
        Route::get('/search', [UserController::class, 'search'])->name('users.search');
        Route::get('/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    });

    Route::prefix('groups')->group(function () {
        Route::get('/', [GroupController::class, 'index'])->name('groups.index');

        Route::get('/{id}/users', [GroupController::class, 'getUsers'])->name('groups.getUsers');
        Route::get('/{id}/delete', [GroupController::class, 'destroy'])->name('groups.destroy');
    });

    Route::prefix('weather')->group(function (){
        Route::get('/current', [WeatherController::class, 'getCurrentWeather'])->name('weather.getCurrentWeather');
    });

    Route::post('language', [LangController::class, 'setLocale'])->name('lang.setLocale');

    Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
});





