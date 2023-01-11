<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class DataController extends Controller
{
    public function getTopCars()
    {
        $cars = Car::where('display', true)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return $cars;
    }

    // Metode atgriež izvēlēto Car ierakstu, ja tas ir publicēts
    public function getCar(Car $car)
    {
        $selectedCar = Car::where([
                'id' => $car->id,
                'display' => true,
            ])
            ->firstOrFail();
        return $selectedCar;
    }

    // Metode atgriež 3 publicētus Car ierakstus nejaušā secībā,
    // izņemot izvēlēto Car ierakstu
    public function getRelatedCars(Car $car)
    {
        $cars = Car::where('display', true)
            ->where('id', '<>', $car->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return $cars;
    }
}
