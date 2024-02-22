@extends('layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    
        <!-- Top Bar Start -->
        @include('layouts.navbar')
        @include('layouts.sidebar')

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row">
                            <div class="card">

                                <div class="card-body">
                                    <div class="btn-group" role="group" aria-label="Import and Export Buttons">
                                        <!-- Import Button -->
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                                            Import MR List
                                        </button>
                                
                                        <!-- Export Button -->
                                        <a href="{{ Route('exportMRList')}}" class="btn btn-outline-success">Export MR List</a>                                        
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-head">
                                    <div class="col-sm-6">
                                        <h4 class="page-title"><a href="{{ route('marketing-representative.create') }}">Add
                                                Marketing
                                                Representative</a></h4>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <table class="table table-striped table-bordered dt-responsive nowrap" id="mrTable"
                                        style="width: 100%;">
                                        <thead>
                                            <tr>
                                                 
                                                <th>MR Name</th>
                                                <th>Employee ID</th>
                                                {{-- <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Date of Joining</th>
                                                <th>Status</th> --}}
                                                <th>Doctor Added</th>
                                                <th>Download</th>


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

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import MR List</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.excelimport') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="excelFile" class="form-label">Choose Excel File:</label>
                                    <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls, .xlsx .csv" required>
                                </div>
                        
                                <button type="submit" class="btn btn-primary" style="width: 100%">Upload</button>
                            </form>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                             
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
  
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
                    "columns": [ {
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
                        // {
                        //     "data": "email",
                        //     "email": "name",
                        //     'searchable': false,
                        //     'orderable': false
                        // },
                        // {
                        //     "data": "phone",
                        //     "name": "phone",
                        //     'searchable': false,
                        //     'orderable': false
                        // },
                        // {
                        //     "data": "date_of_joining",
                        //     "name": "date_of_joining",
                        //     'searchable': false,
                        //     'orderable': false
                        // },
                     
                        {
                            "data": "doctor_added",
                            "name": "doctor_added",
                            'searchable': false,
                            'orderable': false,
                        },
                        {
                            "data": "download",
                            "name": "download",
                            'searchable': false,
                            'orderable': false
                        },

                    ],

                });
            }

            $.fn.tableload();

        });
    </script>
@endsection
