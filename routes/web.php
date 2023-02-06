<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'user' => auth()->user()
    ]);
})->name('welcome');

Route::get('/auth/redirect', [App\Http\Controllers\GithubLoginController::class, 'redirect'])->name('github.redirect');
Route::get('/auth/callback', [App\Http\Controllers\GithubLoginController::class, 'login'])->name('github.callback');

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/weather', [App\Http\Controllers\WeatherController::class, 'index'])->name('weather');
});
