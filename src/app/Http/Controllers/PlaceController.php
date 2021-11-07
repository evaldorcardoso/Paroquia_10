<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePlace;
use App\Models\place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, place $place)
    {
        $this->request = $request;
        $this->repository = $place;
        /*$this->middleware('auth')->only([
            'create', 'store'
        ]);*/
        $this->middleware('auth')->except([
            'index',
            'show',
            'store'
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = $this->repository->paginate();
        return view('admin.pages.places.index',compact('places'));
        //return 'listagem das congregações';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePlace;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePlace $request)
    {
        $data = $request->only('nome','localidade','pastor');
        $this->repository->create($data);
        return redirect()->route('places.index');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$place = $this->repository->where('id', $id)->first()){
            return redirect()->back();
        }
        return view('admin.pages.places.show',compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$place = $this->repository->where('id', $id)->first()){
            return redirect()->back();
        }
        return view('admin.pages.places.edit',compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePlace;  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdatePlace $request, $id)
    {
        if(!$place = $this->repository->where('id', $id)->first()){
            return redirect()->back();
        }

        $place->update($request->all());
        return redirect()->route('places.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$place = $this->repository->where('id', $id)->first()){
            return redirect()->back();            
        }

        $place->delete();

        return redirect()->route('places.index');
    }

    /**
     * Search PLaces
     */
    public function search(Request $request){
        $request->all();
    }
}
