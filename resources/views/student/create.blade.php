<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Dashboard</title>
 <!-- Favicon-->
<link rel="icon" type="image/png" href="../images/icons/logo1.png"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />

     <!-- Toastr CSS-->
    <link rel="stylesheet" type="text/css" href="../payinfo/toastr.min.css">

     <!-- jQuery CDN -->
    <script type="text/javascript" src="payinfo/jquery.min.js"></script>

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue == 'Internship'){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script>

</head>

<body class="theme-deep-orange">

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{url('admin')}}">Student Dashboard</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  {{ Auth::user()->name }}</div>
                    <div class="email">  {{ Auth::user()->email_id }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            
                            <li role="separator" class="divider"></li>
                            <li><li> <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons">input</i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="{{url('student')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                     <li>
                        <a href="{{url('student/create')}}">
                            <i class="material-icons">add_circle</i>
                            <span>Submit Proposal</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('myproposal')}}">
                            <i class="material-icons">system_update_alt</i>
                            <span>View Proposal</span>
                        </a>
                    </li>
                     <li>
                        <a href="{{url('allmessage')}}">
                            <i class="material-icons">message</i>
                            <span>View Message</span> <span class="badge bg-red">0 Unread</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('changePassword')}}">
                            <i class="material-icons">lock</i>
                            <span>Change Password</span>
                        </a>
                    </li>
                   
                    </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                 <a href="javascript:void(0);">Copyright &copy;2019 All rights reserved Department of Software Engineering Department Development Team: Asif Khan Shakir, Md. Shohel Arman, Washim Akram</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Submit Here your Proposal</h2>
                            
                        </div>
                        <div class="body">
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
          <form class="" action="{{url('student')}}" method="POST">
{{csrf_field()}}


     <div class="form-row">
      <div class="form-group col-6">
         <label for="exampleInputEmail1">Student ID</label>
         <input name="s_id" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ Auth::user()->email }}" readonly>
       </div>

       <div class="form-group col-6">
          <label for="exampleInputEmail1">Student Name</label> <span class="text-danger">* If you want then you can change your name.</span>
          <input name="s_name" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-6">
           <label for="exampleInputEmail1">Batch</label>
           <input name="batch" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="Enter Your Batch">
         </div>

         <div class="form-group col-6">
          <label for="exampleFormControlSelect1">Semester</label>
          <select type="text" class="form-control form-control-sm" name="semester">

            <option value="Spring-2020">Spring-2020</option>
            <option value="Summer-2020">Summer-2020</option>
            <option value="Fall-2020">Fall-2020</option>
          </select>
        </div>
        </div>

        <div class="form-row">

          <div class="form-group col-6">
             <label for="exampleInputEmail1">Email</label>
             <input name="email" class="form-control" id="exampleInputEmail1" name="Passingyear" aria-describedby="emailHelp" value="{{Auth::user()->email_id}}" readonly>
           </div>

           <div class="form-group col-6">
            <label for="exampleInputEmail1">Phone Number</label>
           <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Here your phone number">
          </div>
        </div>
        
        <div class="form-row">

         <div class="form-group col-6">
            <label for="exampleInputEmail1">Study Area</label>
           <input name="study" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Artificial intelligence / machine learning/ management project">
          </div>

           <div class="form-group col-6">
            <label for="exampleInputEmail1">CGPA</label>
           <input name="cgpa" type="text" class="form-control" id="cgpa" aria-describedby="emailHelp" placeholder="Enter Here your CGPA">

          </div>
        </div>

      <div class="form-row">
        <div class="form-group col-6">
            <label for="exampleFormControlSelect1">Project/Thesis/Internship</label>
            <select class="form-control form-control-sm" name="project" id="project">
              <option value="Project">Project</option>
              <option value="Thesis">Thesis</option>
              <option value="Internship">Internship</option>
            </select>
              <div class="Internship box"><span class="text-danger">* If you choose an intern, you must submit your appointment latter to Project/Thesis committee. Later committee will decide your application.</span></div>
          </div>

        <div class="form-group col-6">
           <label for="exampleInputEmail1">Title</label>
           <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter here Title">
         </div>

           
        </div>

        <!--<div class="form-row">-->
          <!-- <div class="form-group col-30">
             <label for="exampleInputEmail1">Title</label>
             <input name="title" type="text" class="form-control" id="exampleInputEmail1" name="Passingyear" aria-describedby="emailHelp" placeholder="">
           </div>
 -->
          <div class="form-group">
             <label for="exampleFormControlTextarea1">Project/Thesis Description</label> <br>
             <textarea name="description"  id="exampleFormControlTextarea1"  rows="5" cols="100" placeholder="Enter here short description"> </textarea>
           </div>


           <div class="" >
             <button type="submit" class="btn btn-success">Submit</button>
           </div>


    </form>
               
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->       
        </div>
        
    </section>
    

   <!-- toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>
