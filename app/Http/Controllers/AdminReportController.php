<?php

namespace App\Http\Controllers;
use App\report;
use App\User;
use DB;
use DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Exists;

class AdminReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Dept = User::pluck('Department');
$userID=User::pluck('name');
        return view('layouts.pages.report.adminindex',compact('Dept','userID'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = New report();
        return view('layouts.pages.report.form',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'Days' => 'required',
            'Project' => 'required|string|max:75',
            'Activity' => 'required|string|max:100',
            'Status' => 'required',
        ]);

        $Project=$request->input('Project');
        $Activity=$request->input('Activity');
        $detail=$request->input('Detail');
        $Remarks=$request->input('Remarks');
        // $filename=$request->input('File')->getClientOriginalName();
        // $Attach=$request->file('File')->storeAs('public/', $filename);
        $Status=$request->input('Status');
        $userid=$request->input('User_id');
        $Days=$request->input('Days');

         $model = new report([
            'Days'=>$Days,
             'Project'=>$Project,
             'Activity'=>$Activity,
             'Detail'=>$detail,
             'Remarks'=>$Remarks,
            //  'File'=>$filename,
             'Status'=>$Status,
             'User_id'=>$userid,
            //  $Attach,
         ]);
        $model->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = report::findOrFail($id);
        return view('layouts.pages.report.form',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = report::findOrFail($id);
        return view('layouts.pages.report.form',compact('model'));
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'Days' => 'required',
            'Project' => 'required|string|max:75',
            'Activity' => 'required|string|max:100',
            'Status' => 'required',
            // |unique:reports,SN_Device'
        ]);
        $model= report::findOrFail($id);
        $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model= report::findOrFail($id);
        $model->delete();
    }
    public function GetUser(Request $request){
            $userID = User::all('name');
            // ->where('Department','=',$request->get('Department'));
            return view('layouts.pages.report.adminindex',compact('userID'));
    }
    public function dataTable(Request $request)
    {

        $from=$request->get('start_date');
            $todate=$request->get('end_date');
            $Department=$request->get('Department');
            $Username=$request->get('User_id');
if (is_null($from) or is_null($todate))
{
    $model = report::with('DataUser')
      ->get();
}
elseif($Department != 'Select' )
{
    $model = report::leftJoin('Users', function($join) {
        $join->on('reports.User_id', '=', 'Users.name');
      })
      ->where('Users.Department','like',$Department)
        ->whereDate('reports.created_at','>=',$from)
        ->whereDate('reports.created_at','<=',$todate)
        ->get();

}
elseif(!is_null($from) or is_null($todate))
{
    $model = report::with('DataUser')
        ->whereDate('reports.created_at','>=',$from)
        ->whereDate('reports.created_at','<=',$todate)
        ->get();

}

// else
// {
//     $model = report::with(['DataUser' =>function($query) use($Department){
//     $query->where('Department','like',$Department)
//     ->groupBy('id');
//     }
//     ])
//     ->get();
//         // ->whereDate('created_at','>=',$from)
//         // ->whereDate('created_at','<=',$todate)


// }

// else
// {
//     $model = report::with('DataUser')
//     ->where('Department','like',$Department)
//     ->where('DataUser.id','=',$Username)
//         ->whereDate('created_at','>=',$from)
//         ->whereDate('created_at','<=',$todate)
//         ->get();
// }
        // $model =DB::table('reports')->select(['id','Project', 'Activity', 'Status', 'Detail', 'Remarks','User_id',])
        // ->where(function($model)
        // {$model->where('User_id','=',Auth::user()->name)
        //     ->groupBy('Project');
        // });
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('report.show', $model->id),
                    'url_edit' => route('report.edit', $model->id),
                    'url_destroy' => route('report.destroy', $model->id),

                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
