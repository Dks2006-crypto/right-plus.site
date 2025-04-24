<?php

use App\Http\Controllers\Intro\IntroController;
use App\Http\Controllers\Main\MainController;
use Illuminate\Support\Facades\Route;

Route::namespace('Main')->name('main.')->group(function() {
    Route::get('/', [IntroController::class, 'index'])->name('page');
});
