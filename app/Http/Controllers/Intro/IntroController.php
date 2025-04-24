<?php

namespace App\Http\Controllers\Intro;

use App\Http\Controllers\Controller;

class IntroController extends Controller
{
    public function index()
    {
        return view('intro::index', ['title' => 'Intro']);
    }
}