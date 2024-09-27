<?php

use Illuminate\Support\Facades\Route;
use Karlis\Module1\Http\Controllers\NewsController;

Route::prefix('news')->group(function () {
    Route::get('', [NewsController::class, 'index'])->name('news.index');
    Route::post('', [NewsController::class, 'store'])->name('news.store');
    Route::get('/{news}', [NewsController::class, 'show'])->name('news.show');
    Route::patch('/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});
