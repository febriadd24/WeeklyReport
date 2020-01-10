<?php

namespace App\Imports;

use App\Report;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row, Request $request)
    {

        return new Report([
            'Project' => $row[1],'Activity'=> $row[2],'Detail'=> $row[3],
            'Status'=> $row[6],'Remarks'=> $row[5],'User_id'=> Auth::user()->name,'Days'=> $row[0],
        ]);
    }
}
