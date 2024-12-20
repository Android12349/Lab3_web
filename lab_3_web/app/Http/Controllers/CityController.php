<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'foundation_year' => 'required|integer|min:0',
            'mayor' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $city = City::create($validated);

        // Сохранение изображения
        if ($request->hasFile('image')) {
            $this->storeImage($city, $request->file('image'));
        }

        return redirect()->route('cities.index')->with('success', 'Город добавлен!');
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
        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'foundation_year' => 'required|integer|min:0',
            'mayor' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);

        $city->update($validated);

        // Обновление изображения
        if ($request->hasFile('image')) {
            $this->deleteImage($city);
            $this->storeImage($city, $request->file('image'));
        }

        return redirect()->route('cities.index')->with('success', 'Город обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        // Удаление файла изображения
        $this->deleteImage($city);

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
        $trashedCities = City::onlyTrashed()->get();
        return view('cities.trashed', compact('trashedCities'));
    }

    public function restore($id)
    {
        $city = City::onlyTrashed()->findOrFail($id);
        $city->restore();
        return redirect()->route('cities.trashed')->with('success', 'Город восстановлен!');
    }
}
