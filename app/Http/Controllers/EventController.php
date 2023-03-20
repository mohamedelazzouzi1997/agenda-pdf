<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

use App\Exports\EventsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    //
    public function index(){

        // get all event for the auth user and passet as a parameter for the eventToarray function
        return $this->eventToArray(Event::with('user')->where('user_id',auth()->user()->id)->get());
    }

    public function allEvent(){
        $EVENT = Event::where('user_id',auth()->user()->id)->latest()->get();
        return view('client.allEvent',compact('EVENT'));
    }


    public function evendValide(){
        // get all valide event for auth user
        $EVENT_VALIDES = Event::where('user_id',auth()->user()->id)->where('status','Valide')->latest()->get();

        return view('client.eventValide',compact('EVENT_VALIDES'));
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
                'file' => $event->file,
                'classNames' =>  $backgroundColor,
            ];
            array_push($eventArray,$data);
        }

        return response()->json($eventArray);
    }

    public function store(Request $request){

        if($request->has('file')){
            $path = $request->file('file')->store('/public/files/pdf');
            $storage = $request->file('file')->store('/files/pdf');
            $event = Event::create([
                'title' => $request->title,
                'start' => $request->start,
                'description' => $request->description,
                'file' => $storage,
                'user_id' => auth()->user()->id,
            ]);
        }else{
            $event = Event::create([
                'title' => $request->title,
                'start' => $request->start,
                'description' => $request->description,
                'user_id' => auth()->user()->id,
            ]);
        }
        if($event){
            session()->flash('success','Notification a été ajouté avec succée');
            return to_route('dashboard');
        }
            session()->flash('fail','Notification a été pas ajouté');
            return to_route('dashboard');
    }

    public function update(Request $request, $id){
        $event = Event::findOrFail($id);
        if($request->has('file')){
            $oldFile = $event->file;
            if ($oldFile) {
                Storage::delete($oldFile); // delete the old file from the disk
                Storage::delete('public/'.$oldFile); // delete the old file from the disk
            }

            $path = $request->file('file')->store('/public/files/pdf');
            $storage = $request->file('file')->store('/files/pdf');

            $event->update([
                'title' => $request->title,
                'description' => $request->description,
                'file' => $storage,
            ]);
        }else{
            $event->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }
        if($event){
            session()->flash('success','Notification a été modifie avec succée');
            return to_route('dashboard');
        }
            session()->flash('fail','Notification a été pas ajouté');
            return to_route('dashboard');
    }

    public function EventsExport()
    {
        return Excel::download(new EventsExport, 'Events.xlsx', \Maatwebsite\Excel\Excel::XLSX,[
            'Content-Type' => 'text/csv',
        ]);
    }
}