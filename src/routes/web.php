<?php

use Illuminate\Support\Facades\Route;
use Karlis\Module1\Http\Controllers\NewsController;

Route::prefix('news')->group(function () {
    Route::get('', [NewsController::class, 'index'])->name('news.index');
    Route::post('', [NewsController::class, 'store'])->name('news.store');
    Route::get('/{id}', [NewsController::class, 'show'])->name('news.show');
    Route::put('/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
});
