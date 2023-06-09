<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Pages\IndexPageController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('api.posts.')->prefix('/posts')->group(function () {
    Route::get('', [PostController::class, 'index'])->name('index');
    Route::get('/{post}', [PostController::class, 'show'])->name('show');
});

Route::name('api.categories.')->prefix('/categories')->group(function () {
    Route::get('', [CategoryController::class, 'index'])->name('index');
    Route::get('/{category}', [CategoryController::class, 'show'])->name('show');
});

Route::name('api.roles.')->prefix('/roles')->group(function () {
    Route::get('', [RoleController::class, 'index'])->name('index');
    Route::get('/{category}', [RoleController::class, 'show'])->name('show');
});

Route::name('api.index')->group(function () {
    Route::get('', IndexPageController::class)->name('index');
});
