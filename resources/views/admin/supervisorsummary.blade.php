@extends('admin.layouts.summury')

@section('title')
Summery Of Supervisor
@endsection

@section('content')
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
                    <h4 class="h4 text-info">Select Semester</h4>
                    <form method="get">
                      <select name="search" class="form-control show-tick">
                       <option>--Select semester--</option>
                         @foreach($semester as $smstr)
            <option value="{{$smstr->semester_name}}-{{$smstr->year}}">{{$smstr->semester_name}}-{{$smstr->year}}</option>
            @endforeach
                       </select> 
                    
                      <button class="btn btn-info mt-2" id="searchCat">Seach</button>
                    </form>
            </div>

             <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                View Summury
              </button>
      <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Summery Of Supervisor</h4>
              </div>
              <div class="modal-body">
       <table class="table table-bordered">
          <thead>
              <tr>
               <th>Supervisor Initial</th> 
               <th>Number Of Students</th>
              </tr>
          </thead>
                 <tbody>
                    @foreach ($collection as $key => $value)
                      <tr>
                      <td>{{$key}} </td>
                      <td>{{$value}} </td>
                    </tr>
                    @endforeach
                  </tbody>
                 </table>        
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_table" class="table table-bordered table-striped js-exportable">
                <thead>
                                <tr>
                                  <th>Student ID</th>
                                  <th>Student Name</th>
                                  <th>Batch</th>
                                  <th>Semester</th> 
                                  <th>Project/Thesis</th>
                                  <th>Title</th>
                                  <th>Supervisor Name</th>
                                  <th>Internal Reviewer-1</th> 
                                  <th>Internal Reviewer-2</th>
                                  <th>Mark</th>
                                  <!--<th>Submit Mark</th>-->
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($students as $freelancer)
                                 <tr>
                                  <td > {{ $freelancer->s_id}} </td>
                                  <td> {{ $freelancer->s_name}} </td>
                                  <td> {{ $freelancer->batch}} </td>
                                  <td>{{ $freelancer->semester }}</td>
                                  <td> {{ $freelancer->project}} </td>
                                  <td> {{ $freelancer->title}} </td>
                                  <td> {{ $freelancer->sv_init}} </td>
                                  <td> {{ $freelancer->Internal_Reviewer_1}} </td>
                                  <td> {{ $freelancer->Internal_Reviewer_2}} </td>
                                  <td>{{ $freelancer->mark}}</td>
                                </tr>
                                  
                                @endforeach
                              </tbody>
                             <span id="val"></span>
                             </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="#">Washim Akram</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
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
