<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ optional(Auth::guard('admin')->user())->role === 'admin' ? route('dashboard.index') : route('mr-dashboard.index') }}" class="waves-effect">
                        <i class="icon-accelerator"></i><span class="badge badge-success badge-pill float-right"></span> <span> Dashboard </span>
                    </a>
                </li>

                @if(optional(Auth::guard('admin')->user())->role === 'admin')
                <li>
                    <a href="{{ route('doctor-list.index')}}" class="waves-effect"><i class="fas fa-user-md"></i><span> Doctor List </span></a>
                </li>
                
                <li>
                    <a href="{{ route('marketing-representative.index')}}" class="waves-effect"><i class="fas fa-user-md"></i><span>MR </span></a>
                </li>
 
                @else  
 
                <li>
                    <a href="{{ route('doctors.index')}}" class="waves-effect"><i class="fas fa-user-md"></i><span> Doctor List </span></a>
                </li>
  
                @endif

                
  

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
