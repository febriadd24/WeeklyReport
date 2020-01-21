<?php

namespace App\Http\Controllers;
use Eloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\report;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function Alltoday()
    {
        $mytime = Carbon::now();

// $counts = report::with(['User' =>function($query){
//     $query->where('Department','like','%Marketing%');
// }])
$MKT =report::leftJoin('users', function($join) {
    $join->on('reports.User_id', '=', 'users.name');
  })
  ->where('users.Department','like','%Marketing%')
    ->whereDate('reports.created_at','>=',$mytime->startOfWeek())
    ->whereDate('reports.created_at','<=',$mytime->endOfWeek())
    ->count();

            $TC = report::leftJoin('users', function($join) {
                $join->on('reports.User_id', '=', 'users.name');
              })
              ->where('users.Department','like','%Technical%')
                ->whereDate('reports.created_at','>=',$mytime->startOfWeek())
                ->whereDate('reports.created_at','<=',$mytime->endOfWeek())
                ->count();


            $HRD = report::leftJoin('users', function($join) {
                $join->on('reports.User_id', '=', 'users.name');
              })
              ->where('users.Department','like','%HRD%')
                ->whereDate('reports.created_at','>=',$mytime->startOfWeek())
                ->whereDate('reports.created_at','<=',$mytime->endOfWeek())
                ->count();


             $ADM = report::leftJoin('users', function($join) {
                $join->on('reports.User_id', '=', 'users.name');
              })
              ->where('users.Department','like','%Admin%')
                ->whereDate('reports.created_at','>=',$mytime->startOfWeek())
                ->whereDate('reports.created_at','<=',$mytime->endOfWeek())
                ->count();

                $FNC = report::leftJoin('users', function($join) {
                    $join->on('reports.User_id', '=', 'users.name');
                  })
                  ->where('users.Department','like','%finance%')
                    ->whereDate('reports.created_at','>=',$mytime->startOfWeek())
                    ->whereDate('reports.created_at','<=',$mytime->endOfWeek())
                    ->count();

        //    return view('admin',compact('counts','countsIn','countsOut','countsMiss'));
            return view('home',compact('MKT','TC','HRD','ADM','FNC'));
    }
}
