<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class adminEventController extends Controller
{
    public function index(){

        // get all event and passet as a parameter for the eventToarray function
        return $this->eventToArray(Event::with('user')->get());
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

    public function updateEventByDrop(Request $request, $id){
        $event = Event::findOrFail($id);
        $event->update([
            'start' => $request->start,
        ]);
        return response()->json([
            'success' => 'Event a été modifier avec succée'
        ]);
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
            return to_route('admin.dashboard');
        }
            session()->flash('fail','Notification a été pas ajouté');
            return to_route('admin.dashboard');
    }

    public function update(Request $request, $id){
        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->title,
            'start' => $request->start,
            'status' => $request->status,
            'description' => $request->description,
        ]);
        if($event){
            session()->flash('success','Notification a été modifie avec succée');
            return to_route('admin.dashboard');
        }
            session()->flash('fail',"notification n'est pas été ajouté");
            return to_route('admin.dashboard');
    }

    public function allEvent(){
        $EVENT = Event::latest('id')->get();
        return view('admin.allEvent',compact('EVENT'));
    }


    public function evendValide(){
        // get all valide event for auth user
        $EVENT_VALIDES = Event::latest()->where('status','Valide')->get();

        return view('admin.eventValide',compact('EVENT_VALIDES'));
    }
    public function delete($id){
        $event = Event::findOrFail($id);
        $event->delete();
        if($event){
            session()->flash('success','Notification a été Supprimé avec succée');
            return to_route('admin.dashboard');
        }
            session()->flash('fail',"notification n'est pas été Supprimé");
            return to_route('admin.dashboard');
    }
    public function multiplDeleteAndEditEvents(Request $request){

        if(empty($request->events)){

            session()->flash('info','Please select some events');
            return to_route('admin.all.event');
        }
        if($request->has('editEventStatusButton')){
            if(!$request->has('editEventStatusSelect')){
                    session()->flash('info','Please select Event Status');
                    return to_route('admin.all.event');
            }
            $events = Event::whereIn('id',$request->events)->update([
                'status' => $request->editEventStatusSelect,
            ]);

            if($events){
                session()->flash('success','event Status updated successfully');
                return to_route('admin.all.event');
            }
                session()->flash('fail','event Status not updated successfully');
                return to_route('admin.all.event');
        }else{
            $events = Event::whereIn('id',$request->events)->delete();

            if($events){
                session()->flash('success','event delete passed successfully');
                return to_route('admin.all.event');
            }
                session()->flash('fail','event not deleted successfully');
                return to_route('admin.all.event');
        }
    }
}