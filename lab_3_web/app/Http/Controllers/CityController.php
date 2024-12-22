<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function welcome(User $user)
    {
        $user = auth()->user();

        return view('welcome', compact('user'));
    }

    public function index(User $user)
    {
        $user = auth()->user(); // Текущий пользователь
        $cities = $user->cities()->get();

        return view('users.cities.index', compact('cities', 'user'));
    }

    public function indexForUser(User $user)
    {
        $cities = $user->cities()->get();

        return view('cities.index', compact('cities', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'foundation_year' => 'required|integer|min:0',
            'mayor' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);
    
        $city = City::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);
    
        if ($request->hasFile('image')) {
            $this->storeImage($city, $request->file('image'));
        }
    
        return redirect()->route('users.cities.index', compact('user'))->with('success', 'Город добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        if ($city->user_id !== auth()->id()) {
            abort(403, 'У вас нет прав для изменения этого города.');
        }

        return view('cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        if ($city->user_id !== auth()->id()) {
            abort(403, 'У вас нет прав для изменения этого города.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'foundation_year' => 'required|integer|min:0',
            'mayor' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $city->update($validated);

        return redirect()->route('cities.index')->with('success', 'Город обновлен!');
    }

    public function destroy(City $city)
    {
        if ($city->user_id !== auth()->id()) {
            abort(403, 'У вас нет прав для удаления этого города.');
        }

        $city->delete();

        return redirect()->route('cities.index')->with('success', 'Город удален!');
    }

    /**
     * Хелпер для сохранения изображения.
     */
    protected function storeImage(City $city, $image)
    {
        $imageName = $city->id . '.' . $image->getClientOriginalExtension();
        $path = 'laravel/' . $imageName;
        $image->move(public_path('laravel'), $imageName);
        $city->update(['image' => $path]);
    }

    /**
     * Хелпер для удаления изображения.
     */
    protected function deleteImage(City $city)
    {
        if ($city->image && File::exists(public_path($city->image))) {
            File::delete(public_path($city->image));
        }
    }

    public function trashed()
    {
    $trashedCities = City::onlyTrashed()->where('user_id', auth()->id())->get();
    $user = auth()->user(); // Текущий пользователь
    return view('cities.trashed', compact('trashedCities', 'user'));
    }

    public function restore($id)
    {
        $city = City::onlyTrashed()->findOrFail($id);
        $city->restore();
        return redirect()->route('cities.trashed')->with('success', 'Город восстановлен!');
    }
}
