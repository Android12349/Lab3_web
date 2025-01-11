<?php

namespace App\Http\Controllers;

use App\Models\Landmark;
use App\Models\City;
use Illuminate\Http\Request;

class LandmarkController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $landmarks = Landmark::with(['city', 'user'])->get();
        return view('landmarks.index', compact('landmarks', 'user'));
    }

    public function create()
    {
        $user = auth()->user();
        $cities = City::all();
        return view('landmarks.create', compact('cities', 'user'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'city_id' => 'required|exists:cities,id',
        ]);

        Landmark::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'city_id' => $validated['city_id'],
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('landmarks.index', compact('user'))->with('success', 'Достопримечательность добавлена!');
    }
}
