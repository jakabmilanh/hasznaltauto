<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */

    public function index()
    {
        $cars = Car::with('carType')->get();
        return view('pages.main', compact('cars'));
    }
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }
        $carTypes = CarType::all();
        return view('pages.new', compact('carTypes'));
    }
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'car_type_id' => 'required|exists:car_types,id',
            'brand_name' => 'required|string|max:255',
            'car_name' => 'required|string|max:255',
            'color' => 'required|string|max:50',
            'engine_liter' => 'required|numeric|min:0|max:10',
            'horsepower' => 'required|integer|min:0',
            'fuel' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
        ]);

        Car::create($validated);

        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }
}
