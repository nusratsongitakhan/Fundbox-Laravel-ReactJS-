<?php

namespace App\Http\Controllers\Admin;
use App\Exports\eventTransaction;
use App\Exports\UsersExport;
use App\Exports\EventExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function export()
    {  
        return Excel::download(new UsersExport, 'allUser.xlsx');

    }

    public function CSVexport()
    {  
        return Excel::download(new UsersExport, 'allUser.csv');

    }

    public function PDFExport()
    {  
        return Excel::download(new UsersExport, 'allUser.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }

    //event
    public function EventExvelExport()
    {  
        return Excel::download(new EventExport, 'allEvents.xlsx');

    }

    public function EventCSVExport()
    {  
        return Excel::download(new EventExport, 'allEvents.csv');

    }

    public function EventPDFExport()
    {  
        return Excel::download(new EventExport, 'allEvents.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }
      public function orgTransactionPDFExport()
    {  
        return Excel::download(new eventTransaction, 'alltransactions.pdf', \Maatwebsite\Excel\Excel::DOMPDF);

    }
    public function orgTransactionexcelExport()
    {  
        return Excel::download(new eventTransaction, 'alltransaction.xlsx');

    }
    
}
