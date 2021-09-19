<?php

namespace App\Exports;

use App\Event;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;

class EventExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Event::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'event_name',
            'image',
            'details',
            'contact',
            'eventCategory',
            'orgId',
            'eventType',
            'isAdminEvent',
            'venue',
            'targetMoney',
            'targetDate',
            'visitor',
            'status',
            'is_feature',
            'created_at',
            'updated_at'
        ];
    }
}
