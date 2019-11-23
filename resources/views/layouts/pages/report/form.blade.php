{{-- @extends('layouts.simple')

@section('content')

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Form Aktivasi produk</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
 --}}

        {!! Form::model($model, [
            'route' => $model->exists ? ['report.update', $model->id] : 'report.store',
            'method' => $model->exists ? 'PUT' : 'POST',
            'enctype'=>  'multipart/form-data',
        ]) !!}

{{-- {!! Form::hidden('_method',['value'=>'PUT'])!!} --}}
            <!-- text input -->
            <div class="form-group">
                    <label>Days</label>
                    {!! Form::select('Days',array('Monday' =>'Monday' ,'Tuesday' =>'Tuesday' ,
                    'Wednesday' =>'Wednesday' ,'Thursday' =>'Thursday','Friday' =>'Friday','Saturday' =>'Saturday','Sunday' =>'Sunday',)) !!}
                </div>

            <div class="form-group">
                <label>Project</label>
                {!! Form::text('Project', null, ['class' => 'form-control', 'id' => 'Project', 'placeholder'=>'Project Name...']) !!}
            </div>

            <div class="form-group">
            <label>Activity</label>
        {!! Form::text('Activity', null, ['class' => 'form-control', 'id' => 'Activity', 'placeholder'=>'Enter Activity ...']) !!}
    </div>

            <div class="form-group">
                <label>Activity Detail</label>
                {!! Form::textarea('Detail', null, ['class' => 'form-control', 'id' => 'Detail','rows' => '2', 'placeholder'=>'Enter Detail of activity ...']) !!}
            </div>

            <!-- textarea -->
            <div class="form-group">
                <label>Notes</label>
                {!! Form::textarea('Remarks', null, ['class'=>'form-control','id' => 'Remarks','rows' => '2', 'placeholder'=>'Remarks or Notes ...']) !!}

            </div>

            {{-- <div class="form-group">
                <label>Upload File </label>
                <input type="file" name="File" id="File">
            </div> --}}

            <div class="form-group">
                <label>Status</label>
                {!! Form::select('Status',array('Done' =>'Done' ,'Progress' =>'Progress' ,'On Hold' =>'On Hold' ,'Stuck' =>'Stuck')) !!}

                {!! Form::hidden('User_id',Auth::user()->name,['class' => 'form-control', 'id' => 'User_id']) !!}

            </div>
  <!-- /.form group -->

    {!! Form::close() !!}
    </div>
    <!-- /.box-body -->

{{-- </div>
<!-- /.box -->
@endsection --}}

