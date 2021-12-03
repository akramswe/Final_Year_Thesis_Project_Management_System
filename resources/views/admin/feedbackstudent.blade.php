@extends('admin.layouts.master')

@section('title')
Feedback List
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
Feedback List
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
                    <h4 class="h4 text-info">Select Semester</h4>
                    <form method="get">
                      <select name="search" class="form-control show-tick">
                       <option>--Select semester--</option>
                        <option value="Spring-2020">Spring-2020</option>
                        <option value="Summer-2020">Summer-2020</option>
                        <option value="Fall-2020">Fall-2020</option>
                       </select> 
                    
                      <button class="btn btn-info mt-2" id="searchCat">Seach</button>
                    </form>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
      <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
          <thead>
                                  <tr>
                                  <th>Student ID</th>
                                  <th>Student Name</th>
                                  <th>Email</th> 
                                  <th>Semester</th>
                                  <th>Feedback</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($students as $freelancer)
                                 @if($freelancer->sv_name ==  Auth::user()->name)
                                <tr>
                                  <td> {{ $freelancer->s_id}} </td>
                                  <td> {{ $freelancer->s_name}} </td>
                                  <td> {{ $freelancer->email}} </td>
                                  <td> {{ $freelancer->semester}} </td>
                                  <td> {{ $freelancer->feedback}} </td>
                                  @if($freelancer->a_status ==  'Present')
                                  <td><span class="label label-success">{{ $freelancer->a_status}}</span> </td>
                                   @elseif($freelancer->a_status ==  'Absent')
                                  <td><span class="label label-danger">{{ $freelancer->a_status}}</span> </td>
                                   @elseif($freelancer->a_status ==  'Absent')
                                  <td><span class="label label-danger">{{ $freelancer->a_status}}</span> </td>
                                  @elseif($freelancer->a_status ==  'Waiting')
                                  <td><span class="label label-warning">{{ $freelancer->a_status}}</span> </td>
                                    @endif 
                                </tr>
                                  @endif 
                                @endforeach
                              </tbody>
                             <span id="val"></span>
                            </table>
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
                      <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("mylist");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
} 
    </script>    
        
@endsection
