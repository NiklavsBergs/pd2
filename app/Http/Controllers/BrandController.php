<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
   // display all brands
    public function list()
    {
        $items = Brand::orderBy('name', 'asc')->get();

        return view(
            'brand.list',
            [
                'title' => 'Brandi',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        return view(
            'brand.form',
            [

                'title' => 'Pievienot brandu',
                'brand' => new Brand()

            ]
        );
    }

    public function put(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $brand = new brand();
        $brand->name = $validatedData['name'];
        $brand->save();

        return redirect('/brands');
    }

    public function update(Brand $brand)
    {
        return view(
            'brand.form',
            [
                'title' => 'Rediģēt brandu',
                'brand' => $brand
            ]
        );
    }

    public function patch(Brand $brand, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $brand->name = $validatedData['name'];
        $brand->save();
        return redirect('/brands');
    }

    public function delete(Brand $brand)
    {
        $brand->delete();
        return redirect('/brands');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
