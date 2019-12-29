@extends('layouts.appadmin')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Table Report
                {{--<a href="{{ route('report.create') }}" class="btn btn-success pull-right modal-show" style="margin-top: -8px;" title="Create report"><i class="icon-plus"></i> Create</a> --}}
            </h3>
        </div>
        <form id= search-form>
        <div class="panel-body">
                <div class="row">
                        <div class="form-group col-md-2">
                        <label>Start Date <span class="text-danger"></span></label>
                        <div class="controls">
                            <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" placeholder="01/01/2018"> <div class="help-block"></div></div>
                        </div>
                        <div class="form-group col-md-2">
                        <label>End Date <span class="text-danger"></span></label>
                        <div class="controls">
                            <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose" placeholder="01/01/2018"> <div class="help-block"></div></div>
                        </div>

                        <div class="form-group col-md-2">
                            <label>By Department<span class="text-danger"></span></label>
                            <div class="controls">
                                <select id="Department" name="Department" class="form-control">
                                    <option>Select</option>
                                    <option>Marketing</option>
                                    <option>Admin</option>
                                    <option>Technical Support</option>
                                    <option>Fianance</option>
                                    <option>Stephen Office</option>
                                    <option>HRD</option>
                                  </select>
                            </div>
                        </div>
                            <div class="form-group col-md-3">
                                <label>By Employee<span class="text-danger"></span></label>
                                <div class="controls">
                {!!Form::select('User_id',$username,$userID,['name'=>'User_id'])!!}
                                </div>

                </div>

                        <div class="text-left" style="margin-top: 25px;">
                        <button type="submit" id="btnFiterSubmitSearch" class="btn btn-info">Submit</button>
                        </div>
                </div>
            </form>
            <table id="datatable" class="table table-bordered table-striped dataTable" role="grid" role="grid"
             aria-describedby="example1_info" style="width:100%">
                <thead>
                <tr>
                    <th>Days</th>
                    <th>Project</th>
                    <th>Activity</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Detail</th>
                    <th>Remarks</th>
                    <th>action</th>

                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                <tr>
                    <th>Days</th>
                    <th>Project</th>
                    <th>Activity</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Detail</th>
                    <th>Remarks</th>
                    <th>action</th>

                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var oTable=$('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax:{
            url:"{{route('table.admin')}}",
            data: function (d) {
                d.start_date = $('input[name=start_date]').val();
                d.end_date = $('input[name=end_date]').val();
                d.Department = $('select[name=Department]').val();
                d.UserID = $('select[name=User_id]').val();
            }
            },
            columns: [
                {data: 'Days', name: 'Days'},
                {data: 'Project', name: 'Project'},
                {data: 'Activity', name: 'Activity'},
                {data: 'Status', name: 'Status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'Detail', name: 'Detail'},
                {data: 'Remarks', name: 'Remarks'},
                {data: 'action', name: 'action'},

            ]
        });
        $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
    </script>
@endpush
