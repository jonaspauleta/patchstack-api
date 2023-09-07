<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Vulnerability\Factor\FactorController;
use App\Http\Controllers\Vulnerability\VulnerabilityController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', ApiController::class)->name('api');
    Route::post('/login', [AuthController::class, 'store'])->name('login');
    Route::post('/register', [UserController::class, 'store'])->name('user.store');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('/user', [UserController::class, 'show'])->name('user.show');
    Route::put('/user', [UserController::class, 'update'])->name('user.update');

    Route::scopeBindings()->group(function () {
        Route::prefix('/vulnerabilities')->group(function () {
            Route::get('/', [VulnerabilityController::class, 'index'])->name('vulnerabilities.index');
            Route::post('/', [VulnerabilityController::class, 'store'])->name('vulnerabilities.store');

            Route::prefix('{vulnerability}')->group(function () {
                Route::get('/', [VulnerabilityController::class, 'show'])->name('vulnerabilities.show');
                Route::put('/', [VulnerabilityController::class, 'update'])->name('vulnerabilities.update');
                Route::delete('/', [VulnerabilityController::class, 'destroy'])->name('vulnerabilities.delete');

                Route::prefix('/factors')->group(function () {
                    Route::get('/', [FactorController::class, 'index'])->name('vulnerabilities.factors.index');
                    Route::post('/', [FactorController::class, 'store'])->name('vulnerabilities.factors.store');
                    Route::post('/batch', [FactorController::class, 'storeBatch'])->name('vulnerabilities.factors.store.batch');

                    Route::prefix('{factor}')->group(function () {
                        Route::get('/', [FactorController::class, 'show'])->name('vulnerabilities.factors.show');
                        Route::put('/', [FactorController::class, 'update'])->name('vulnerabilities.factors.update');
                        Route::delete('/', [FactorController::class, 'destroy'])->name('vulnerabilities.factors.delete');
                    });
                });
            });
        });
    });
});
