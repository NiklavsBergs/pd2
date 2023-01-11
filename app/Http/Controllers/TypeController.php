<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function list()
    {
        $items = Type::orderBy('name', 'asc')->get();
        return view(
            'type.list',
            [
                'title' => 'Tipi',
                'items' => $items
            ]
        );
    }

    public function create()
    {
        return view(
            'type.form',
            [

                'title' => 'Pievienot tipu',
                'type' => new Type()

            ]
        );
    }

    public function put(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $type = new Type();
        $type->name = $validatedData['name'];
        $type->save();

        return redirect('/types');
    }

    public function update(Type $type)
    {
        return view(
            'type.form',
            [
                'title' => 'Rediģēt tipu',
                'type' => $type
            ]
        );
    }

    public function patch(Type $type, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $type->name = $validatedData['name'];
        $type->save();
        return redirect('/types');
    }

    public function delete(Type $type)
    {
        $type->delete();
        return redirect('/types');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
