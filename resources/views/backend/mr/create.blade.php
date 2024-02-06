@extends('layouts.master')
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
                                <h4 class="page-title"><a href="{{ route('marketing-representative.index')}}">Back</a></h4>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
    
                                    <h4 class="mt-0 header-title text-center mb-3">Add Marketing Representative</h4>
                                   
    
                                    <form method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="name" placeholder="John" id="name">
                                            </div>
                                    
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Employee ID</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="number" name="employee_id" placeholder="5673456" id="employee_id">
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="email" placeholder="john@example.com" name="email" id="email">
                                            </div>
                                            <label for="example-date-input" class="col-sm-2 col-form-label">Date of Birth</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="date"  name="date_of_birth" id="date_of_birth">
                                            </div>
                                            
                                        </div>

                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="number" placeholder="+91-1234567890" name="phone" id="phone">
                                            </div>
                                            <div class="col-sm-6"> <!-- Add a div to wrap the select -->
                                                {{-- <label for="status">Status<span class="text-danger">*</span></label> --}}
                                                <select name="status" class="form-control select2">
                                                    <option selected disabled>-- Please Select Status --</option>
                                                    <option value="Active">Active</option>
                                                    <option value="InActive">InActive</option>
                                                    <option value="Suspend">Suspend</option>
                                                    <option value="Block">Block</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    
                                        <div class="form-group row">
                                           
                                            <label for="example-password-input" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="password"  id="example-password-input">
                                            </div>
                                            <label for="example-password-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="password" name="password_confirmation" placeholder="**********" id="example-password-input">
                                            </div>
                                           
                                        </div>

                                        <div class="col-sm-6 text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form>
                                    
                                     
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
    <!-- DataTables -->
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('extra_js')
    <!-- Responsive examples -->
    <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
    
<script>
    $(document).ready(function () {
        $('form').submit(function (e) {
            e.preventDefault();

            // Disable the submit button to prevent multiple submissions
            $('button[type="submit"]').prop('disabled', true);

            // Get form data
            var formData = $(this).serialize();

            // Make an Ajax request
            $.ajax({
                type: 'POST',
                url: '{{ route('marketing-representative.store') }}',
                data: formData,
                success: function (data) {
                    // Assume data.success is a flag indicating success
                    if (data.success) {
                        // Show Toastr success notification
                        toastr.success('Form submitted successfully!', 'Success');

                        // Redirect after 3 seconds
                        setTimeout(function() {
                            window.location.href = '{{ route('marketing-representative.index') }}';
                        }, 2000);
                    } else {
                        // Show Toastr error notification
                        toastr.error('Form submission failed. Please check your input.', 'Error');
                    }
                },
                error: function () {
                    // Show Toastr error notification
                    toastr.error('Something went wrong. Please try again later.', 'Error');
                },
                complete: function () {
                    // Enable the submit button after the Ajax request completes
                    $('button[type="submit"]').prop('disabled', false);
                }
            });
        });
    });
</script>
@endsection
