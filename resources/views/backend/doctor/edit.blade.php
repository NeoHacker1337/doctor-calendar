@extends('layouts.employeemaster')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title"><a href="javascript:history.go(-1);">Back</a></h4>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title text-center mb-3">Edit Doctor</h4>

                            <table class="table table-striped table-bordered dt-responsive nowrap" id="mrTable"
                            style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Dr. Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td><img src="{{ asset($doctor->april_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td><img src="{{ asset($doctor->may_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td><img src="{{ asset($doctor->june_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>

                                <tr>
                                    <td>4.</td>
                                    <td><img src="{{ asset($doctor->july_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>

                                <tr>
                                    <td>5.</td>
                                    <td><img src="{{ asset($doctor->august_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>

                                <tr>
                                    <td>6.</td>
                                    <td><img src="{{ asset($doctor->september_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>

                                <tr>
                                    <td>7.</td>
                                    <td><img src="{{ asset($doctor->october_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>

                                <tr>
                                    <td>8.</td>
                                    <td><img src="{{ asset($doctor->november_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>

                                <tr>
                                    <td>9.</td>
                                    <td><img src="{{ asset($doctor->december_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td><img src="{{ asset($doctor->january_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>
                                <tr>
                                    <td>11.</td>
                                    <td><img src="{{ asset($doctor->february_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>
                                <tr>
                                    <td>12.</td>
                                    <td><img src="{{ asset($doctor->march_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px"></td>
                                    <th> <button class="btn btn-primary previewBtn" data-image-id="{{ $doctor->id }}"
                                            data-month-dropdown-class="month-dropdown"
                                            data-year-dropdown-class="year-dropdown">
                                            <i class="fas fa-eye"></i>
                                        </button></th>
                                </tr>
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
        document.addEventListener('DOMContentLoaded', function() {
            // Get radio buttons and photo upload element
            var uploadPhotoYes = document.getElementById('upload_photo_yes');
            var uploadPhotoNo = document.getElementById('upload_photo_no');
            var photoUpload = document.getElementById('photo');
            var maxImages = 12;

            // Add event listener to radio buttons to toggle photo upload visibility
            uploadPhotoYes.addEventListener('change', function() {
                photoUpload.style.display = this.checked ? 'block' : 'none';
            });

            uploadPhotoNo.addEventListener('change', function() {
                photoUpload.style.display = this.checked ? 'none' : 'block';
            });

            // Add event listener to enforce the maximum selection limit
            photoUpload.addEventListener('change', function() {
                var selectedFiles = this.files;
                if (selectedFiles.length > maxImages) {
                    alert('You can select a maximum of ' + maxImages + ' images.');
                    this.value = ''; // Clear selected files
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('form').submit(function(e) {
                e.preventDefault();

                // Disable the submit button to prevent multiple submissions
                $('button[type="submit"]').prop('disabled', true);

                // Create FormData object to handle file uploads
                var formData = new FormData($(this)[0]);

                // Add the CSRF token
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

                // Make an Ajax request
                $.ajax({
                    type: 'POST',
                    url: '{{ route('update.doctor', ['id' => $doctor->id]) }}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: false,
                    processData: false,

                    success: function(data) {
                        // Assume data.success is a flag indicating success
                        if (data.success) {
                            // Show Toastr success notification
                            toastr.success('Form submitted successfully!', 'Success');

                            // Redirect after 3 seconds
                            setTimeout(function() {
                                window.location.href =
                                    '{{ route('mr-dashboard.index') }}';
                            }, 2000);
                        } else {
                            // Show Toastr error notification
                            toastr.error('Form submission failed. Please check your input.',
                                'Error');
                        }
                    },
                    error: function() {
                        // Show Toastr error notification
                        toastr.error('Something went wrong. Please try again later.', 'Error');
                    },
                    complete: function() {
                        // Enable the submit button after the Ajax request completes
                        $('button[type="submit"]').prop('disabled', false);
                    }
                });

            });
        });
    </script>
@endsection
