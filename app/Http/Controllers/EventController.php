<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index(){
        //
        return $this->eventToArray(Event::all());
    }

    public function eventToArray($events){
        $eventArray = [];
        foreach($events as $event){
            if($event->status == 'En attente' ){
                $backgroundColor = '#3dc6ab';
            }elseif($event->status == 'Encoure'){
                $backgroundColor = '#3dc6ab';
            }else{
                $backgroundColor = '#ff2b2b';
            }
            $data = [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'end' => $event->end,
                'description' => $event->description,
                'backgroundColor' => $backgroundColor,
            ];
            array_push($eventArray,$data);
        }

        return response()->json($eventArray);
    }

    public function store(Request $request){
        $event = Event::create([
            'title' => $request->title,
            'start' => $request->start,
            'description' => $request->description,
            'user_id' => auth()->user()->id,
        ]);
        if($event){
            session()->flash('success','Notification a été ajouté avec succée');
            return to_route('dashboard');
        }
            session()->flash('fail','Notification a été pas ajouté');
            return to_route('dashboard');
    }
}