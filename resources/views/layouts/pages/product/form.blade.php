@extends('layouts.simple')

@section('content')

<div class="box box-warning">
    <div class="box-header with-border">
        <h3 class="box-title">Form Aktivasi produk</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">


        {!! Form::model($model, [
            'route' => $model->exists ? ['product.update', $model->id] : 'product.store',
            'method' => $model->exists ? 'PUT' : 'POST'
        ]) !!}

{{-- {!! Form::hidden('_method',['value'=>'PUT'])!!} --}}
            <!-- text input -->
            <div class="form-group">
                <label>Produk</label>
                {!! Form::select('name',array('D01' =>'ABAKA D' ,'D02' =>'ABAKA D+' ,'DLite' =>'ABAKA D1' ,'H01' =>'ABAKA H' ,'H02' =>'ABAKA H2' ),'D1') !!}

                {!! Form::hidden('User_Name',Auth::user()->name, null, ['class' => 'form-control', 'id' => 'User_Name']) !!}

            </div>
            <div class="form-group">
                <label>Serial Number Alat</label>
                {!! Form::text('SN_Device', null, ['class' => 'form-control', 'id' => 'SN_Device', 'placeholder'=>'Serial Number Alat ...']) !!}
            </div>

            <div class="form-group">
            <label>Nomor SAM</label>
        {!! Form::text('NO_Sam', null, ['class' => 'form-control', 'id' => 'NO_Sam', 'placeholder'=>'Enter ...']) !!}
    </div>

            <div class="form-group">
                <label>No Perso SAM</label>
                {!! Form::text('NO_Perso', null, ['class' => 'form-control', 'id' => 'NO_Perso', 'placeholder'=>'Enter ...']) !!}
            </div>
            <div class="form-group">
                <label>Provinsi</label>
                {!!Form::select('Provinsi',$states,null,['id'=>'Provinsi',])!!}
                {!!Form::select('Kota',['placeholder'=>'Kabupaten'],null,['id'=>'Kota'])!!}
                {{-- <label>Kecamatan/Kelurahan</label> --}}
                {!! Form::text('Kecamatan', null, ['id' => 'Kecamatan','size' => '40', 'placeholder'=>'Kecamatan/Kelurahan ...']) !!}
            </div>
            <!-- textarea -->
            <div class="form-group">
                <label>ALAMAT</label>
                {!! Form::textarea('Alamat', null, ['class'=>'form-control','id' => 'Alamat','rows' => '2', 'placeholder'=>'Alamat ...']) !!}

            </div>
<!-- IP mask -->
<div class="form-group">
    <label>Alamat IP:</label>

    <div class="input-group">
      <div class="input-group-addon">
        <i class="fa fa-laptop"></i>
      </div>
      {!! Form::text('IP_Address', null, ['class'=>'form-control','id' => 'IP_Address', 'data-inputmask'=>'alias:ip','data-mask']) !!}

      {{-- <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask> --}}
    </div>

    <div class="form-group">
    <label>Data Aktivasi</label>
    <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-envelope-o"></i>
        </div>
        {!! Form::text('activation_number', null, ['class'=>'form-control','id' => 'activation_number', 'data-inputmask'=>'alias:activation_number','data-mask','placeholder'=>'Nomor Aktifasi ...']) !!}
        {!! Form::text('reply_activation_number', null, ['class'=>'form-control','id' => 'reply_activation_number', 'data-inputmask'=>'alias:reply_activation_number','data-mask','placeholder'=>'Reply Nomor Aktifasi ...']) !!}
        {!! Form::text('activation_date', null, ['class'=>'form-control','id' => 'activation_date', 'data-inputmask'=>'alias:activation_date','data-mask','placeholder'=>'activation_date ...']) !!}
        {!! Form::text('activation_request_date', null, ['class'=>'form-control','id' => 'activation_request_date', 'data-inputmask'=>'alias:activation_request_date','data-mask','placeholder'=>'Request activation_date ...']) !!}

        {{-- <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask> --}}
      </div>
    <!-- /.input group -->
  </div>
  <!-- /.form group -->

    {!! Form::close() !!}
    </div>
    <!-- /.box-body -->

</div>
<!-- /.box -->
@endsection

