<?php
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/books/list', [ApiController::class, 'selectBookAndAuthor']);
Route::get('/v1/books/by-id', [ApiController::class, 'selectById']);
Route::post('/v1/books/update', [ApiController::class, 'updateById']);
Route::delete('/v1/books/{id}', [ApiController::class, 'deleteById']);
