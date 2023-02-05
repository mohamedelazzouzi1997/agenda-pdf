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
                $backgroundColor = '#aa72c1';
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
}