@extends('admin.layouts.master')

@section('title')
Internal
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
         <option value="Spring-2020">Spring-2020</option>
         <option value="Summer-2020">Summer-2020</option>
         <option value="Fall-2020">Fall-2020</option>
        </select>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
        <br />
      <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="1%">Student ID</th>
              <th width="1%">Student Name</th>
              <th width="1%">Batch</th>
              <th width="1%">Semester</th>
              <th width="1%">Project/Thesis</th>
              <th width="5%">Title</th>
              <th width="1%">Supervisor Initial</th>
              <th width="5%">Supervisor Name</th>
              <th width="5%">Action</th>
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
            <form method="post" id="sample_form" class="form-horizontal">
              @csrf
              <div class="form-group">
                <label class="control-label col-md-4" >Student ID : </label>
                <div class="col-md-8">
                  <input type="text" name="s_id" id="s_id" readonly class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4">Name : </label>
                <div class="col-md-8">
                  <input type="text" name="s_name" readonly id="s_name" class="form-control" />
                </div>
              </div>
               
                <div class="form-group">
                <label class="control-label col-md-4">Email : </label>
                <div class="col-md-8">
                  <input type="text" name="email" readonly id="email" class="form-control" />
                </div>
              </div>
               <div class="form-group">
                <label class="control-label col-md-4">Semester : </label>
                <div class="col-md-8">
                  <input type="text" name="semester" readonly id="semester" class="form-control" />
                </div>
              </div>
               <div class="form-group">
                <label class="control-label col-md-4">Supervisor Initial : </label>
                <div class="col-md-8">
                  <input type="text" name="intrnl_initial" readonly id="sv_init" class="form-control" />
                </div>
              </div>
             <input type="hidden" name="intrnl_name" id="sv_name" class="form-control" />
             
              

            <div class="form-group">
                <label class="control-label col-md-4">Enter Here Mark: </label>
                <div class="col-md-8">
                  <input type="text" name="intrnl_mark"  id="intrnl_mark" class="form-control" />
                </div>
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
      url: "{{ route('intmarks.index') }}",
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
        data: 'sv_name',
        name: 'sv_name'
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
      action_url = "{{ route('intmarks.store') }}";
    }
    
    if($('#action').val() == 'edit')
    {
      action_url = "{{ route('intmarks.store') }}";
    }

    if($('#action').val() == 'update')
    {
      action_url = "{{ route('intmarks.update') }}";
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
          $('#user_table').DataTable().ajax.reload();
        }
        $('#form_result').html(html);
      }
    });
  });
  
  $(document).on('click', '.update', function(){
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url :"http://swe.application.daffodilvarsity.edu.bd/final_project/public/review/"+id+"/edit",
      dataType:"json",
      success:function(data)
      {
        $('#s_id').val(data.result.s_id);
        $('#s_name').val(data.result.s_name);
        $('#batch').val(data.result.batch);
        $('#semester').val(data.result.semester);
        $('#email').val(data.result.email);
        $('#sv_name').val(data.result.sv_name);
        $('#sv_init').val(data.result.sv_init);
        $('#cgpa').val(data.result.cgpa);
        $('#credit').val(data.result.credit);
        $('#project').val(data.result.project);
        $('#title').val(data.result.title);
        $('#description').val(data.result.description);
        $('#hidden_id').val(id);
        $('.modal-title').text('Feedback Record');
        $('#action_button').val('Edit');
        $('#action').val('Edit');
        $('#formModal').modal('show');
      }
    })
  });

  $(document).on('click', '.edit', function(){
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url :"http://swe.application.daffodilvarsity.edu.bd/final_project/public/review/"+id+"/edit",
      dataType:"json",
      success:function(data)
      {
        $('#s_id').val(data.result.s_id);
        $('#s_name').val(data.result.s_name);
        $('#batch').val(data.result.batch);
        $('#semester').val(data.result.semester);
        $('#email').val(data.result.email);
        $('#sv_name').val(data.result.sv_name);
        $('#sv_init').val(data.result.sv_init);
        $('#cgpa').val(data.result.cgpa);
        $('#credit').val(data.result.credit);
        $('#project').val(data.result.project);
        $('#title').val(data.result.title);
        $('#description').val(data.result.description);
        $('#hidden_id').val(id);
        $('.modal-title').text('Feedback Record');
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
      url:"http://swe.application.daffodilvarsity.edu.bd/final_project/public/editstudent/destroy/"+user_id,
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
