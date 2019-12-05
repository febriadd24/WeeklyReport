<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\report;
use App\Admin;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }
    public function Admintoday()
    {
        $mytime = Carbon::now();

// $counts = report::with(['User' =>function($query){
//     $query->where('Department','like','%Marketing%');
// }])
$counts = report::with('DataUser')
            ->whereDate('created_at','>',$mytime->startOfWeek())
            ->whereDate('created_at','<',$mytime->endOfWeek())
           ->count();

            $countsIn = DB::table('Reports')
            ->whereDate('created_at','>=',$mytime->startOfWeek())
            ->whereDate('created_at','<=',$mytime->endOfWeek())
           ->count();


            $countsOut = DB::table('Reports')
            ->whereDate('created_at','>=',$mytime->startOfWeek())
            ->whereDate('created_at','<=',$mytime->endOfWeek())
           ->count();


             $countsMiss = DB::table('Reports')
             ->whereDate('created_at','>=',$mytime->startOfWeek())
            ->whereDate('created_at','<=',$mytime->endOfWeek())
           ->count();

        //    return view('admin',compact('counts','countsIn','countsOut','countsMiss'));
            return view('admin',compact('counts','countsIn','countsOut','countsMiss'));
    }
}
