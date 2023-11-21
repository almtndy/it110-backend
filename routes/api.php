<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CarouselItemsController;
use App\Http\Controllers\Api\PromptController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Public APIs
Route::post('/login', [AuthController::class, 'login'])->name('user.login');
Route::post('/user', [UserController::class, 'store'])->name('user.store');


//private APIs
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(CarouselItemsController::class)->group(function () {
        Route::get('/carousel',           'index');
        Route::get('/carousel/{id}',      'show');
        Route::post('/carousel',          'store');
        Route::put('/carousel/{id}',      'update');
        Route::delete('/carousel/{id}',   'destroy');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/user',               'index');
        Route::get('/user/{id}',          'show');
        Route::put('/user/{id}',          'update')->name('user.update');
        Route::put('/user/email/{id}',    'email')->name('user.email');
        Route::put('/user/password/{id}', 'password')->name('user.password');
        Route::put('/user/image/{id}', 'image')->name('user.image');
        Route::delete('/user/{id}',        'destroy');
    });
});



// Route::get('/carousel', [CarouselItemsController::class, 'index']);
// Route::get('/carousel/{id}', [CarouselItemsController::class, 'show']);
// Route::post('/carousel', [CarouselItemsController::class, 'store']);
// Route::put('/carousel/{id}', [CarouselItemsController::class, 'update']);
// Route::delete('/carousel/{id}', [CarouselItemsController::class, 'destroy']);

// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/{id}', [UserController::class, 'show']);
// Route::post('/user', [UserController::class, 'store'])->name('user.store');
// Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
// Route::put('/user/email/{id}', [UserController::class, 'email'])->name('user.email');
// Route::put('/user/password/{id}', [UserController::class, 'password'])->name('user.password');
// // Route::put('/user/{id}', [UserController::class, 'update']);
// Route::delete('/user/{id}', [UserController::class, 'destroy']);

// Route::get('/prompt', [PromptController::class, 'index']);
// Route::get('/prompt/{id}', [PromptController::class, 'show']);
// Route::post('/prompt', [PromptController::class, 'store']);
// Route::delete('/prompt/{id}', [PromptController::class, 'destroy']);