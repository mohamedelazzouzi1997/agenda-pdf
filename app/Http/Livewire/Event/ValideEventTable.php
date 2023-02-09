<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Livewire\Component;

class ValideEventTable extends Component
{
    public $search ='';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = true;
    // public $deleteId = '';
    // public $selected = [];
    // public $user ='';
    // public $name ='';
    // public $new_status ='';
    // public $status = 1;

    public function render()
    {
        return view('livewire.event.valide-event-table',[
            'events' => Event::search($this->search)
                        ->where('user_id',auth()->user()->id)->where('status','Valide')
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        // ->orWhereIn('status',($this->status == 1) ? ["admin","super admin"]:[$this->status] )
                        ->simplepaginate( $this->perPage ),
            'Eventcount' => Event::count(),
            'perPage' => $this->perPage,
        ]);
    }
}