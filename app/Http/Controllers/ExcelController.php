<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ReportImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function importExportView()

    {
       return view('layouts.pages.report.import');
    }
    public function import()

    {

        Excel::import(new ReportImport,request()->file('file'));



        return back();

    }
}
