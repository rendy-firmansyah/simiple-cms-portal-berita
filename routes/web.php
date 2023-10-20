<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewscontentController;
use App\Http\Controllers\UseraccountController;

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

Auth::routes();

Route::middleware(['web', 'auth'])->group(function () {
    // Rute-rute yang memerlukan autentikasi di sini
    Route::middleware('role:admin')->get('/dashbord-admin', [App\Http\Controllers\HomeController::class, 'index'])->name('dashbord-admin');
    Route::middleware('role:author')->get('/dashbord-author', [App\Http\Controllers\HomeuserController::class, 'index'])->name('dashbord-author');
    Route::get('user/{choice}', [UseraccountController::class, 'index'])->name('user.index');
    
    
    Route::resource('/categories', CategoriesController::class);
    // Route::resource('/authors', AuthorsController::class);
    Route::resource('/news-content', NewscontentController::class);
});


