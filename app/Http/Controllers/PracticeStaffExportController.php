<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class PracticeStaffExportController extends Controller
{
    public function export() 
    {
        return Excel::download(new UsersExport, 'practiceStuff.xlsx');
    }
}
