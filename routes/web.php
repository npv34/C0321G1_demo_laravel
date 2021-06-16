<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('auth.showFormLogin');

Route::post('/login', function (Request $request) {

    $email = $request->email;
    $password = $request->password;

    if ($email == 'admin@gmail.com' && $password == '123456') {
        echo "Login thanh cong";
        return redirect()->route('home');
    } else {
        return redirect()->route('login');
    }

})->name('submitLogin');

Route::get('register', [AuthController::class,'showFormRegister'])->name('auth.showFormRegister');
Route::post('register', [AuthController::class,'register'])->name('auth.register')->middleware('checkAge');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/{id}/detail', [UserController::class, 'show'])->name('users.show');
        Route::get('/{id?}/update', [UserController::class, 'update'])->name('users.update');
        Route::get('/search', [UserController::class, 'search'])->name('users.search');
    });
});





