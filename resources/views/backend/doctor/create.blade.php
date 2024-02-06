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

                                    <h4 class="mt-0 header-title text-center mb-3">Add Doctor</h4>


                                    <form method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">

                                            <label for="hospital_name" class="col-sm-2 col-form-label">Hospital Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="hospital_name"
                                                    placeholder="XYZ Hospital" id="hospital_name">
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="name" placeholder="John"
                                                    id="john">
                                            </div>
                                            <label for="registration_number" class="col-sm-2 col-form-label">Registration
                                                Number</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text" name="registration_number"
                                                    maxlength="21" minlength="20" placeholder="5673456"
                                                    id="registration_number">
                                            </div>
                                        </div>


                                        <div class="form-group row">

                                            <label for="example-search-input" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="email" placeholder="john@example.com"
                                                    name="email" id="email">
                                            </div>
                                            <label for="contact_number" class="col-sm-2 col-form-label">Phone</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="number" placeholder="+91-1234567890"
                                                    name="contact_number" id="contact_number">
                                            </div>
                                        </div>


                                        <div class="form-group row">

                                            <label for="education" class="col-sm-2 col-form-label">Education</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text"
                                                    placeholder="MD, or Doctor of Medicine" name="education" id="education">
                                            </div>


                                            <label for="example-search-input"
                                                class="col-sm-2 col-form-label">specialization</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="text"
                                                    placeholder="Cardiologists , Endocrinologist etc" name="specialization"
                                                    id="specialization">
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">Address:</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" placeholder="872/2 Building, Street..." name="address" id="address" rows="4"></textarea>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label for="example-date-input" class="col-sm-2 col-form-label">Date of
                                                Birth</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="date" name="date_of_birth"
                                                    id="date_of_birth">
                                            </div>

                                            <label for="marriage_anniversary" class="col-sm-2 col-form-label">Marriage
                                                Anniversary</label>
                                            <div class="col-sm-4">
                                                <input class="form-control" type="date" name="marriage_anniversary"
                                                    id="marriage_anniversary">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Upload Photo</label>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="upload_photo_option" id="upload_photo_yes" value="yes">
                                                    <label class="form-check-label" for="upload_photo_yes">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="upload_photo_option" id="upload_photo_no" value="no"
                                                        checked>
                                                    <label class="form-check-label" for="upload_photo_no">No</label>
                                                </div>
                                            </div>

                                            <label for="photo" class="col-sm-2 col-form-label">Photo Upload</label>
                                            <div class="col-sm-4">
                                                <input type="file" class="form-control" name="photo[]" id="photo"
                                                    accept="image/*" multiple style="display: none;">
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
                    url: '{{ route('doctors.store') }}',
                    data: formData,
                    contentType: false, // Important: prevent jQuery from automatically setting the content type
                    processData: false, // Important: prevent jQuery from processing the data
                    success: function(data) {
                        // Assume data.success is a flag indicating success
                        if (data.success) {
                            // Show Toastr success notification
                            toastr.success('Form submitted successfully!', 'Success');

                            // Redirect after 3 seconds
                            setTimeout(function() {
                                window.location.href = '{{ route('mr-dashboard.index') }}';
                            }, 3000);
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
