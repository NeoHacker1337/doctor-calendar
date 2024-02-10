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
                            <form method="POST" enctype="multipart/form-data">
                                @csrf


                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="april_photo" class="col-form-label d-block">April Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->april_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="april_photo" id="april_photo" accept="image/*">
                                    </div>
                                </div>
                                
                                
                                


                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="may_photo" class="col-form-label d-block">May Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->may_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="may_photo" id="may_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="june_photo" class="col-form-label d-block">June Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->june_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="june_photo" id="june_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="july_photo" class="col-form-label d-block">July Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->july_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="july_photo" id="july_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="august_photo" class="col-form-label d-block">August Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->august_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="august_photo" id="august_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="september_photo" class="col-form-label d-block">September Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->september_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="september_photo"
                                            id="september_photo" accept="image/*">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="october_photo" class="col-form-label d-block">October Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->october_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="october_photo" id="october_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="november_photo" class="col-form-label d-block">November Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->november_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="november_photo" id="november_photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="december_photo" class="col-form-label d-block">December Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->december_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="december_photo" id="december_photo"
                                            accept="image/*">
                                    </div>
                                </div>


                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="january_photo" class="col-form-label d-block">January Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->january_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="january_photo"
                                            id="january_photo" accept="image/*">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="february_photo" class="col-form-label d-block">February Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->february_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="february_photo"
                                            id="february_photo" accept="image/*">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="march_photo" class="col-form-label d-block">March Photo</label>
                                        <div>
                                            <img src="{{ asset($doctor->march_photo) }}" alt="{{ $doctor->name }}" width="100px" height="150px">
                                        </div>
                                        <input type="file" class="form-control mt-2" name="march_photo" id="march_photo"
                                            accept="image/*">
                                    </div>
                                </div>



                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="name" class="col-form-label d-block">Doctor Name</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Dr.</span>
                                            <input class="form-control mt-2" type="text" name="name" placeholder="John"
                                                id="john"value="{{ $doctor->name }}">
                                        </div>
                                    </div>


                                </div>

                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <label for="special_month" class="col-form-label">Select Option</label>
                                        <select class="form-control mt-2" id="special_month" onchange="toggleCalendar()">
                                            <option value="normal" selected>NaN</option>
                                            <option value="special">Special Month</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4" id="normalCalendar" style="display: none;">
                                    <div class="col-sm-12">
                                        <label for="example-date-input" class="col-form-label">Date of Birth</label>
                                        <input class="form-control mt-2" type="date" name="date_of_birth"
                                            id="date_of_birth" value="{{ $doctor->date_of_birth}}">
                                    </div>
                                    <div class="col-sm-12">
                                        <label for="marriage_anniversary" class="col-form-label">Marriage
                                            Anniversary</label>
                                        <input class="form-control mt-2" type="date" name="marriage_anniversary"
                                            id="marriage_anniversary" value="{{ $doctor->marriage_anniversary }}">
                                    </div>
                                </div>

                                <div class="row mt-4" id="specialCalendar" style="display: none;">
                                    <!-- Add your special calendar inputs here -->
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>


                            {{-- <table class="table table-striped table-bordered dt-responsive nowrap" id="mrTable"
                            style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Dr. Photo</th>
                                    
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td >
                                        <div class="row" style="display: flex; align-items: center;">
                                            <div class="col-md-3">
                                                <img src="{{ asset($doctor->april_photo) }}" alt="{{ $doctor->name }}" width="200px" height="250px">
                                            </div>
                                            <div class="col-md-9 d-flex align-items-center justify-content-center">
                                                <input type="file" class="form-control w-50" name="april_photo" id="april_photo" accept="image/*">
                                            </div>
                                        </div>
                                       <div class="text-center mt-2"> <button class="btn btn-primary"
                                        >
                                         Save
                                     </button></div>
                                    </td>
                                    
                                    
                                </tr> --}}
                                {{-- <tr>
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
                                </tr> --}}
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
