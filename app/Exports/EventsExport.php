<?php

namespace App\Exports;

use App\Models\Event;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;


class EventsExport implements FromCollection,WithHeadings,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {   if(auth()->user()->is_admin ){
            $events = Event::with('user')->select('id','start','title','description','status')->get();

        }else{
            $events = Event::with('user')->select('id','start','title','description','status')->where('user_id',auth()->user()->id)->get();
        }
        return $events;
    }
     public function headings(): array
    {
        return [
            'id',
            'date',
            'Titre du tâche',
            'commentaire',
            'etat',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(15);
            },
        ];
    }
}
