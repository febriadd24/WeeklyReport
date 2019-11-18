@extends('layouts.simple')
@section('content')
<div class="box-body">
<table class="table table-bordered">
    <tr>
    </tr>
        <th>ID</th>
        <td>{{ $model->id }}</td>
    </tr><tr>
        <th>Name</th>
        <td>{{ $model->name }}</td>
    </tr><tr>
        <th>SN Device</th>
        <td>{{ $model->SN_Device }}</td>
    </tr><tr>
        <th>NO SAM</th>
        <td>{{ $model->NO_Sam }}</td>
    </tr><tr>
        <th>NO Perso</th>
        <td>{{ $model->NO_Perso }}</td>
    </tr><tr>
        <th>PCID</th>
        <td>{{ $model->PCID }}</td>
    </tr><tr>
        <th>CONFIG</th>
        <td>{{ $model->CONFIG}}</td>
    </tr><tr>
       <th>Provinsi</th>
       <td>{{ $model->Provinsi }}</td>
    </tr><tr>
        <th>Kota</th>
        <td>{{ $model->Kota }}</td>
    </tr><tr>
        <th>Kecamatan</th>
        <td>{{ $model->Kecamatan }}</td>
    </tr><tr>
        <th>Alamat</th>
        <td>{{ $model->Alamat }}</td>
    </tr><tr>
        <th>Alamat IP</th>
        <td>{{ $model->IP_Address }}</td>
    </tr>
</table>
</div>
@endsection

