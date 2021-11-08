<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $request;
    private $repository;


    /**
     * Create a new controller instance.
     * 
     * @param  App\Http\Requests\StoreUpdateUser  $request
     */
    public function __construct(Request $request, User $user)
    {
        $this->request = $request;    
        $this->repository = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->latest()->paginate();
        return view('app', compact('users'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$events = Event::latest()->paginate();
        //return view('admin.pages.events.index', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        if(!$user = User::find($user)){
            return redirect()->back();    
        }
        return view('admin.pages.places.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *     
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUser $request ,$id)
    {
        if(!$user = User::find($id)){
            return redirect()->back();
        }
        $data = $request->all();
        //$data = $this->request->all();
        $data['visible'] = $data['visible']=='on' ? 1 : 0;        
        
        $user->update($data);

        return redirect()
                ->route('events.index',$user['id'])
                ->with('message', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
