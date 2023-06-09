<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Auth\LoginController;

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

// Route::get('login', 'admin.auth.login')->name('login');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('language/{language:code}', [App\Http\Controllers\HomeController::class, 'changeLanguage'])->name('changeLanguage');

Route::get('/c', function() {

   Artisan::call('optimize:clear');
   Artisan::call('storage:link');
   Artisan::call('storage');
   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});
