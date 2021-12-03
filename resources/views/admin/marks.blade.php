@extends('admin.layouts.master')

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
                        <option value="Spring-2020">Spring-2020</option>
                        <option value="Summer-2020">Summer-2020</option>
                        <option value="Fall-2020">Fall-2020</option>
                       </select> 
                    
                      <button class="btn btn-info mt-2" id="searchCat">Seach</button>
                    </form>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_table" class="table table-bordered table-striped js-exportable">
                <thead>
                                <tr>
                                  <th>Student ID</th>
                                  <th>Student Name</th>
                                  <th>Semester</th> 
                                 <th>Email</th>
                                  <th>Internal Mark</th>
                                  <th>Supervisor Mark</th>
                                  <th>Total Mark</th>
                                  <!--<th>Submit Mark</th>-->
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($students_intr as $freelancer)
                                 <tr>
                                  <td > {{ $freelancer->s_id}} </td>
                                  <td> {{ $freelancer->s_name}} </td>
                                  <td>{{ $freelancer->semester }}</td>
                                  <td> {{ $freelancer->email}} </td>
                                  <td class="subjects"> {{ $freelancer->intrnl_mark}} </td>
                                  <td class="subjects"> {{ $freelancer->spr_mark }} </td>
                                  <td id="TotMarks"></td>
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
    $(document).ready(function()
    {
        $('tr').each(function()
        {
            var totmarks=0;
            $(this).find('.subjects').each(function()
            {
                var marks = $(this).text();
                if(marks.length !== 0 )
                {
                    totmarks+=parseFloat(marks);
                }
            });
            $(this).find('#TotMarks').html(totmarks)
        });
    });
</script>


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
