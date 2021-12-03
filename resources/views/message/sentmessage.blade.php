<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>@yield('title')</title>
   <!-- Favicon-->
    <link rel="icon" type="image/png" href="../../admin_css/images/icons/logo1.png"/>
   <!--   For Data table -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>   
    <!-- End Datatable -->

        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../admin_css/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../admin_css/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../admin_css/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../admin_css/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../admin_css/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../admin_css/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../admin_css/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../admin_css/bower_components/bootstrap-daterangepicker/daterangepicker.css">

<!-- for data table -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<!-- DataTables -->
  <link rel="stylesheet" href="../../../../admin_css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Admin</b>Dashboard</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Dashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                 
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../images/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../images/user.png" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name}}
                  <small>{{ Auth::user()->email_id }}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons"></i>{{ __('Sign out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../images/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
          @if( Auth::user()->role == 'admin')
        <li class="">
          <a href="{{url('admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('editstudent')}}">
            <i class="fa fa-eye"></i> <span>View Student</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('sample')}}">
            <i class="fa fa-address-card"></i> <span>Assign Supervisor</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('supervisorsummary')}}">
            <i class="fa fa-tasks"></i> <span>Summury Of Supervisor</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('allproject')}}">
            <i class="fa fa-list"></i> <span>All Student</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('sendemail')}}">
            <i class="fa fa-envelope"></i> <span>Send Email</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('assignstudentinfo')}}">
            <i class="fa fa-plus-circle"></i> <span>Assigned Student</span>
          </a>
        </li>
        
        @elseif( Auth::user()->role == 'faculty')
         <li class="">
          <a href="{{url('faculty')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('assignstudent')}}">
            <i class="fa fa-plus-circle"></i> <span>Assigned Student</span>
          </a>
        </li>
         @endif
          @if( Auth::user()->role == 'student')
                     <li>
                        <a href="{{url('student/create')}}">
                            <i class="fa fa-plus-circle"> </i>
                            <span>Submit Proposal</span>
                        </a>
                    </li>
                    
                    <!-- <li>-->
                    <!--    <a href="{{url('disablelink')}}">-->
                    <!--        <i class="material-icons">add_circle</i>-->
                    <!--        <span>Submit Proposal</span>-->
                    <!--    </a>-->
                    <!--</li>-->
                    
                    <li>
                        <a href="{{url('myproposal')}}">
                            <i class="material-icons"></i>
                            <span>View Proposal</span>
                        </a>
                    </li>
                    @endif
        <li class="">
          <a href="{{url('allmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
          </a>
        </li>
        <li class="">
          <a href="{{url('changePassword')}}">
            <i class="fa fa-key"></i> <span>Change Password</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

         <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
       @if(count($errors)>0)
        <div class="alert alert-danger w-50 mx-auto mt-3 text-center">
          <ul>
            @foreach($errors->all() as $error)
              <li style="list-style: none;">{{$error}}</li>
            @endforeach
          </ul>
        </div>
      @endif


 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <div class="box-header">
              <h3 class="box-title">Student Information</h3>
            </div>
            @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
   <form  action="{{url('sentmessage')}}" method = "post" enctype="multipart/form-data">

          {{csrf_field()}}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" name="s_name" value="{{ $student->s_name}}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="name">
                                Student ID</label>
                            <input type="text" class="form-control" id="s_id" name="s_id" value="{{ $student->s_id}}" readonly />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email}}" readonly /></div>
                        </div>

                        <div class="form-group">
                <label for="subject">
                                Subject</label>
                           <div class="form-group">
                                <input type="text" class="form-control" name="subject"  placeholder="Enter Here subject" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Due Date</label>
                           <div class="input-group">
                            <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                                <input type="date" class="form-control" name="due_date" id="datepicker" /></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" name="message" class="form-control" rows="9" cols="25"placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Select Status</label>
                            <select id="subject" name="status" class="form-control" required="required">
                                <option value="pending">Pending</option>
                                <option value="done">Complete</option>
                                <option value="progress">Progress</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">
                                File</label>
                            <input type="file" class="form-control" id="file" name="file" />
                            <span class="text-danger">* This is optional</span>
                        </div>
                    </div>
                   <div class="text-center">
                        <button type="submit" class="btn btn-primary" >Send Message</button>
                    </div>

                </div>
               
                </form>
            </div>
        </div>
    </div>
</div>
</section>
    <!-- toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>
</html>