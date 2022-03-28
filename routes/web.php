<?php
use App\Http\Controllers\AdministrationAuthors;
use App\Http\Controllers\AdministrationBooks;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration;
use App\Http\Controllers\LandingController;
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

Route::get('/', [LandingController::class, 'index']);

Route::prefix('/admin')->group(function() {
        Route::get('/', [Administration::class, 'index']);

        Route::prefix('/books')->group(function(){
            Route::get('/', [AdministrationBooks::class, 'index']);
            Route::get('/{id}', [AdministrationBooks::class, 'update']);
        });

        Route::prefix('/authors')->group(function(){
            Route::get('/', [AdministrationAuthors::class, 'index']);
            Route::post('/add', [AdministrationAuthors::class, 'create'])->name('add-new-author');
            Route::get('/{id}', [AdministrationAuthors::class, 'update'])->name('author-edit');
            Route::get('/delete/{id}', [AdministrationAuthors::class, 'delete'])->name('author-delete');
        });
    }
);

