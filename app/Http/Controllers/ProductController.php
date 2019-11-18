<?php

namespace App\Http\Controllers;
use App\Product;
use DB;
use DataTables;
use Illuminate\Http\Request;
use App\setup_kab;
use App\setup_prop;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.pages.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $model = New Product();
        $states = setup_prop::pluck('NAMA_PROP','NO_PROP');
        return view('layouts.pages.product.form',compact('model','states'));
    }
    public function getTowns(Request $request, $id){
        if ($request->ajax()){
            $kab = setup_kab::kabs($id);
            return response()->json($kab);
        }
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
            'name' => 'required|string|max:250',
            'SN_Device' => 'required|string|max:255|unique:products,SN_Device'
        ]);
        $model = Product::create($request->all());
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Product::findOrFail($id);
        return view('layouts.pages.product.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Product::findOrFail($id);
        $states = setup_prop::pluck('NAMA_PROP','NO_PROP');
        return view('layouts.pages.product.form',compact('model','states'));
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
        $this->validate($request,[
            'name' => 'required|string|max:250',
            'SN_Device' => 'required|string|max:255'
            // |unique:products,SN_Device'
        ]);
        $model= Product::findOrFail($id);
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
        $model= Product::findOrFail($id);
        $model->delete();
    }
    public function kirim($id)
    {
        $model= Product::findOrFail($id);
        return view('layouts.partials._input',compact('model'));
        $model->active=true;
        $model->update();

    }

/*     public function dataTable()
    {
        $model = Product::query();
        return DataTables::of($model)

            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('product.show', $model->id),
                    'url_edit' => route('product.edit', $model->id),
                    'url_destroy' => route('product.destroy', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    } */
    public function dataTable()
    {
        // $uname = Auth::user()->name;
        $model =DB::table('products')->select(['id', 'name', 'SN_Device', 'NO_Sam', 'Kota','active'])
        ->where(function($model)
        {$model->where('User_Name','=',Auth::user()->name)
            ->where('active','=',false);
        });
        return DataTables::of($model)
            ->addColumn('action', function ($model) {
                return view('layouts._action', [
                    'model' => $model,
                    'url_show' => route('product.show', $model->id),
                    'url_edit' => route('product.edit', $model->id),
                    'url_destroy' => route('product.destroy', $model->id),
                    'url_kirim' => route('table.kirim', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    //admin controller of products



}
