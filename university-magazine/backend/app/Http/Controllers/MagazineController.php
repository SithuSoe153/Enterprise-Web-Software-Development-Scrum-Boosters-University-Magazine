<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    public function store()
    {

        $cleanData = request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'open_date' => 'required|date',
            'closure_date' => 'required|date',
        ]);

        $magazine = Magazine::create($cleanData);


        return redirect('dashboard')->with('success', 'Magazine created successfully!');
    }
}