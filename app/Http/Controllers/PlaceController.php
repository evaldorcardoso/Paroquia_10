<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePlace;
use App\Models\place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(){
        $places = place::all();
        return view('places.index', compact('places'));
    }

    public function create(){
        return view('places.create');
    }

    public function store(StoreUpdatePlace $request){
        $data = $request->all();
        place::create($data);
        return redirect()
                ->route('places.index')
                ->with('message', 'Congregação criada com sucesso!');
    }
}
