<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\lawyer;
use Illuminate\Support\Composer;

class TeamController extends Controller
{
    public function index()
    {

        $lawyers = Lawyer::where('is_active', true)->get();

        return view('team::index', compact('lawyers'));
    }

    public function show($id)
    {
        $lawyer = lawyer::where('is_active', true)->findOrFail($id);

        return view('team::show', compact('lawyer'));
    }
}
