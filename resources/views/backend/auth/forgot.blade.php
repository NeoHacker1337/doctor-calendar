@extends('layouts.master')
@section('content')
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="home-btn d-none d-sm-block">
        <a href="{{ url('/') }}" class="text-white"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">

            <div class="card-body">
                <h5 class="font-18 text-center">Password Reset</h5>

                <div class="text-center m-t-0 m-b-15">
                    <a href="{{ url('/') }}" class="logo logo-admin"><img
                            src="{{ asset('assets/images/doctor_logo_dark.png') }}" alt="" height="200px"></a>
                </div>

                <form class="form-horizontal m-t-30" method="POST" action="{{ route('admin.forgotpassword.update') }}">
                    @csrf

                    <!-- Radio buttons for Admin and Employee Login -->
                    <div class="form-group">
                        <div class="col-12">
                            <label>Login Type</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="adminLogin" name="loginType" class="custom-control-input"
                                    value="admin" checked>
                                <label class="custom-control-label" for="adminLogin">Admin Login</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="employeeLogin" name="loginType" class="custom-control-input"
                                    value="employee">
                                <label class="custom-control-label" for="employeeLogin">Employee Login</label>
                            </div>
                        </div>
                    </div>

                    <!-- Admin Login Fields -->
                    <div id="adminLoginFields">
                        <div class="form-group">
                            <div class="col-12">
                                <label>Email</label>
                                <input class="form-control" name="email" type="text" required=""
                                    placeholder="Enter Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <div class="checkbox checkbox-primary">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1"> Remember me</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Login Fields -->
                    <div id="employeeLoginFields" style="visibility: hidden;">
                        <div class="form-group">
                            <div class="col-12">
                                <label>Employee ID</label>
                                <input class="form-control" name="employeeId" type="text" placeholder="Employee ID">
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light"
                                type="submit">Reset</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <!-- END wrapper -->
@endsection

@section('extra_js')
    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // JavaScript to toggle between Admin and Employee Login fields
        function submitForm() {
            // Your form submission logic here

            // Example: Log the selected login type
            var loginType = $("input[name='loginType']:checked").val();
            console.log("Selected Login Type: " + loginType);



            // Simulate form submission (remove this line in your actual implementation)
            alert("Form submitted successfully!");

            // Reset the form to clear old values
            document.getElementById('submitForm').reset();
        }

        // Toggle visibility of Admin and Employee Login fields based on radio button selection
        // Toggle visibility of Admin and Employee Login fields based on radio button selection
        $('input[name="loginType"]').change(function() {
            var selectedLoginType = $(this).val();

            // Hide all login fields
            $('#adminLoginFields, #employeeLoginFields').css('visibility', 'hidden');

            // Show the selected login fields
            if (selectedLoginType === 'admin') {
                $('#adminLoginFields').css('visibility', 'visible');
            } else if (selectedLoginType === 'employee') {
                $('#employeeLoginFields').css('visibility', 'visible');
            }
        });
    </script>
@endsection
