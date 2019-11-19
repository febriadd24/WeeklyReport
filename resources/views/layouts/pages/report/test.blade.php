@extends('layouts.app')

@section('content')
{!! Html::script('js/dropdown.js') !!}
{!!Form::select('states',$states,null,['NO_PROP'=>'states'])!!}
{!!Form::select('setup_kab',['placeholder'=>'Kabupaten'],null,['id'=>'setup_kab'])!!}

@endsection
