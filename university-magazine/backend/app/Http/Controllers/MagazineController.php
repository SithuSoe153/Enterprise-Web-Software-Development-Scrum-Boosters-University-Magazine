<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MagazineController extends Controller
{

    public function destroyMagazine(Magazine $magazine)
    {
        // Delete the magazine
        $magazine->delete();

        return redirect('/dashboard')->with('success', 'Magazine deleted successfully!');
    }

    public function profile(Magazine $magazine)
    {
        // Convert finalclosure_date to a Carbon instance
        $finalClosureDate = Carbon::parse($magazine->finalclosure_date);

        // Get the current year
        $currentYear = Carbon::now()->year;

        // Check if the final closure date is in the current year
        $isFinalClosureThisYear = $finalClosureDate->year === $currentYear;

        return view('frontend/Admin/magazine-profile', compact('magazine', 'isFinalClosureThisYear'));
    }
    public function profileUpdate(Request $request, Magazine $magazine)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'string|max:1000',
            'open_date' => 'required|date',
            'closure_date' => 'required|date',
            'finalclosure_date' => 'required|date',
        ]);
        $magazine->update($request->all());

        return redirect('dashboard')->with('success', 'Magazine updated successfully!');
    }

    public function store()
    {
        // dd(request()->all());

        $cleanData = request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'null|string|max:255',
            'open_date' => 'required|date',
            'closure_date' => 'required|date',
            'finalclosure_date' => 'required|date',
        ]);

        $magazine = Magazine::create($cleanData);


        return redirect('dashboard')->with('success', 'Magazine created successfully!');
    }
}