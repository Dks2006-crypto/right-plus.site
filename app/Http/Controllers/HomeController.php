<?php

namespace App\Http\Controllers;

use App\Models\advantage;
use App\Models\Intro;
use App\Models\IntroCard;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $adventages = advantage::orderBy('created_at', 'desc')->take(3)->get();

        $intro = Intro::all();

        $introCards = IntroCard::orderBy('created_at', 'desc')->take(3)->get();

        return view('layout.home', compact('adventages', 'intro', 'introCards'));
    }
}
