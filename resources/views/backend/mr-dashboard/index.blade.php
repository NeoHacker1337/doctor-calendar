@extends('layouts.employeemaster')
@section('content')

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        @if(Auth::guard('admin')->user()->role === 'admin')
                        <h4 class="page-title">Doctor List</h4>
                        @else
                        <h4 class="page-title"><a href="{{ Route('doctors.create')}}">Add Doctor</a></h4>
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
                                <h4 class="text-center" style="color: red;">You can add only 10 doctor details</h4>
                                <h5 class="text-center">Doctor List</h5>
                        </div>
                        <div class="card-body">

                            <table class="table table-striped table-bordered dt-responsive nowrap" id="mrTable"
                                style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
                                        <th>Hospital Name</th>
                                        <th>Registration No.</th>
                                        <th>Education</th>
                                        <th>Specialization</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>DOB</th>
                                        <th>Marriage Anniversary</th>
                                        <th>Date of Joining</th>                                             
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @if(count($doctor) > 0)
                                    @foreach ($doctor as $index => $dr)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $dr->hospital_name }}</td>
                                        <td>{{ $dr->registration_number}} </td>
                                        <td>{{ $dr->education }}</td>
                                        <td>{{ $dr->specialization }}</td>
                                        <td>{{ $dr->address}}</td>
                                        <td>{{ $dr->email}} </td>
                                        <td>{{ $dr->contact_number}} </td>
                                        <td>{{ $dr->date_of_birth }}</td>
                                        <td>{{ $dr->marriage_anniversary ? $dr->marriage_anniversary : 'Date not Selected'}}</td>
                                        <td>{{ $dr->created_at}} </td>
                                        <td>
                                            <a href="{{ route('doctors.show', ['doctor' => $dr->id]) }}" class="btn btn-sm btn-info" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('doctors.edit', ['doctor' => $dr->id]) }}" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
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