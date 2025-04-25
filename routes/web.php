<?php

use App\Http\Controllers\Intro\IntroController;
use App\Http\Controllers\Main\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('layout.home');
})->name('home.page');
