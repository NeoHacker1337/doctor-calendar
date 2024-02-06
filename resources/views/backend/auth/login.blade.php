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
                <h5 class="font-18 text-center">Welcome</h5>

                <div class="text-center m-t-0 m-b-15">
                    <a href="{{ url('/') }}" class="logo logo-admin"><img
                            src="{{ asset('assets/images/doctor_logo_dark.png') }}" alt="" height="200px"></a>
                </div>

                <form class="form-horizontal m-t-30" method="POST" id="submitForm">
                    @csrf
                
                    <!-- Radio buttons for Admin and Employee Login -->
                    <div class="form-group">
                        <div class="col-12">
                            <label>Login Type</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="adminLogin" name="loginType" class="custom-control-input" value="admin" checked>
                                <label class="custom-control-label" for="adminLogin">Admin Login</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="employeeLogin" name="loginType" class="custom-control-input" value="employee">
                                <label class="custom-control-label" for="employeeLogin">Employee Login</label>
                            </div>
                        </div>
                    </div>
                
                    <!-- Admin Login Fields -->
                    <div id="adminLoginFields">
                        <div class="form-group">
                            <div class="col-12">
                                <label>Username</label>
                                <input class="form-control" name="email" type="text" required="" placeholder="Username">
                            </div>
                        </div>
                
                        <div class="form-group">
                            <div class="col-12">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password" required="" placeholder="Password">
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
                    <div id="employeeLoginFields" style="display: none;">
                        <div class="form-group">
                            <div class="col-12">
                                <label>Employee ID</label>
                                <input class="form-control" name="employeeId" type="text" required="" placeholder="Employee ID">
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="button" onclick="submitForm()">Log In</button>
                        </div>
                    </div>
                
                    <div class="form-group row m-t-30 m-b-0">
                        <div class="col-sm-7">
                            <a href="{{ route('admin.forgotpassword') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your
                                password?</a>
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

        // Additional logic based on the selected login type can be added here

        // ...

        // Simulate form submission (remove this line in your actual implementation)
        alert("Form submitted successfully!");

        // Reset the form to clear old values
        document.getElementById('submitForm').reset();
    }

    // Toggle visibility of Admin and Employee Login fields based on radio button selection
    $('input[name="loginType"]').change(function () {
        var selectedLoginType = $(this).val();

        // Hide all login fields
        $('#adminLoginFields, #employeeLoginFields').hide();

        // Show the selected login fields
        if (selectedLoginType === 'admin') {
            $('#adminLoginFields').show();
        } else if (selectedLoginType === 'employee') {
            $('#employeeLoginFields').show();
        }
    });
</script>


    <script>
        function submitForm() {
            // Disable the button to prevent multiple submissions
            $('#submitForm button').prop('disabled', true);

            // Get the form data
            var formData = $('#submitForm').serialize();

            // Make an AJAX request
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.checklogin') }}',
                data: formData,
                success: function(data) {
                    if (data.success) {
                        // Show Toastr success notification
                        toastr.success('Login successful. Redirecting...', 'Success');

                        // Redirect after 3 seconds
                        setTimeout(function() {
                            window.location.href = data.dashboardRoute;
                        }, 2000);
                    } else {
                        toastr.error('Password not Match');
 
                    }
                },

                error: function() {
                    // Show Toastr error notification
                    toastr.error('Something went wrong. Please try again later.', 'Error');
                },
                complete: function() {
                    // Enable the button after AJAX request completes
                    $('#submitForm button').prop('disabled', false);
                }
            });
        }
    </script>
@endsection
