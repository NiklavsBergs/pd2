<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\DataController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/brands', [BrandController::class, 'list']);
Route::get('/brands/create', [BrandController::class, 'create']);
Route::post('/brands/put', [BrandController::class, 'put']);
Route::get('/brands/update/{brand}', [BrandController::class, 'update']);
Route::post('/brands/patch/{brand}', [BrandController::class, 'patch']);
Route::post('/brands/delete/{brand}', [BrandController::class, 'delete']);


// Car routes
Route::get('/cars', [CarController::class, 'list']);
Route::get('/cars/create', [CarController::class, 'create']);
Route::post('/cars/put', [CarController::class, 'put']);
Route::get('/cars/update/{car}', [CarController::class, 'update']);
Route::post('/cars/patch/{car}', [CarController::class, 'patch']);
Route::post('/cars/delete/{car}', [CarController::class, 'delete']);

// Auth routes
Route::get('/login', [AuthorizationController::class, 'login'])->name('login');
Route::post('/auth', [AuthorizationController::class, 'authenticate']);
Route::get('/logout', [AuthorizationController::class, 'logout']);

// Types
Route::get('/types', [TypeController::class, 'list']);
Route::get('/types/create', [TypeController::class, 'create']);
Route::post('/types/put', [TypeController::class, 'put']);
Route::get('/types/update/{type}', [TypeController::class, 'update']);
Route::post('/types/patch/{type}', [TypeController::class, 'patch']);
Route::post('/types/delete/{type}', [TypeController::class, 'delete']);

// Data routes
Route::prefix('data')->group(function () {
    Route::get('/get-top-cars', [DataController::class, 'getTopCars']);
    Route::get('/get-car/{car}', [DataController::class, 'getCar']);
    Route::get('/get-related-cars/{car}', [DataController::class, 'getRelatedCars']);
});