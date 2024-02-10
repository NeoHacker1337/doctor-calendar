@extends('layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        @include('layouts.navbar')
        @include('layouts.sidebar')

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4 class="page-title"><a href="{{ route('marketing-representative.create') }}">Add Marketing
                                        Representative</a></h4>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <table class="table table-striped table-bordered dt-responsive nowrap" id="mrTable"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>MR Name</th>
                                                <th>Employee ID</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Date of Joining</th>
                                                <th>Status</th>
                                                <th>Doctor Added</th>
                                                

                                            </tr>
                                        </thead>


                                        <tbody>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->


                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->


            @include('layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->
@endsection

@section('extra_css')
    
@endsection

@section('extra_js')
    <!-- Required datatable js -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>


    <script>
        // Your jQuery DataTables initialization
        $(document).ready(function() {


            $.fn.tableload = function() {
                $('#mrTable').DataTable({
                    "processing": true,
                    "scrollX": true,
                    "responsive": true,
                    pageLength: 10,
                    "serverSide": true,
                    'checkboxes': {
                        'selectRow': true
                    },
                    "ajax": {
                        url: '{{ route('get-marketing-representative-list') }}',
                        dataFilter: function(data) {
                            var json = jQuery.parseJSON(data);
                            json.recordsTotal = json.recordsTotal;
                            json.recordsFiltered = json.recordsFiltered;
                            json.data = json.data;
                            return JSON.stringify(json); // return JSON string
                        }
                    },

                    "order": [
                        [0, 'desc']
                    ],
                    "columns": [{
                            "data": "id",
                            "name": "id",
                            'searchable': true,
                            'orderable': false
                        }, {
                            "data": "name",
                            "name": "name",
                            'searchable': true,
                            'orderable': true
                        },
                        {
                            "data": "employee_id",
                            "name": "employee_id",
                            'searchable': true,
                            'orderable': true
                        },
                        {
                            "data": "email",
                            "email": "name",
                            'searchable': false,
                            'orderable': false
                        },
                        {
                            "data": "phone",
                            "name": "phone",
                            'searchable': false,
                            'orderable': false
                        },
                        {
                            "data": "date_of_joining",
                            "name": "date_of_joining",
                            'searchable': false,
                            'orderable': false
                        },
                        {
                            "data": "status",
                            "name": "status",
                            'searchable': false,
                            'orderable': false
                        },
                        {
                            "data": "doctor_added",
                            "name": "doctor_added",
                            'searchable': false,
                            'orderable': false,
                        },
                        
                    ],

                });
            }

            $.fn.tableload();

        });
    </script>
@endsection
