<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Team\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.page');

Route::namespace('Team')->name('team.')->group(function(){
    Route::get('/team', [TeamController::class, 'index'])->name('index');
    Route::get('/team/{id}/show', [TeamController::class, 'show'])->name('person');
});
