<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ServiceExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function exportExcel(Request $request)
    {
        return Excel::download(new ServiceExport,'services.xls');
    }
}
