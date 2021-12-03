@extends('admin.layouts.master')

@section('title')
Update Proposal
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Student Information
        <small>Update Student Information and add Proposal</small>
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
              <!--<h3 class="box-title">Student Information</h3>-->
                    <select name="category_filter" id="category_filter" class="form-control">
         <option value="">Select Semester</option>
          @foreach($semester as $smstr)
            <option value="{{$smstr->semester_name}}-{{$smstr->year}}">{{$smstr->semester_name}}-{{$smstr->year}}</option>
            @endforeach
        </select>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
        <div align="right">
          <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Submit Proposal</button>
        </div>
        <br />
      <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="0.1%">Student ID</th>
              <th width="1%">Student Name</th>
              <th width="0.1%">Student Email</th>
              <th width="0.1%">Batch</th>
              <th width="1%">Semester</th>
              <th width="1%">Project/Thesis</th>
              <th width="5%">Title</th>
              <th width="1%">SV Initial</th>
              <th width="3%">Action</th>
            </tr>
          </thead>
        </table>
      </div>
      <br />
      <br />
    </div>
  </body>
</html>

<div id="formModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add New Record</h4>
          </div>
          <div class="modal-body">
            <span id="form_result"></span>
            <form method="post" id="sample_form" class=" ">
              @csrf
              <div class="form-row">
      <div class="form-group col-6">
         <label for="exampleInputEmail1">Student ID</label>
         <input name="s_id" type="text" class="form-control" id="s_id"  aria-describedby="emailHelp" >
       </div>

       <div class="form-group col-6">
          <label for="exampleInputEmail1">Student Name</label> <span class="text-danger">* If you want then you can change your name.</span>
          <input name="s_name" type="text" class="form-control" id="s_name"  aria-describedby="emailHelp" >
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-6">
           <label for="exampleInputEmail1">Batch</label> <span class="text-danger">* Dear Student Please choose Your Batch.</span>
            <select class="form-control form-control-sm" name="batch" id="batch" required>
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
          <select type="text" class="form-control form-control-sm" name="semester" id="semester">

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
             <input name="email" class="form-control" id="email" name="Passingyear" aria-describedby="emailHelp" >
           </div>
           
           <div class="form-group col-6">
             <label for="exampleInputCampus">Campus</label>
             <select type="text" class="form-control form-control-sm" name="campus" id="campus">

            <option value="MC">MC</option>
            <option value="PC">PC</option>
          
          </select>
           </div>

           <div class="form-group col-6">
            <label for="exampleInputEmail1">Phone Number</label>
           <input name="phone" type="text" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter Here your phone number">
          </div>
        </div>
        
        <div class="form-row">

         <div class="form-group col-6">
            <label for="exampleInputEmail1">Study Area</label>
           <input name="study" type="text" class="form-control" id="study" aria-describedby="emailHelp" placeholder=" Artificial intelligence / machine learning/ management project">
          </div>

           <div class="form-group col-6">
            <label for="exampleInputEmail1">CGPA</label>
           <input name="cgpa" type="text" class="form-control" id="cgpa" aria-describedby="emailHelp" placeholder="Enter Here your CGPA">

          </div>
           <div class="form-group col-6">
            <label for="exampleInputEmail1">Credit Completed</label>
           <input name="credit" type="credit" class="form-control" id="credit" aria-describedby="emailHelp" placeholder="Enter Here Complicated Credit">

          </div>
        </div>
        
        <div class="form-row">
        <div class="form-group col-6">
            <label for="exampleFormControlSelect1">Choose Your Course</label>
            <select class="form-control form-control-sm" name="course" id="course">
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
           <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter here Title">
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
             <textarea name="description"  id="description"  rows="10" cols="85" placeholder="Enter here short description"></textarea>
           </div>
       
                  <br />
                  <div class="form-group" align="center">
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="submit" name="action_button" id="action_button" class="btn btn-warning" value="Add" />
                  </div>
            </form>
          </div>
      </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#sv_name').change(function(){
    var countryID = $(this).val();    
    if(countryID){
        $.ajax({
           type:"GET",
           url:"{{url('api/viewinfo')}}?sv_id="+countryID,
           success:function(res){               
            if(res){
                $("#state").empty();
                $.each(res,function(key,value){
                    $("#state").append('<option value="'+value+'">'+value+'</option>');
                });
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
   
</script>

<script>
$(document).ready(function(){

fetch_data();

 function fetch_data(category = '')
 {

  $('#user_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{ route('editstudent.index') }}",
      data: {category:category}
    },
    columns: [
      {
        data: 's_id',
        name: 's_id'
      },
      {
        data: 's_name',
        name: 's_name'
      },
       {
        data: 'email',
        name: 'email'
      },
      {
        data: 'batch',
        name: 'batch'
      },
      {
        data: 'semester',
        name: 'semester'
      },
      {
        data: 'project',
        name: 'project'
      },
      {
        data: 'title',
        name: 'title'
      },
     {
        data: 'sv_init',
        name: 'sv_init'
      },
      {
        data: 'action',
        name: 'action',
        orderable: false
      }
    ]
  });
 }
  $('#category_filter').change(function(){
  var category_id = $('#category_filter').val();

  $('#user_table').DataTable().destroy();

  fetch_data(category_id);
 });

  $('#create_record').click(function(){
    $('.modal-title').text('Add New Record');
    $('#action_button').val('Add');
    $('#action').val('Add');
    $('#form_result').html('');

    $('#formModal').modal('show');
  });

  $('#sample_form').on('submit', function(event){
    event.preventDefault();
    var action_url = '';

    if($('#action').val() == 'Add')
    {
      action_url = "{{ route('editstudent.store') }}";
    }

    if($('#action').val() == 'Edit')
    {
      action_url = "{{ route('editstudent.update') }}";
    }

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
           $('#formModal').modal('hide');
          $('#user_table').DataTable().ajax.reload();
           alert('Student Proposal Updated successfully.');
           
        //   html = '<div class="alert alert-success">' + data.success + '</div>';
        //   $('#sample_form')[0].reset();
        //   $('#user_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
      }
    });
  });

  $(document).on('click', '.edit', function(){
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url :"editstudent/"+id+"/edit",
      dataType:"json",
      success:function(data)
      {
        $('#s_id').val(data.result.s_id);
        $('#s_name').val(data.result.s_name);
        $('#batch').val(data.result.batch);
        $('#semester').val(data.result.semester);
        $('#email').val(data.result.email);
        $('#phone').val(data.result.phone);
        $('#study').val(data.result.study);
        $('#cgpa').val(data.result.cgpa);
         $('#credit').val(data.result.credit);
        $('#project').val(data.result.project);
        $('#title').val(data.result.title);
        $('#description').val(data.result.description);
        $('#hidden_id').val(id);
        $('.modal-title').text('Edit Record');
        $('#action_button').val('Edit');
        $('#action').val('Edit');
        $('#formModal').modal('show');
      }
    })
  });

  var user_id;

  $(document).on('click', '.delete', function(){
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
  });

  $('#ok_button').click(function(){
    $.ajax({
      url:"editstudent/destroy/"+user_id,
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

   
@endsection
