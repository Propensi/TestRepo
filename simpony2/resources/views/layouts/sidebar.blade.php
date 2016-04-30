<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/adminlte/dist/img/user.png") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
               <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::user()->role }}</a>

            </div>
        </div>

        <!-- search form (Optional) -->
       <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
              <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <!-- <li class="active"><a href="#"><span>Link</span></a></li> -->
            <li class="treeview">
                <a href="#"><i class="fa fa-dashboard"></i><span>Membuat Assignment</span><i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                <li><a href="{{url('assignments/create')}}">Pembuatan Iklan</a></li>
                <li><a href="#">Pembuatan Data Riset</a></li>
            </ul>
            </li>
            <li><a href="{{url('assignments/pelacakan')}}"><i class="fa fa-files-o"></i><span>Melacak Assignment</span></a></li>
          
            
            @if(Auth::user()->role == 'Head of Dept')
            @include('layouts.hod')
            @endif

            @if(Auth::user()->role == 'Head Group')
            @include('layouts.hg')
            @endif
            
            @if(Auth::user()->role == 'Staff')
            @include('layouts.staff')
            @endif

            @if(Auth::user()->role == 'Admin')    
        @include('layouts.admin')

            @endif



        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>