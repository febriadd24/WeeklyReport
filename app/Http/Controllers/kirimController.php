<?php

namespace App\Http\Controllers;

use App\Product;
use DB;
use DataTables;
use Illuminate\Http\Request;
use App\setup_kab;
use App\setup_prop;
use Illuminate\Support\Facades\Auth;


class kirimController extends Controller
    {

        public function kirim(Request $request,$id)
    {
        $model= Product::findOrFail($id);
        $model->active='1';
    }
        public function dataTable()
        {
            // $uname = Auth::user()->name;
            $model =DB::table('products')->select(['id', 'name', 'SN_Device', 'NO_Sam', 'Kota'])
            ->where(function($model)
            {$model->where('User_Name','=',Auth::user()->name);});
            return DataTables::of($model)
                ->addColumn('action', function ($model) {
                    return view('layouts._action', [
                        'model' => $model,
                        'url_show' => route('product.show', $model->id),
                        'url_edit' => route('product.edit', $model->id),
                        'url_destroy' => route('product.destroy', $model->id),
                        'url_kirim' => route('product.kirim', $model->id)
                    ]);
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
}
    }
