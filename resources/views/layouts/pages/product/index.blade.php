@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Table Produk
                <a href="{{ route('product.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create Product"><i class="icon-plus"></i> Create</a>
            </h3>
        </div>
        <div class="panel-body">
            <table id="datatable" class="table table-hover" style="width:100%">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th>SN Device</th>
                    <th>No Sam</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <th>No</th>
                    <th>Type</th>
                    <th>SN Device</th>
                    <th>No Sam</th>
                    <th>Action</th>

                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.Product') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'SN_Device', name: 'SN_Device'},
                {data: 'NO_Sam', name: 'NO_Sam'},
                {data: 'action', name: 'action'}
            ]
        });
    </script>
@endpush
