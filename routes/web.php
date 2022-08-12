<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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
    return redirect('home');
});

Route::get('/sign-up', [AuthController::class, 'signUpView'])
    ->name('sign-up');

Route::get('/login', [AuthController::class, 'loginView'])
    ->name('login');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::post('/login/loginAuth', [AuthController::class, 'loginAuth'])
    ->name('loginAuth');

Route::get('/home', [HomeController::class, 'home'])
    ->name('home');

Route::post('/create-note', [HomeController::class, 'createNote'])
    ->name('create-note');

Route::patch('/update-note/{id}', [HomeController::class, 'updateNote'])
    ->name('update-note');

Route::put('/update-note/{id}', [HomeController::class, 'updateNote'])
    ->name('update-note');

Route::delete('/delete-note/{id}', [HomeController::class, 'deleteNote'])
    ->name('delete-note');
