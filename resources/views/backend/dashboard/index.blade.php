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
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                        
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title -->

                <div class="row">

                 

                    <div class="col-sm-12 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Total MR</h5>
                                </div>
                                <h3 class="mt-4">{{ $mr_count }}</h3>
                                 
                                <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Total Doctor</h5>
                                </div>
                                <h3 class="mt-4">{{ $doctor_count }}</h3>
                               
                                <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p>
                            </div>
                        </div>
                    </div>

             

                </div>

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




