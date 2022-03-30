<?php

    use App\Http\Controllers\AdministrationAuthorBook;
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
            Route::get('/', [AdministrationBooks::class, 'index'])->name('book-index');
            Route::get('/add', [AdministrationBooks::class, 'create'])->name('add-new-book');
            Route::post('/add', [AdministrationBooks::class, 'createSubmit'])->name('add-new-book-submit');
            Route::get('/{id}', [AdministrationBooks::class, 'update'])->name('book-update');
            Route::post('/{id}', [AdministrationBooks::class, 'updateSubmit'])->name('book-update-submit');
            Route::get('/delete/{id}', [AdministrationBooks::class, 'delete'])->name('book-delete');
        });

        Route::prefix('/authors')->group(function(){
            Route::get('/', [AdministrationAuthors::class, 'index'])->name('author-index');
            Route::get('/add', [AdministrationAuthors::class, 'create'])->name('add-new-author');
            Route::post('/add', [AdministrationAuthors::class, 'createSubmit'])->name('add-new-author-submit');
            Route::get('/{id}', [AdministrationAuthors::class, 'update'])->name('author-update');
            Route::post('/{id}', [AdministrationAuthors::class, 'updateSubmit'])->name('author-update-submit');
            Route::get('/delete/{id}', [AdministrationAuthors::class, 'delete'])->name('author-delete');
        });
    }
);

