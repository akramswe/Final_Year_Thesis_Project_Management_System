<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>@yield('title')</title>
   <!-- Favicon-->
    <link rel="icon" type="image/png" href="admin_css/images/icons/logo1.png"/>
   <!--   For Data table -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>   


    <!-- End Datatable -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="admin_css/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin_css/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="admin_css/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_css/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="admin_css/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="admin_css/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="admin_css/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="admin_css/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin_css/bower_components/bootstrap-daterangepicker/daterangepicker.css">

<!-- for data table -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<!-- DataTables -->
  <link rel="stylesheet" href="admin_css/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- CSV file download -->

    <!-- Custom Css -->
    <link href="admin_css/style.css" rel="stylesheet">
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
              <img src="images/user.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/user.png" class="img-circle" alt="User Image">

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
          <img src="images/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      @php
        $curl=url()->current();
        @endphp
        
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <li class="header">MAIN NAVIGATION</li>
        @if( Auth::user()->role == "admin" &&  Auth::user()->campus == NULL)
           <li @if(strstr($curl,"admin") )
                        class="active"
                        @endif class="">
          <a href="{{url('admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
    <li @if(strstr($curl,"addstudent") )
                        class="active"
                        @endif class="">
          <a href="{{url('addstudent')}}">
            <i class="fa fa-plus-square"></i> <span>Add Student</span>
          </a>
        </li>
        <li @if(strstr($curl,"editstudent") )
                        class="active"
                        @endif class="">
          <a href="{{url('editstudent')}}">
            <i class="fa fa-edit"></i> <span>Update Proposal</span>
          </a>
        </li>
        <!--<li @if(strstr($curl,"viewvideo") )-->
        <!--                class="active"-->
        <!--                @endif class="">-->
        <!--  <a href="{{url('viewvideo')}}">-->
        <!--    <i class="fa fa-video-camera"></i> <span>View Video</span>-->
        <!--  </a>-->
        <!--</li>-->
        
       <li @if(strstr($curl,"sample") )
                        class="active"
                        @endif class="">
          <a href="{{url('sample')}}">
            <i class="fa fa-address-card"></i> <span>Assign Supervisor</span>
          </a>
        </li>
        <!--<li @if(strstr($curl,"internal") )-->
        <!--                class="active"-->
        <!--                @endif class="">-->
        <!--  <a href="{{url('internal')}}">-->
        <!--    <i class="fa fa-address-card"></i> <span>Assign Internal Reviewer</span>-->
        <!--  </a>-->
        <!--</li>-->
        <!--<li @if(strstr($curl,"supervisorsummary") )-->
        <!--                class="active"-->
        <!--                @endif class="">-->
        <!--  <a href="{{url('supervisorsummary')}}">-->
        <!--    <i class="fa fa-tasks"></i> <span>Summury Of Supervisor</span>-->
        <!--  </a>-->
        <!--</li>-->
        <!--<li @if(strstr($curl,"allproject") )-->
        <!--                class="active"-->
        <!--                @endif class="">-->
        <!--  <a href="{{url('allproject')}}">-->
        <!--    <i class="fa fa-list"></i> <span>All Student</span>-->
        <!--  </a>-->
        <!--</li>-->
         <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>All Student</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="{{ url('/allstudentinfo') }}"><i class="fa fa-circle-o"></i>All Student Info Download</a></li>
            <li><a href="{{ url('/allproject') }}"><i class="fa fa-circle-o"></i>All Student Info View</a></li>
          </ul>
        </li> 
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-exclamation-circle"></i> <span>Notice</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="{{ url('/semesternotice') }}"><i class="fa fa-circle-o"></i>Semester Wise Notice</a></li>
            <li><a href="{{ url('/eligibility') }}"><i class="fa fa-circle-o"></i>Eligibility Notice</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bullhorn"></i> <span>Semester</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="{{ url('/updatesemester') }}"><i class="fa fa-graduation-cap"></i>Update Semester</a></li>
            <li><a class="noclick" href="{{ url('/linkdisable') }}"><i class="fa fa-circle-o"></i>Disable Link</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Student View</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
          <li @if(strstr($curl,"student") )
                        class="active"
                        @endif class="">
          <a href="{{url('student')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
           <li @if(strstr($curl,"myproposal") )
                        class="active"
                        @endif>
          <a href="{{url('myproposal')}}">
           <i class="fa fa-eye"></i>
               <span>View Proposal</span>
               </a>
       </li>
        <li @if(strstr($curl,"uploadvideo") )
                        class="active"
                        @endif>
          <a href="{{url('uploadvideo')}}">
           <i class="fa fa-upload"></i>
               <span>Submit URL</span>
               </a>
       </li>
       <!-- <li @if(strstr($curl,"#") )-->
       <!--                 class="active"-->
       <!--                 @endif>-->
       <!--   <a href="#">-->
       <!--    <i class="fa fa-cloud-upload"></i>-->
       <!--        <span>Upload File</span>-->
       <!--        </a>-->
       <!--</li>-->
        <li class="">
          <a href="{{url('allmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
            @php
               $count=0;
             @endphp

                             @php
                              echo '<span class="badge bg-red">'. $count .' unread'. '</span>';
                             @endphp
          </a>
        </li>
          </ul>
        </li>
        
        <li @if(strstr($curl,"shiftsemester") )
                        class="active"
                        @endif class="">
          <a href="{{url('shiftsemester')}}">
            <i class="fa fa-refresh"></i> <span>Shift Semester</span>
          </a>
        </li>
        
        <li @if(strstr($curl,"review") )
                        class="active"
                        @endif class="">
          <a href="{{url('review')}}">
            <i class="fa fa-eye"></i> <span>Review</span>
          </a>
        </li>
        
        <li @if(strstr($curl,"feedback") )
                        class="active"
                        @endif class="">
          <a href="{{url('feedback')}}">
            <i class="fa fa-commenting"></i> <span>Feedback List</span>
          </a>
        </li>
        
     <li @if(strstr($curl,"absent") )
                        class="active"
                        @endif class="">
          <a href="{{url('absent')}}">
            <i class="fa fa-ban"></i> <span>Absent Student</span>
          </a>
        </li>
        
  <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Send Email</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Attendign Seminar_1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Document Submission</a></li>
          </ul>
        </li>
         <li class="header">ASSIGNED STUDENT PART</li>
        <li  class="treeview">
          <a href="#">
            <i class="fa fa-info-circle"></i> <span>Assigned Student Info</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li @if(strstr($curl,"assignstudentinfo") )
                        class="active"
                        @endif class="">
          <a href="{{url('assignstudentinfo')}}">
            <i class="fa fa-plus-circle"></i> <span>Assigned Student</span>
          </a>
        </li>
         <li @if(strstr($curl,"internalrvw") )
                        class="active"
                        @endif class="">
          <a href="{{url('internalrvw')}}">
            <i class="fa fa-plus-circle"></i> <span>Assigned Internal Student</span>
          </a>
        </li>
        <li @if(strstr($curl,"showfeedback") )
                        class="active"
                        @endif class="">
          <a href="{{url('showfeedback')}}">
            <i class="fa fa-address-card-o"></i> <span>Assigned Student Feedback</span>
          </a>
        </li>
        <li @if(strstr($curl,"sentmessage") )
                        class="active"
                        @endif class="">
          <a href="{{url('sentmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
          </a>
        </li>
          </ul>
        </li>
        
        @elseif( Auth::user()->role == "admin" &&  Auth::user()->campus == "PC")
           <li @if(strstr($curl,"admin") )
                        class="active"
                        @endif class="">
          <a href="{{url('admin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
    <li @if(strstr($curl,"addstudent") )
                        class="active"
                        @endif class="">
          <a href="{{url('addstudent')}}">
            <i class="fa fa-plus-square"></i> <span>Add Student</span>
          </a>
</li>
        <li @if(strstr($curl,"editstudent") )
                        class="active"
                        @endif class="">
          <a href="{{url('editstudent')}}">
            <i class="fa fa-edit"></i> <span>Update Proposal</span>
          </a>
        </li>
  
        
       <li @if(strstr($curl,"pcstudent") )
                        class="active"
                        @endif class="">
          <a href="{{url('pcstudent')}}">
            <i class="fa fa-address-card"></i> <span>Assign Supervisor</span>
          </a>
        </li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>All Student</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="{{ url('/pcstudentinfo') }}"><i class="fa fa-circle-o"></i>All Student Info Download</a></li>
            <li><a href="{{ url('/pcstudentview') }}"><i class="fa fa-circle-o"></i>All Student Info View</a></li>
          </ul>
        </li> 
        
        <!--<li class="treeview">-->
        <!--  <a href="#">-->
        <!--    <i class="fa fa-exclamation-circle"></i> <span>Notice</span>-->
        <!--     <span class="pull-right-container">-->
        <!--      <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </span>-->
        <!--  </a>-->
        <!--   <ul class="treeview-menu">-->
        <!--    <li><a href="{{ url('/semesternotice') }}"><i class="fa fa-circle-o"></i>Semester Wise Notice</a></li>-->
        <!--    <li><a href="{{ url('/eligibility') }}"><i class="fa fa-circle-o"></i>Eligibility Notice</a></li>-->
        <!--  </ul>-->
        <!--</li>-->
        <!-- <li class="treeview">-->
        <!--  <a href="#">-->
        <!--    <i class="fa fa-bullhorn"></i> <span>Semester</span>-->
        <!--     <span class="pull-right-container">-->
        <!--      <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </span>-->
        <!--  </a>-->
        <!--   <ul class="treeview-menu">-->
        <!--    <li><a href="{{ url('/updatesemester') }}"><i class="fa fa-graduation-cap"></i>Update Semester</a></li>-->
        <!--    <li><a class="noclick" href="{{ url('/linkdisable') }}"><i class="fa fa-circle-o"></i>Disable Link</a></li>-->
        <!--  </ul>-->
        <!--</li>-->
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Student View</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
          <li @if(strstr($curl,"student") )
                        class="active"
                        @endif class="">
          <a href="{{url('student')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
           <li @if(strstr($curl,"myproposal") )
                        class="active"
                        @endif>
          <a href="{{url('myproposal')}}">
           <i class="fa fa-eye"></i>
               <span>View Proposal</span>
               </a>
       </li>
        <li @if(strstr($curl,"uploadvideo") )
                        class="active"
                        @endif>
          <a href="{{url('uploadvideo')}}">
           <i class="fa fa-upload"></i>
               <span>Submit URL</span>
               </a>
       </li>
       <!-- <li @if(strstr($curl,"#") )-->
       <!--                 class="active"-->
       <!--                 @endif>-->
       <!--   <a href="#">-->
       <!--    <i class="fa fa-cloud-upload"></i>-->
       <!--        <span>Upload File</span>-->
       <!--        </a>-->
       <!--</li>-->
        <li class="">
          <a href="{{url('allmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
            @php
               $count=0;
             @endphp

                             @php
                              echo '<span class="badge bg-red">'. $count .' unread'. '</span>';
                             @endphp
          </a>
        </li>
          </ul>
        </li>
        
        <li @if(strstr($curl,"shiftsemester") )
                        class="active"
                        @endif class="">
          <a href="{{url('shiftsemester')}}">
            <i class="fa fa-refresh"></i> <span>Shift Semester</span>
          </a>
        </li>
        
        <li @if(strstr($curl,"review") )
                        class="active"
                        @endif class="">
          <a href="{{url('review')}}">
            <i class="fa fa-eye"></i> <span>Review</span>
          </a>
        </li>
        
        <li @if(strstr($curl,"feedback") )
                        class="active"
                        @endif class="">
          <a href="{{url('feedback')}}">
            <i class="fa fa-commenting"></i> <span>Feedback List</span>
          </a>
        </li>
        
     <li @if(strstr($curl,"absent") )
                        class="active"
                        @endif class="">
          <a href="{{url('absent')}}">
            <i class="fa fa-ban"></i> <span>Absent Student</span>
          </a>
        </li>
        
         <li class="header">ASSIGNED STUDENT PART</li>
        <li  class="treeview">
          <a href="#">
            <i class="fa fa-info-circle"></i> <span>Assigned Student Info</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li @if(strstr($curl,"assignstudentinfo") )
                        class="active"
                        @endif class="">
          <a href="{{url('assignstudentinfo')}}">
            <i class="fa fa-plus-circle"></i> <span>Assigned Student</span>
          </a>
        </li>
         <li @if(strstr($curl,"internalrvw") )
                        class="active"
                        @endif class="">
          <a href="{{url('internalrvw')}}">
            <i class="fa fa-plus-circle"></i> <span>Assigned Internal Student</span>
          </a>
        </li>
        <li @if(strstr($curl,"showfeedback") )
                        class="active"
                        @endif class="">
          <a href="{{url('showfeedback')}}">
            <i class="fa fa-address-card-o"></i> <span>Assigned Student Feedback</span>
          </a>
        </li>
        <li @if(strstr($curl,"sentmessage") )
                        class="active"
                        @endif class="">
          <a href="{{url('sentmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
          </a>
        </li>
          </ul>
        </li>
        
        @elseif( Auth::user()->role == "superadmin")
           <li @if(strstr($curl,"superadmin") )
                        class="active"
                        @endif class="">
          <a href="{{url('superadmin')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
    <li @if(strstr($curl,"addstudent") )
                        class="active"
                        @endif class="">
          <a href="{{url('addstudent')}}">
            <i class="fa fa-plus-square"></i> <span>Add Student</span>
          </a>
        </li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-exclamation-circle"></i> <span>Teacher And Admin Info</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        <ul class="treeview-menu">
            <li @if(strstr($curl,"addteacher") )
                        class="active"
                        @endif class="">
          <a href="{{url('addteacher')}}">
            <i class="fa fa-plus-square"></i> <span>Add Teacher</span>
          </a>
        </li>
       <li @if(strstr($curl,"adminlist") )
                        class="active"
                        @endif class="">
          <a href="{{url('adminlist')}}">
            <i class="fa fa-plus-square"></i> <span>Admin List</span>
          </a>
        </li>
          </ul>
        </li>
        
        
        <li @if(strstr($curl,"editstudent") )
                        class="active"
                        @endif class="">
          <a href="{{url('editstudent')}}">
            <i class="fa fa-edit"></i> <span>Update Proposal</span>
          </a>
        </li>
        <!--<li @if(strstr($curl,"viewvideo") )-->
        <!--                class="active"-->
        <!--                @endif class="">-->
        <!--  <a href="{{url('viewvideo')}}">-->
        <!--    <i class="fa fa-video-camera"></i> <span>View Video</span>-->
        <!--  </a>-->
        <!--</li>-->
        
       <li @if(strstr($curl,"sample") )
                        class="active"
                        @endif class="">
          <a href="{{url('sample')}}">
            <i class="fa fa-address-card"></i> <span>Assign Supervisor</span>
          </a>
        </li>
        <!--<li @if(strstr($curl,"internal") )-->
        <!--                class="active"-->
        <!--                @endif class="">-->
        <!--  <a href="{{url('internal')}}">-->
        <!--    <i class="fa fa-address-card"></i> <span>Assign Internal Reviewer</span>-->
        <!--  </a>-->
        <!--</li>-->
        <!--<li @if(strstr($curl,"supervisorsummary") )-->
        <!--                class="active"-->
        <!--                @endif class="">-->
        <!--  <a href="{{url('supervisorsummary')}}">-->
        <!--    <i class="fa fa-tasks"></i> <span>Summury Of Supervisor</span>-->
        <!--  </a>-->
        <!--</li>-->
        <!--<li @if(strstr($curl,"allproject") )-->
        <!--                class="active"-->
        <!--                @endif class="">-->
        <!--  <a href="{{url('allproject')}}">-->
        <!--    <i class="fa fa-list"></i> <span>All Student</span>-->
        <!--  </a>-->
        <!--</li>-->
         <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>All Student</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="{{ url('/allstudentinfo') }}"><i class="fa fa-circle-o"></i>All Student Info Download</a></li>
            <li><a href="{{ url('/allproject') }}"><i class="fa fa-circle-o"></i>All Student Info View</a></li>
          </ul>
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-exclamation-circle"></i> <span>Notice</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="{{ url('/semesternotice') }}"><i class="fa fa-circle-o"></i>Semester Wise Notice</a></li>
            <li><a href="{{ url('/eligibility') }}"><i class="fa fa-circle-o"></i>Eligibility Notice</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bullhorn"></i> <span>Semester</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="{{ url('/updatesemester') }}"><i class="fa fa-graduation-cap"></i>Update Semester</a></li>
            <li><a class="noclick" href="{{ url('/linkdisable') }}"><i class="fa fa-circle-o"></i>Disable Link</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Student View</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
          <li @if(strstr($curl,"student") )
                        class="active"
                        @endif class="">
          <a href="{{url('student')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
           <li @if(strstr($curl,"myproposal") )
                        class="active"
                        @endif>
          <a href="{{url('myproposal')}}">
           <i class="fa fa-eye"></i>
               <span>View Proposal</span>
               </a>
       </li>
        <li @if(strstr($curl,"uploadvideo") )
                        class="active"
                        @endif>
          <a href="{{url('uploadvideo')}}">
           <i class="fa fa-upload"></i>
               <span>Submit URL</span>
               </a>
       </li>
       <!--<li @if(strstr($curl,"#") )-->
       <!--                 class="active"-->
       <!--                 @endif>-->
       <!--   <a href="#">-->
       <!--    <i class="fa fa-cloud-upload"></i>-->
       <!--        <span>Upload File</span>-->
       <!--        </a>-->
       <!--</li>-->
        <li class="">
          <a href="{{url('allmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
            @php
               $count=0;
             @endphp

                             @php
                              echo '<span class="badge bg-red">'. $count .' unread'. '</span>';
                             @endphp
          </a>
        </li>
          </ul>
        </li>
        
        <li @if(strstr($curl,"shiftsemester") )
                        class="active"
                        @endif class="">
          <a href="{{url('shiftsemester')}}">
            <i class="fa fa-refresh"></i> <span>Shift Semester</span>
          </a>
        </li>
        
        <li @if(strstr($curl,"review") )
                        class="active"
                        @endif class="">
          <a href="{{url('review')}}">
            <i class="fa fa-eye"></i> <span>Review</span>
          </a>
        </li>
        
        <li @if(strstr($curl,"feedback") )
                        class="active"
                        @endif class="">
          <a href="{{url('feedback')}}">
            <i class="fa fa-commenting"></i> <span>Feedback List</span>
          </a>
        </li>
        
     <li @if(strstr($curl,"absent") )
                        class="active"
                        @endif class="">
          <a href="{{url('absent')}}">
            <i class="fa fa-ban"></i> <span>Absent Student</span>
          </a>
        </li>
        
  <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Send Email</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i>Attendign Seminar_1</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i>Document Submission</a></li>
          </ul>
        </li>
         <li class="header">ASSIGNED STUDENT PART</li>
        <li  class="treeview">
          <a href="#">
            <i class="fa fa-info-circle"></i> <span>Assigned Student Info</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li @if(strstr($curl,"assignstudentinfo") )
                        class="active"
                        @endif class="">
          <a href="{{url('assignstudentinfo')}}">
            <i class="fa fa-plus-circle"></i> <span>Assigned Student</span>
          </a>
        </li>
        <li @if(strstr($curl,"showfeedback") )
                        class="active"
                        @endif class="">
          <a href="{{url('showfeedback')}}">
            <i class="fa fa-address-card-o"></i> <span>Assigned Student Feedback</span>
          </a>
        </li>
        <li @if(strstr($curl,"sentmessage") )
                        class="active"
                        @endif class="">
          <a href="{{url('sentmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
          </a>
        </li>
          </ul>
        </li>
        
         @elseif( Auth::user()->role == "faculty")
            <li @if(strstr($curl,"faculty") )
                        class="active"
                        @endif class="">
          <a href="{{url('faculty')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
      
        <li @if(strstr($curl,"assignstudent") )class="active"
          @endif class="">
          <a href="{{url('assignstudent')}}">
            <i class="fa fa-plus-circle"></i> <span>Assigned Student</span>
          </a>
        </li>
           <li @if(strstr($curl,"internalrvw") )
                        class="active"
                        @endif class="">
          <a href="{{url('internalrvw')}}">
            <i class="fa fa-plus-circle"></i> <span>Assigned Internal Student</span>
          </a>
        </li>
          <li @if(strstr($curl,"feedbackstudent") )class="active"
          @endif class="">
          <a href="{{url('feedbackstudent')}}">
            <i class="fa fa-address-card-o"></i> <span>Feedback</span>
          </a>
        </li>
     <li @if(strstr($curl,"sentmessage") )class="active"
          @endif class="">
          <a href="{{url('sentmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
          </a>
        </li>
        
        @else
        <li @if(strstr($curl,"myproposal") )
                        class="active"
                        @endif>
          <a href="{{url('myproposal')}}">
           <i class="fa fa-eye"></i>
               <span>View Proposal</span>
               </a>
       </li>
        <li @if(strstr($curl,"uploadvideo") )
                        class="active"
                        @endif>
          <a href="{{url('uploadvideo')}}">
           <i class="fa fa-upload"></i>
               <span>Submit URL</span>
               </a>
       </li>
       <!--<li @if(strstr($curl,"#") )-->
       <!--                 class="active"-->
       <!--                 @endif>-->
       <!--   <a href="#">-->
       <!--    <i class="fa fa-cloud-upload"></i>-->
       <!--        <span>Upload File</span>-->
       <!--        </a>-->
       <!--</li>-->
        <li class="">
          <a href="{{url('allmessage')}}">
            <i class="fa fa-commenting-o"></i> <span>View Message</span>
            @php
               $count=0;
             @endphp

                             @php
                              echo '<span class="badge bg-red">'. $count .' unread'. '</span>';
                             @endphp
          </a>
        </li>
       
       @endif
        <li @if(strstr($curl,"changePassword") )
                        class="active"
                        @endif class="">
          <a href="{{url('changePassword')}}">
            <i class="fa fa-key"></i> <span>Change Password</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  
  </footer>
<main class="py-4">
            @yield('content')
        </main>


  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="admin_css/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin_css/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="admin_css/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="admin_css/bower_components/raphael/raphael.min.js"></script>
<script src="admin_css/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="admin_css/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- jQuery Knob Chart -->
<script src="admin_css/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin_css/bower_components/moment/min/moment.min.js"></script>
<script src="admin_css/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="admin_css/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Slimscroll -->
<script src="admin_css/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin_css/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin_css/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin_css/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin_css/dist/js/demo.js"></script>


<!-- DataTables -->
<script src="admin_css/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="admin_css/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#user_table').DataTable()
  })
</script>


 <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>
</html>
