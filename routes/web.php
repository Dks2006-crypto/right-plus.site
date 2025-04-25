<?php

use App\Http\Controllers\Team\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('layout.home');
})->name('home.page');

Route::namespace('Team')->name('team.')->group(function(){
    Route::get('/team', [TeamController::class, 'index'])->name('index');
    Route::get('/team/{id}/show', [TeamController::class, 'show'])->name('person');
});
