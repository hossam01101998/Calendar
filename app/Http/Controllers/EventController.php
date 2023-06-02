<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
// carbon nos ayuda a darle formato a varios datos




class EventController extends Controller
{

    static $rules = [
        'title' => 'required',
        'description' => 'required',
        'start' => 'required',
        'end' => 'required',
        'starthour' => 'nullable',
        'endhour' => 'nullable',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('event.index');
    }

    /**
     * Show the the form of creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /** Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */

    // public function store(Request $request){
    //     //
    //     request()->validate(Event::$rules);
    //     $event=Event::create($request->all());
    // }

      //PRUEBO LA OTRA PARA VER SI FUNCIONA LA HORA TAMBIEN
    public function store(Request $request)
    {
        $request->validate(self::$rules);

        $event = Event::create($request->only(['title', 'description', 'start', 'end', 'starthour', 'endhour']));

        return response()->json($event);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */

    public function show(Event $event){
        //
        $event=Event::all();
        return response()->json($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Model\Event $event
     * @return \Illuminate\Http\Response
     */

     public function edit($id){
        //
        $event=Event::find($id);
        //lo de carbon lo voy a quitar para poder usar la hora

        $event->start = Carbon::createFromFormat('Y-m-d H:i:s', $event->start)->format('Y-m-d H:i');
        $event->end=Carbon::createFromFormat('Y-m-d H:i:s', $event->end)->format('Y-m-d H:i');


        // $event->starthour = Carbon::createFromFormat('H:i:s', $event->starthour)->format('H:i');
        // $event->endhour = Carbon::createFromFormat('H:i:s', $event->endhour)->format('H:i');

        // $event->starthour = Carbon::createFromFormat('H:i', $event->start)->format('H:i');
        // $event->endhour = Carbon::createFromFormat('H:i', $event->end)->format('H:i');


        return response()->json($event);

     }


      /** Update the specified resource in storage.
       *
       * @param \Illuminate\Http\Request $request
       * @param \App\Model\Event $event
       * @return \Illuminate\Http\Response
      */

      //PRUEBO LA OTRA PARA VER SI FUNCIONA LA HORA TAMBIEN
    // public function update(Request $request, Event $event){

    //     //
    //     request()->validate(Event::$rules);
    //     $event->update($request->all());
    //     return response()->json($event);

    // }

    public function update(Request $request, Event $event)
    {
        $request->validate(self::$rules);

        $event->update($request->only(['title', 'description', 'start', 'end', 'starthour', 'endhour']));

        return response()->json($event);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Model\Event $event
     * @return \Illuminate\Http\Response
     */

     public function delete($id){
        //
        $event=Event::find($id)->delete();
        return response()->json($event);

     }
    }
