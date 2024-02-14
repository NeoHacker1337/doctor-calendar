@extends('layouts.employeemaster')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">

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


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="april_photo" class="col-form-label">April Photo</label>
                                        <input type="file" class="form-control" name="april_photo" id="april_photo"
                                            accept="image/*">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="may_photo" class="col-form-label">May Photo</label>
                                        <input type="file" class="form-control" name="may_photo" id="may_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="june_photo" class="col-form-label">June Photo</label>
                                        <input type="file" class="form-control" name="june_photo" id="june_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="july_photo" class="col-form-label">July Photo</label>
                                        <input type="file" class="form-control" name="july_photo" id="july_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="august_photo" class="col-form-label">August Photo</label>
                                        <input type="file" class="form-control" name="august_photo" id="august_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="september_photo" class="col-form-label">September Photo</label>
                                        <input type="file" class="form-control" name="september_photo"
                                            id="september_photo" accept="image/*">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="october_photo" class="col-form-label">October Photo</label>
                                        <input type="file" class="form-control" name="october_photo" id="october_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="november_photo" class="col-form-label">November Photo</label>
                                        <input type="file" class="form-control" name="november_photo" id="november_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="december_photo" class="col-form-label">December Photo</label>
                                        <input type="file" class="form-control" name="december_photo" id="december_photo"
                                            accept="image/*">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="january_photo" class="col-form-label">January Photo</label>
                                        <input type="file" class="form-control" name="january_photo" id="january_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="february_photo" class="col-form-label">February Photo</label>
                                        <input type="file" class="form-control" name="february_photo"
                                            id="february_photo" accept="image/*">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="march_photo" class="col-form-label">March Photo</label>
                                        <input type="file" class="form-control" name="march_photo" id="march_photo"
                                            accept="image/*">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="name" class="col-form-label">Doctor Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Dr.</span>
                                            <input class="form-control" type="text" name="name" placeholder="John"
                                                id="john">
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="special_month" class="col-form-label">Select Option</label>
                                        <select class="form-control" id="special_month" onchange="toggleCalendar()">
                                            <option value="normal" selected>NaN</option>
                                            <option value="special">Special Month</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row" id="normalCalendar" style="display: none;">
                                    <div class="col-sm-12">
                                        <label for="example-date-input" class="col-form-label">Happy Birth Day</label>
                                        <input class="form-control" type="date" name="date_of_birth"
                                            id="date_of_birth">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="marriage_anniversary" class="col-form-label">Marriage
                                            Anniversary</label>
                                        <input class="form-control" type="date" name="marriage_anniversary"
                                            id="marriage_anniversary">
                                    </div>
                                </div>

                                <div class="row" id="specialCalendar" style="display: none;">
                                    <!-- Add your special calendar inputs here -->
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                        <a href="javascript:history.go(-1);" class="btn btn-info">Back</a>
                                    </div>
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
        function toggleCalendar() {
            var option = document.getElementById("special_month").value;
            var normalCalendar = document.getElementById("normalCalendar");
            var specialCalendar = document.getElementById("specialCalendar");

            if (option != "special") {
                normalCalendar.style.display = "none";
                specialCalendar.style.display = "block";
            } else {
                normalCalendar.style.display = "block";
                specialCalendar.style.display = "none";
            }
        }

        // Call toggleCalendar on page load to set the initial state
        toggleCalendar();
    </script>

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
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        // Assume data.success is a flag indicating success
                        if (data.success) {
                            // Show Toastr success notification
                            toastr.success('Form submitted successfully!', 'Success');

                            // Redirect to calendar.preview route after 3 seconds
                            setTimeout(function() {
                                var imageId = data.doctor_id;
                                window.location.href =
                                    '/doctor-calendar-preview?imageId=' + imageId;
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
