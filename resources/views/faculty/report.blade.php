@extends('faculty.layouts.paymentlayout')

@section('title')
E-Token System
@endsection

@section('content')
    <section class="content">
    	 @if(count($errors)>0)
				<div class="alert alert-danger w-50 mx-auto mt-3 text-center">
					<ul>
						@foreach($errors->all() as $error)
							<li style="list-style: none;">{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
 <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
                    <div class="card">
                        <div class="header">
                            <h2>
                        Project/Thesis Management Report TABLE   
                            </h2>
                            
                            <h3> <span id="val"></span></h3>

                        </div>

                        <div class="body">
                        <select id="mylist" onchange="myFunction()" class="form-control show-tick">
                       <option>--Select semester--</option>
                         <option value="Spring-2020">Spring-2020</option>
                        <option value="Summer-2020">Summer-2020</option>
                        <option value="Fall-2020">Fall-2020</option>
                         <option value="Spring-2021">Spring-2021</option>
                        <option value="Summer-2021">Summer-2021</option>
                        <option value="Fall-2021">Fall-2021</option>
                       </select> 
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable" id="myTable">
                                    <thead>
                                <tr>
                                  <th>Student ID</th>
                                  <th>Student Name</th>
                                  <th>Batch</th>
                                  <th>Semester</th> 
                                  <th>Email</th> 
                                  <th>Phone</th>
                                  <th>Project/Thesis</th>
                                  <th>Title</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($students as $freelancer)
                                <tr>
                                  <td> {{ $freelancer->s_id}} </td>
                                  <td> {{ $freelancer->s_name}} </td>
                                  <td> {{ $freelancer->batch}} </td>
                                  <td>{{ $freelancer->semester }}</td>
                                  <td> {{ $freelancer->email}} </td>
                                  <td> {{ $freelancer->phone}} </td>
                                  <td> {{ $freelancer->project}} </td>
                                  <td> {{ $freelancer->title}} </td>
                                </tr>
                                  
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
