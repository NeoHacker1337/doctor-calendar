@extends('layouts.employeemaster')
@section('content')


    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        @if (Auth::guard('admin')->user()->role === 'admin')
                            <h4 class="page-title">Doctor List</h4>
                        @else
                            <h4 class="page-title"><a href="{{ Route('doctors.create') }}">Add Doctor</a></h4>
                        @endif
                    </div>

                </div>
                <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-head">
                            <h4 class="text-center" style="color: red;">Generate Calendar</h4>

                        </div>
                        <div class="card-body">

                            <table class="table table-striped table-bordered dt-responsive nowrap" id="mrTable"
                                style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Dr. Photo</th>
                                        <th>Month</th>
                                        <th>Year</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @if ($doctor)
                                        @foreach ($doctorImage as $index => $dr)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td> <img src="{{ asset($dr->path) }}" alt=""
                                                        height="200px" width="200px"></td>

                                                <td>
                                                    <select name="month_dropdown">
                                                        @for ($monthValue = 1; $monthValue <= 12; $monthValue++)
                                                            <option value="{{ $monthValue }}"
                                                                @if ($monthValue == $index + 1) selected @endif>
                                                                {{ date('F', mktime(0, 0, 0, $monthValue, 1)) }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </td>

                                                <td>
                                                    <select name="year">
                                                        @for ($year = 2024; $year <= 2034; $year++)
                                                            <option value="{{ $year }}">{{ $year }}</option>
                                                        @endfor
                                                    </select>
                                                </td>
                                                <td>
                                                     
                                                    <button class="btn btn-primary downloadbtn"
                                                        data-image-id="{{ $dr->id }}"
                                                        data-month-dropdown-class="month-dropdown"
                                                        data-year-dropdown-class="year-dropdown">
                                                        <i class="fas fa-download"></i>
                                                    </button>
 
                                                    <button class="btn btn-primary previewBtn"
                                                        data-image-id="{{ $dr->id }}"
                                                        data-month-dropdown-class="month-dropdown"
                                                        data-year-dropdown-class="year-dropdown">
                                                        <i class="fas fa-eye"></i>
                                                    </button>

                                                    <button class="btn btn-secondary"><i class="fas fa-share"></i></button>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>

                                            <td colspan="12">No Data Found</td>
                                        </tr>
                                    @endif


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->


        </div>
        <!-- container-fluid -->
    </div>

@endsection

@section('extra_css')
@endsection

@section('extra_js')
    <script>
        $(document).ready(function() {

            $('.previewBtn').on('click', function() {
                var imageId = $(this).data('image-id');
                var monthDropdownValue = $(this).closest('tr').find('select[name="month_dropdown"]').val();
                var yearDropdownValue = $(this).closest('tr').find('select[name="year"]').val();

                // Check user role and generate route accordingly
                @if (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'admin')
                    var previewUrl = '{{ route('doctor.list.calendar.preview') }}?imageId=' + imageId +
                        '&month=' + monthDropdownValue + '&year=' + yearDropdownValue;
                @elseif (Auth::guard('admin')->check() && Auth::guard('admin')->user()->role === 'mr')
                    var previewUrl = '{{ route('calendar.preview') }}?imageId=' + imageId + '&month=' +
                        monthDropdownValue + '&year=' + yearDropdownValue;
                @endif

                window.location.href = previewUrl;
            });


            $('.downloadbtn').on('click', function() {
                var imageId = $(this).data('image-id');
                var monthDropdownValue = $(this).closest('tr').find('select[name="month_dropdown"]').val();
                var yearDropdownValue = $(this).closest('tr').find('select[name="year"]').val();

                // Create FormData object
                var formData = new FormData();
                formData.append('imageId', imageId);
                formData.append('month', monthDropdownValue);
                formData.append('year', yearDropdownValue);

                $.ajax({
                    type: 'POST',
                    url: '{{ route('download.calendar.pdf') }}',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    contentType: false,
                    processData: false,

                    success: function(data) {
                        // Assume data.success is a flag indicating success
                        if (data.success) {
                            // Show Toastr success notification
                            toastr.success('Form submitted successfully!', 'Success');
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
