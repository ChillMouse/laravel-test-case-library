<?php

    use App\Http\Controllers\AdministrationAuthors;
    use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administration;
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

Route::prefix('/admin')->group(function() {
        Route::get('/', [Administration::class, 'index']);

        Route::prefix('/books')->group(function(){
            Route::get('/', [AdministrationBooks::class, 'index']);
            Route::get('/{id}', [AdministrationBooks::class, 'edit']);
        });

        Route::prefix('/authors')->group(function(){
            Route::get('/', [AdministrationAuthors::class, 'index']);
            Route::post('/', [AdministrationAuthors::class, 'addNewAuthor'])->name('add-new-author');
            Route::get('/{id}', [AdministrationAuthors::class, 'edit']);
        });
    }
);

