<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index(){
        //
        return $this->eventToArray(Event::with('user')->where('user_id',auth()->user()->id)->get());
    }

    public function eventToArray($events){
        $eventArray = [];
        foreach($events as $event){
            if($event->status == 'En attente' ){
                $backgroundColor = 'bg-enatend';
            }elseif($event->status == 'Rejete'){
                $backgroundColor = 'bg-rejete';
            }else{
                $backgroundColor = 'bg-valide';
            }
            $data = [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start,
                'status' => $event->status,
                'description' => $event->description,
                'classNames' =>  $backgroundColor,
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

    public function update(Request $request, $id){
        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        if($event){
            session()->flash('success','Notification a été modifie avec succée');
            return to_route('dashboard');
        }
            session()->flash('fail','Notification a été pas ajouté');
            return to_route('dashboard');
    }
}
