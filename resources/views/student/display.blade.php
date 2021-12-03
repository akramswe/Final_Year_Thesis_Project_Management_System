@extends('admin.layouts.master')

@section('title')
Proposal list
@endsection

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>
      <!-- @if(count($errors)>0)-->
      <!--  <div class="alert alert-danger w-50 mx-auto mt-3 text-center">-->
      <!--    <ul>-->
      <!--      @foreach($errors->all() as $error)-->
      <!--        <li style="list-style: none;">{{$error}}</li>-->
      <!--      @endforeach-->
      <!--    </ul>-->
      <!--  </div>-->
      <!--@endif-->
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
   <div class="box-header">
              <h3 class="box-title">Proposal List</h3>
                    <marquee><h3><b>Dear student, you can update your proposal at once. But When assigned to the supervisor then you cannot update your proposal.</b></h3></marquee>

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
            </div>

  @foreach($semester as $smstr)
      @if($smstr->status == 'open')
      @if(!empty($email->email))
        <div align="right">
           <button disabled type="button" class="btn btn-danger btn-sm">Already Submited Proposal</button>
        </div>
      @else
        <div align="right">
         <button  type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Submit Proposal</button>
            </div>
        @endif
        @else
        <div align="right">
           <button disabled type="button" class="btn btn-danger btn-sm">Link Disabled Right Now</button>
        </div>
        @endif
    @endforeach

            <!-- /.box-header -->
            <div class="box-body">
        <br />
      <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
                                    <thead>
                                <tr>
                                  <th>Student ID</th>
                                  <th>Student Name</th>
                                  <th>Semester</th> 
                                  <th>Phone</th>
                                  <th>Project/Thesis</th>
                                  <th>Title</th>
                                  <th>Feedback</th>
                                  <th>Supervisor Initial</th>
                                  <th>Internal Reviewer Initial</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($students as $freelancer)
                                 @if($freelancer->email ==  Auth::user()->email)
                                <tr>
                                  <td> {{ $freelancer->s_id}} </td>
                                  <td> {{ $freelancer->s_name}} </td>
                                  <td>{{ $freelancer->semester }}</td>
                                  <td> {{ $freelancer->phone}} </td>
                                  <td> {{ $freelancer->project}} </td>
                                  <td> {{ $freelancer->title}} </td>
                                    @if($freelancer->feedback == NULL)
                                   <td> <span class="label label-danger">Feedback is not done.</span> </td>
                                  @else
                                    <td> {{ $freelancer->feedback}} </td>
                                  @endif
                                 
                                  @if($freelancer->sv_init == NULL)
                                   <td> <span class="label label-danger"> The supervisor not yet assigned </span> </td>
                                  @else
                                  <td>{{$freelancer->sv_init}}</td>
                                  @endif
                                  
                                   @if($freelancer->Internal_Reviewer_1 == NULL)
                                   <td> <span class="label label-info"> The Internal Reviewer not yet assigned </span> </td>
                                  @else
                                  <td>{{$freelancer->Internal_Reviewer_1}}</td>
                                  @endif
                                  
                                 
                                  @if($freelancer->sv_init == null)
                                   <td><span class="label label-danger">Pending</span></td>
                                  @else
                                   <td><span class="label label-success">Accepted</span></td>
                                  @endif

                             @if($freelancer->sv_init == null AND $freelancer->edit == 1)
                               
                                <td><a href="{{action('ProjectController@edit', $freelancer['id'])}}" class="btn btn-warning"> <i class="fa fa-pencil-square-o"></i> Edit</a> </td>                                 
                                 @else
                                   <td><span class="label label-danger">Can Not Update</span></td>

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
                           <div id="formModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Submit Your Proposal Here</h4>
          </div>
          <div class="modal-body">
            <span id="form_result"></span>
            <form class="" action="{{url('student')}}" method="POST">
{{csrf_field()}}


     <div class="form-row">
      <div class="form-group col-6">
         <label for="exampleInputEmail1">Student ID</label>
         <input name="s_id" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ Auth::user()->email_id }}" readonly>
       </div>

       <div class="form-group col-6">
          <label for="exampleInputEmail1">Student Name</label> <span class="text-danger">* If you want then you can change your name.</span>
          <input name="s_name" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-6">
           <label for="exampleInputEmail1">Batch</label> <span class="text-danger">* Dear Student Please choose Your Batch.</span>
            <select class="form-control form-control-sm" name="batch" id="project" required>
              <option >Choose Your Batch</option>
              <option value="1st">1st</option>
              <option value="2nd">2nd</option>
              <option value="3rd">3rd</option>
              <option value="4th">4th</option>
              <option value="5th">5th</option>
              <option value="6th">6th</option>
              <option value="7th">7th</option>
              <option value="8th">8th</option>
              <option value="9th">9th</option>
              <option value="10th">10th</option>
              <option value="11th">11th</option>
              <option value="12th">12th</option>
              <option value="13th">13th</option>
              <option value="14th">14th</option>
              <option value="15th">15th</option>
              <option value="16th">16th</option>
              <option value="17th">17th</option>
              <option value="18th">18th</option>
              <option value="19th">19th</option>
              <option value="20th">20th</option>
              <option value="21st">21st</option>
              <option value="22nd">22nd</option>
              <option value="23rd">23rd</option>
              <option value="24th">24th</option>
              <option value="25th">25th</option>
              <option value="26th">26th</option>
              <option value="27th">27th</option>
              <option value="28th">28th</option>
              <option value="29th">29th</option>
              <option value="30th">30th</option>
              <option value="31st">31st</option>
              <option value="32nd">32nd</option>
              <option value="33rd">33rd</option>
              <option value="34th">34th</option>
              <option value="35th">35th</option>
              <option value="36th">36th</option>
              <option value="37th">37th</option>
              <option value="38th">38th</option>
              <option value="39th">39th</option>
              <option value="40th">40th</option>
            </select>
              
           <!--<input name="batch" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" placeholder="Enter Your Batch">-->
         </div>

         <div class="form-group col-6">
          <label for="exampleFormControlSelect1">Semester</label>
          <select type="text" class="form-control form-control-sm" name="semester">

            <!--<option value="Spring-2020">Spring-2020</option>-->
            <!--<option value="Summer-2020">Summer-2020</option>-->
           @foreach($semester as $smstr)
            <option value="{{$smstr->semester_name}}-{{$smstr->year}}">{{$smstr->semester_name}}-{{$smstr->year}}</option>
            @endforeach
          </select>
        </div>
        </div>

        <div class="form-row">

          <div class="form-group col-6">
             <label for="exampleInputEmail1">Email</label>
             <input name="email" class="form-control" id="exampleInputEmail1" name="Passingyear" aria-describedby="emailHelp" value="{{Auth::user()->email}}" readonly>
           </div>
           
           <div class="form-group col-6">
             <label for="exampleInputCampus">Campus</label>
             <input name="campus" class="form-control" id="exampleInputCampus" aria-describedby="campusHelp" value="{{Auth::user()->campus}}" readonly>
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
           <div class="form-group col-6">
            <label for="exampleInputEmail1">Credit Completed</label>
           <input name="credit" type="number" class="form-control" id="credit" aria-describedby="emailHelp" placeholder="Enter Here Complicated Credit">

          </div>
        </div>
        
        <div class="form-row">
        <div class="form-group col-6">
            <label for="exampleFormControlSelect1">Choose Your Course</label>
            <select class="form-control form-control-sm" name="course" id="project">
              <option value="Thesis/Project-SWE431">Thesis/Project-SWE431</option>
              <option value="Final Year Project/ Thesis/ Internship-SE431">Final Year Project/ Thesis/ Internship-SE431</option>
              <option value="Thesis/Project (CS Major)-SE422">Thesis/Project (CS Major)-SE422</option>
              <option value="Data Science Major Capstone Project (DS Major)-DS431">Data Science Major Capstone Project (DS Major)-DS431</option>
              <option value="Robotics & Embedded Systems Major Capstone Project (RE Major)-RE431">Robotics & Embedded Systems Major Capstone Project (RE Major)-RE431</option>
               <option value="Cyber Security Major Capstone Project (CS Major)-CS439">Cyber Security Major Capstone Project (CS Major)-CS439</option>
            </select>
              <div class="Internship box"><span class="text-danger">* Dear Student Please choose your Course name.</span></div>
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
             <textarea name="description"  id="exampleFormControlTextarea1"  rows="10" cols="85" placeholder="Enter here short description"></textarea>
           </div>


           <div class="" >
             <button type="submit" class="btn btn-success">Submit</button>
           </div>


    </form>
          </div>
      </div>
    </div>
</div>

<script>
$(document).ready(function(){

  $('#create_record').click(function(){
    $('.modal-title').text('Submit Your Proposal Here');
    $('#action_button').val('Add');
    $('#action').val('Add');
    $('#form_result').html('');

    $('#formModal').modal('show');
  });

  $('#sample_form').on('submit', function(event){
    event.preventDefault();
    var action_url = '';


    $.ajax({
      url: action_url,
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      success:function(data)
      {
        var html = '';
        if(data.errors)
        {
          html = '<div class="alert alert-danger">';
          for(var count = 0; count < data.errors.length; count++)
          {
            html += '<p>' + data.errors[count] + '</p>';
          }
          html += '</div>';
        }
        if(data.success)
        {
          html = '<div class="alert alert-success">' + data.success + '</div>';
          $('#sample_form')[0].reset();
          $('#user_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
      }
    });
  });

  

  var user_id;

  $(document).on('click', '.delete', function(){
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
  });

  $('#ok_button').click(function(){
    $.ajax({
      url:"sample/destroy/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
        setTimeout(function(){
          $('#confirmModal').modal('hide');
          $('#user_table').DataTable().ajax.reload();
          alert('Data Deleted');
        }, 2000);
      }
    })
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
