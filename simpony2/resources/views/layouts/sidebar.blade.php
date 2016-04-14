<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/bower_components/adminlte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
               <a href="#"><i class="fa fa-circle text-success"></i> Dept. Promo</a>

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
            <li><a href="{{url('departments')}}"><i class="glyphicon glyphicon-stats"></i><span>Melihat Department</span></a></li>
            <li><a href="{{url('users')}}"><i class="glyphicon glyphicon-user"></i><span>Mengelola User</span></a></li>
            <li><a href="{{url('assignments')}}"><i class="glyphicon glyphicon-folder-open"></i><span>Melihat Assignment Masuk</span></a></li>

            <li><a href ="{{url('assignments/listAccepted')}}"><i class="glyphicon glyphicon-share-alt"></i><span>Assign Pekerjaan ke Staff</span></a></li>
                
            <li><a href ="{{url('assignments/rejected')}}"><i class="glyphicon glyphicon-check"></i><span>Memantau Pekerjaan HG</span></a></li>
            <li><a href ="{{url('assignments/rejected')}}"><i class="glyphicon glyphicon-check"></i><span>Pekerjaan Department HOD</span></a></li>
            <li><a href ="{{url('assignments/rejected')}}"><i class="fa fa-files-o"></i><span>Melihat Pekerjaan Staff</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>