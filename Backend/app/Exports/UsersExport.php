<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;

class UsersExport implements FromCollection, ShouldAutoSize, 
WithMapping, WithHeadings, WithEvents
{
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::where('type',1)->get();
    }

    public function map($user): array
    {
        return[
            $user->id,
            $user->name,
            $user->username,
            $user->email,
            $user->phone,
            $user->type,
            $user->status,
            $user->is_super_admin,
            $user->google_id,
            $user->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Id',
            'name',
            'username',
            'email',
            'phone',
            'type',
            'status',
            'is_super_admin',
            'google_id',
            'created_at',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getStyle('A1:J1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
