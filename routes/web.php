<?php

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AprendizController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('can:viewAny,App\\Models\\Aprendiz')->group(function () {
        Route::get('aprendices', [AprendizController::class, 'index'])->name('aprendices.index');
        Route::middleware('can:create,App\\Models\\Aprendiz')->group(function () {
            Route::get('aprendices/create', [AprendizController::class, 'create'])->name('aprendices.create');
            Route::post('aprendices', [AprendizController::class, 'store'])->name('aprendices.store');
        });
        Route::middleware('can:update,aprendiz')->group(function () {
            Route::get('aprendices/{aprendiz}/edit', [AprendizController::class, 'edit'])->name('aprendices.edit');
            Route::put('aprendices/{aprendiz}', [AprendizController::class, 'update'])->name('aprendices.update');
            Route::patch('aprendices/{aprendiz}', [AprendizController::class, 'update']);
        });
        Route::delete('aprendices/{aprendiz}', [AprendizController::class, 'destroy'])
            ->middleware('can:delete,aprendiz')->name('aprendices.destroy');
    });

    Route::prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
        Route::resource('users', AdminUserController::class)->except('show');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
