<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Brand;
use App\Models\Type;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{
    public function list()
    {
        $items = Car::orderBy('name', 'asc')->get();

        return view(
            'car.list',
            [
                'title' => 'Mašīnas',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        $types = Type::orderBy('name', 'asc')->get();
        return view(
            'car.form',
            [
                'title' => 'Pievienot mašīnu',
                'car' => new Car(),
                'brands' => $brands,
                'types' => $types,
                
            ]
        );
    }

    private function saveCarData(Car $car, CarRequest $request)
    {
        $validatedData = $request->validated();
        $car->fill($validatedData);
        $car->display = (bool) ($validatedData['display'] ?? false);

        if ($request->hasFile('image')) {
            $uploadedFile = $request->file('image');
            $extension = $uploadedFile->clientExtension();
            $name = uniqid();
            $car->image = $uploadedFile->storePubliclyAs(
                '/',
                $name . '.' . $extension,
                'uploads'
            );
        }
        $car->save();
    }

    public function put(CarRequest $request)
    {
        $car = new Car();
        $this->saveCarData($car, $request);
        return redirect('/cars');
    }

    public function update(Car $car)
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        $types = Type::orderBy('name', 'asc')->get();
        return view(
            'car.form',
            [
                'title' => 'Rediģēt mašīnu',
                'car' => $car,
                'brands' => $brands,
                'types' => $types,
                
            ]
        );
        
    }

    public function patch(Car $car, CarRequest $request)
    {
        $this->saveCarData($car, $request);
        return redirect('/cars');
    }

    public function delete(Car $car)
    {
        $car->delete();
        return redirect('/cars');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
