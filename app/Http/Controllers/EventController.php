<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $congregacao = User::find($user);
        $events = Event::where('id_user','=',$user)
                            ->paginate();        
        return view('admin.pages.events.index', compact('events'),compact('congregacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user)
    {
        $congregacao = User::find($user);
        return view('admin.pages.events.create',compact('congregacao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['id_user']=Auth::user()->id;
        $data['event_at']=$data['event_at_d'].' '.$data['event_at_h'];
        unset($data['event_at_d']);
        unset($data['event_at_h']);
        //$auth = Auth::user()->id;
        //dd($data);
        Event::create($data);
        return redirect()
                ->route('events.index',Auth::user()->id)
                ->with('message', 'Evento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user,$id)
    {
        $congregacao = User::find($user);
        $event = Event::find($id);
        return view('admin.pages.events.show',compact('congregacao'),compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$user)
    {
        $congregacao = User::find($user);
        $event = Event::find($id);
        return view('admin.pages.events.edit',compact('congregacao'),compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $user)
    {
        $congregacao = User::find($user);
        if(!$event = Event::find($id)){
            return redirect()->back();
        }
        $data = $request->all();
        $data['event_at']=$data['event_at_d'].' '.$data['event_at_h'];
        unset($data['event_at_d']);
        unset($data['event_at_h']);
        //dd($data);

        $event->update($data);

        return redirect()
                ->route('events.index',$congregacao['id'])
                ->with('message', 'Evento atualizado com sucesso!');
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

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $events = Event::where('title','LIKE',"%{$request->search}%")
                            ->orWhere('description','LIKE',"%{$request->search}%")
                            ->paginate();
        return view('admin.pages.events.index', compact('events', 'filters'));
    }
}
