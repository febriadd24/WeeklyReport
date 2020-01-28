<?php

namespace App\Http\Controllers;
use App\report;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.pages.report.index');
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
        // $states = setup_prop::pluck('NAMA_PROP','NO_PROP');
        return view('layouts.pages.report.form',compact('model'));    }

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

    public function dataTable(Request $request)
    {
        $from=$request->get('start_date');
        $todate=$request->get('end_date');
        $Username=$request->get('UserID');
if (is_null($from) or is_null($todate))
{
$model = report::with('DataUser')
  ->get();
}
elseif(!is_null($from) or is_null($todate))
{
$model = report::with('DataUser')
    ->whereDate('reports.created_at','>=',$from)
    ->whereDate('reports.created_at','<=',$todate)
    ->get();

}

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
