@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Import Excel Report
            </h3>
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <input type="file" name="file" class="form-control">
                <button class="btn btn-success">Import Report Data</button>
            </form>
        </div></div>
@endsection
