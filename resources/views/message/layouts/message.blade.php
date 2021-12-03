<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="60;URL= http://swe.application.daffodilvarsity.edu.bd/etoken/public/searchpayment">
    <meta http-equiv="refresh" content="60"> 
 <title>@yield('title')</title>
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- Favicon-->
<link rel="icon" type="image/png" href="images/icons/logo1.png"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

     <!-- Toastr CSS-->
    <link rel="stylesheet" type="text/css" href="payinfo/toastr.min.css">

     <!-- jQuery CDN -->
    <script type="text/javascript" src="payinfo/jquery.min.js"></script>

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('table thead th').each(function(i) {
                calculateColumn(i);
            });
        });

        function calculateColumn(index) {
            var total = 0;
            $('table tr').each(function() {
                var value = parseInt($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
            });
            $('table tfoot td').eq(index).text('Total: ' + total);
        }
    </script>
</head>

<body class="theme-deep-orange">

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{url('faculty')}}">Message Dashboard</a>
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
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  {{ Auth::user()->name }}</div>
                    <div class="email">  {{ Auth::user()->email }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            
                            <li role="separator" class="divider"></li>
                            <li><<li> <a class="dropdown-item" href="{{ route('logout') }}"
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
                        <a href={{url('faculty')}}>
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
               
                        @if( Auth::user()->role == 'faculty')
                             <li>
                        <a href="{{url('assignstudent')}}">
                            <i class="material-icons">system_update_alt</i>
                            <span>View Student</span>
                        </a>
                         </li>
                        @elseif( Auth::user()->role == 'admin')
                      <li>
                        <a href="{{url('viewdetails')}}">
                            <i class="material-icons">remove_red_eye</i>
                            <span>View Student</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('viewstudent')}}">
                            <i class="material-icons">system_update_alt</i>
                            <span>Assign Supervisor</span>
                        </a>
                    </li>
                     <li>
                        <a href="{{url('supervisorsummary')}}">
                            <i class="material-icons">report</i>
                            <span>Summary of Supervisor</span>
                        </a>
                    </li>
                        @endif
                   
                     @if( Auth::user()->role == 'admin')
                    <li>
                        <a href="{{url('allproject')}}">
                            <i class="material-icons">list</i>
                            <span>All Student</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('assignstudentinfo')}}">
                            <i class="material-icons">add_circle</i>
                            <span>Assigned Student</span>
                        </a>
                    </li>
                    @endif
                    
                     @if( Auth::user()->role == 'student')
                     <li>
                        <a href="{{url('student/create')}}">
                            <i class="material-icons">add_circle</i>
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
                            <i class="material-icons">system_update_alt</i>
                            <span>View Proposal</span>
                        </a>
                    </li>
                    @endif
                    <li>
                        <a href="{{url('allmessage')}}">
                            <i class="material-icons">message</i>
                            <span>View Message</span>
                             @php
                                     $count=0;
                                    @endphp
                             @foreach($students as $freelancer)
                             @if(Auth::user()->email == $freelancer->s_id)
                              @if($freelancer->status == 'pending')
                                     @php
                                    $count++;
                                    @endphp
                             @endif
                              @endif
                            @endforeach
                             @php
                              echo '<span class="badge bg-red">'. $count .' unread'. '</span>';
                             @endphp
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
        
    </section>
<main class="py-4">
            @yield('content')
        </main>

 

    <!-- toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
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
