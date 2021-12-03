@extends('admin.layouts.summury')

@section('title')
PC All Student Info
@endsection

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Download All PC student Information
        <small>Student tables</small>
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
              <br>
                    <h4 class="h4 text-info"></h4>
                    <form method="get">
                      <select name="search" class="form-control show-tick">
                       <option>--Select semester--</option>
                         @foreach($semester as $smstr)
            <option value="{{$smstr->semester_name}}-{{$smstr->year}}">{{$smstr->semester_name}}-{{$smstr->year}}</option>
            @endforeach
                       </select> 
                       <br>
                       <select name="campus" class="form-control show-tick">
                           <option>--Select Campus---</option>
                            <option value="MC">MC</option>
                           <option value="PC">PC</option>
                       </select>
                    <br>
                      <button class="btn btn-info mt-2" id="searchCat">Seach</button>
                    </form>
            </div>

<!--           <div id="checkbox_div">-->
<!-- <p>Show Hide Column</p>-->
<!-- <li><input type="checkbox" value="hide" id="name_col" onchange="hide_show_table(this.id);">Student ID</li>-->
<!-- <li><input type="checkbox" value="hide" id="age_col" onchange="hide_show_table(this.id);">Student Name</li>-->
<!-- <li><input type="checkbox" value="hide" id="city_col" onchange="hide_show_table(this.id);">City</li>-->
<!--</div>-->

            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_table" class="table table-bordered table-striped js-exportable">
                <thead>
                                <tr>
                                  <th id="name_col_head">Student ID</th>
                                  <th id="age_col_head">Student Name</th>
                                  <th id="city_col_head">Email</th>
                                  <th>Semester</th> 
                                  <th>Project/Thesis</th>
                                  <th>Title</th>
                                  <th>Description</th>
                                  <th>Campus</th>
                                  <th>Supervisor Name</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($students as $stdnt)
                                 <tr>
                                  <td class="name_col" >{{ $stdnt->s_id}} </td>
                                  <td class="age_col"> {{ $stdnt->s_name}} </td>
                                  <td class="city_col"> {{ $stdnt->email}} </td>
                                  <td>{{ $stdnt->semester }}</td>
                                  <td> {{ $stdnt->project}} </td>
                                  <td> {{ $stdnt->title}} </td>
                                  <td> {{ $stdnt->description}} </td>
                                  <td> {{ $stdnt->campus}} </td>
                                  <td> {{ $stdnt->sv_init}} </td>

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
    
    <script type="text/javascript">
function hide_show_table(col_name)
{
 var checkbox_val=document.getElementById(col_name).value;
 if(checkbox_val=="hide")
 {
  var all_col=document.getElementsByClassName(col_name);
  for(var i=0;i<all_col.length;i++)
  {
   all_col[i].style.display="none";
  }
  document.getElementById(col_name+"_head").style.display="none";
  document.getElementById(col_name).value="show";
 }
	
 else
 {
  var all_col=document.getElementsByClassName(col_name);
  for(var i=0;i<all_col.length;i++)
  {
   all_col[i].style.display="table-cell";
  }
  document.getElementById(col_name+"_head").style.display="table-cell";
  document.getElementById(col_name).value="hide";
 }
}
</script>
        
@endsection
