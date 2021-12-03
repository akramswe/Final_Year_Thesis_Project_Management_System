@extends('admin.layouts.master')

@section('title')
All Student Info View
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
All PC Student Information
        <small>PC Student Info</small>
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
                    <!--<h4 class="h4 text-info">Select Semester</h4>-->
     <select name="category_filter" id="category_filter" class="form-control">
         <option value="">Select Semester</option>
          @foreach($semester as $smstr)
            <option value="{{$smstr->semester_name}}-{{$smstr->year}}">{{$smstr->semester_name}}-{{$smstr->year}}</option>
            @endforeach
        </select>
        <br>
                    
            </div>


        <div class="modal modal-info fade" id="modal-info">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Info Modal</h4>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

            <!-- /.box-header -->
            <div class="box-body">
        <br />
      <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="1%">Student ID</th>
              <th width="1%">Student Name</th>
              <th width="0.1%">Batch</th>
              <th width="0.1%">Campus</th>
              <th width="1%">Semester</th>
              <th width="1%">Project/Thesis</th>
              <th width="3%">Title</th>
              <th width="0.1%">SV Initial</th>
              <th width="1%">Internal Initial</th>
              <th width="1%">MID Video</th>
              <th width="1%">Final Video</th>
              <th width="1%">Doc URL</th>
              <th width="2%">Assign Internal</th>
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
                  <input type="text" name="student_id" id="student_id" class="form-control" readonly />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4">Last Name : </label>
                <div class="col-md-8">
                  <input type="text" name="first_name" id="first_name" class="form-control" readonly />
                </div>
              </div>
               <div class="form-group">
                <label class="control-label col-md-4">Supervisor Initial : </label>
                <div class="col-md-8">
                  <input type="text" name="sv_init" id="sv_init1" class="form-control" readonly />
                </div>
              </div>

              <div class="form-group">
          <div class="box box-default collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">View Details</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <textarea type="text" name="description" id="description" class="form-control" rows="3" cols="50" readonly></textarea>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
             
               <div class="form-group">
         
            <label for="exampleFormControlSelect1" class="control-label col-md-4">Supervisor Name: </label>
             
          <select class="form-control" name="Internal_Reviewer_name" id="sv_name" style="width:350px">
            <option value="">Select Supervisor</option>
            @foreach ($user as $usr) 
             @if($usr->role=='faculty' || $usr->role=='admin' )
                <option value="{{$usr->name}}">
                 {{$usr->name}}
                </option>
                  @endif
            @endforeach
        </select>
           
          </div>

        <div class="form-group">
           <label for="exampleInputEmail1" class="control-label col-md-4">Supervisor Initial: </label>
            <select name="Internal_Reviewer_1" id="state" class="form-control" style="width:350px">
                </select>
         </div>
              <!-- <div class="form-group">
                <label class="control-label col-md-4">Supervisor Initial : </label>
                <div class="col-md-8">
                  <input type="text" name="sv_init" id="sv_init" class="form-control" />
                </div>
              </div> -->
                  <br />
                  <div class="form-group" align="center">
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="submit" name="action_button" id="action_button" class="btn btn-success" value="Add" />

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
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
      url: "{{ route('pcstudentview.index') }}",
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
        data: 'campus',
        name: 'campus'
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
        name: 'sv_init',
        "render": function (data, type, full, meta, row) {
    if (!data) {
            return '<i class="far fa-dot-circle" style="color:red" /*aria-hidden="true"*/>Supervisor Not Assign</i>';
        }
        else
        {
            return '<i class="far fa-dot-circle" style="color:green" /*aria-hidden="true"*/>'+data+'</i>' ;
            
        } 
             }   
      },
           {
        data: 'Internal_Reviewer_1',
        name: 'Internal_Reviewer_1',
        "render": function (data, type, full, meta, row) {
    if (!data) {
            return '<i class="far fa-dot-circle" style="color:red" /*aria-hidden="true"*/>Internal Reviewer Not Assign</i>';
        }
        else
        {
            //  return " \"" .replace('"','') + data + "\"  ".replace('"','') ;
            
           return '<i class="far fa-dot-circle" style="color:green" /*aria-hidden="true"*/>'+data+'</i>' ;
            
        } 
             }   
      },
      {
        data: 'mid_video',
        name: 'mid_video',

         "render": function (data, type, full, meta, row) {
    if (!data) {
            return '<i class="far fa-dot-circle" style="color:red" /*aria-hidden="true"*/>MID Video Submission Not Done</i>';
        }
        else
        {
             return "<iframe src=\"" + data + "\" height=\"150\" width=\"190\" alt='No Image'/>";} 
             }        
    },
    {
        data: 'final_video',
        name: 'final_video',

         "render": function (data, type, full, meta, row) {
    if (!data) {
            return '<i class="far fa-dot-circle" style="color:red" /*aria-hidden="true"*/>Final Video Submission Not Done</i>';
        }
        else
        {
             return "<iframe src=\"" + data + "\" height=\"150\" width=\"190\" alt='No Image'/>";
           } 
             }        
    },
    {
        data: 'f_url',
        name: 'f_url',

         "render": function (data, type, full, meta, row) {
    if (!data) {
            return '<i class="far fa-dot-circle" style="color:red" /*aria-hidden="true"*/>Document Submission Not Done</i>';
        }
        else
        {
        return "<a href=\"" + data + "\" target=\"popup\"  onclick=\"window.open('','popup','width=600,height=600')\"> View Doc</a>"
           } 
             }        
    },
      {
        data: 'action',
        name: 'action',
        orderable: false
      }
    ]
  });
 }
  $('#category_filter, #campus_filter').change(function(){
  var category_id = $('#category_filter').val();
   var campus_id = $('#campus_filter').val();
  

  $('#user_table').DataTable().destroy();

  fetch_data(category_id,campus_id);
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
      action_url = "{{ route('allproject.store') }}";
    }

    if($('#action').val() == 'Edit')
    {
      action_url = "{{ route('allproject.update') }}";
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
           alert('Internal Reviewer Added successfully.');
        }
        $('#form_result').html(html);
      }
    });
  });

  $(document).on('click', '.edit', function(){
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url :"allproject/"+id+"/edit",
      dataType:"json",
      success:function(data)
      {
        $('#student_id').val(data.result.s_id);
        $('#first_name').val(data.result.s_name);
        $('#description').val(data.result.description);
        $('#sv_init1').val(data.result.sv_init);
        $('#hidden_id').val(id);
        $('.modal-title').text('Edit Record');
        $('#action_button').val('Assign');
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
      url:"allproject/destroy/"+user_id,
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
