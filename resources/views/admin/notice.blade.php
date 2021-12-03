@extends('admin.layouts.master')

@section('title')
Notice
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notice
        <small>Update Notice</small>
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
        <!--            <select name="category_filter" id="category_filter" class="form-control">-->
        <!-- <option value="">Select Semester</option>-->
        <!-- <option value="Spring-2020">Spring-2020</option>-->
        <!-- <option value="Summer-2020">Summer-2020</option>-->
        <!-- <option value="Fall-2020">Fall-2020</option>-->
        <!--</select>-->
            </div>

            <!-- /.box-header -->
            <div class="box-body">
        <!--<div align="right">-->
        <!--  <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Add Notice</button>-->
        <!--</div>-->
        <br />
      <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="1%">Semester</th>
              <th width="1%">Contact Number</th>
              <th width="1%">Google Class Code</th>
              <th width="1%">Seminar Date</th>
              <th width="1%">Meet link</th>
              <th width="1%">Description</th>
              <th width="1%">Created Date</th>
              <th width="1%">Updated Date</th>
              <th width="1%">Action</th>
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
            <h4 class="modal-title">Add New Notice</h4>
          </div>
          <div class="modal-body">
            <span id="form_result"></span>
            <form method="post" id="sample_form" class="form-horizontal">
              @csrf
          <div class="form-group">
                <label class="control-label col-md-4">Semester: </label>
                <div class="col-md-8">
                 
           <select type="text" class="form-control " name="semester" id="semester">
            <option value="Spring-2020">Spring-2020</option>
            <option value="Summer-2020">Summer-2020</option>
            <option value="Fall-2020">Fall-2020</option>
            <option value="Spring-2021">Spring-2021</option>
            <option value="Summer-2021">Summer-2021</option>
            <option value="Fall-2021">Fall-2021</option>
            <option value="Spring-2022">Spring-2022</option>
            <option value="Summer-2022">Summer-2022</option>
            <option value="Fall-2022">Fall-2022</option>
          </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4">Contact Number : </label>
                <div class="col-md-8">
                  <input type="text" name="contact" id="contact" class="form-control" placeholder="For further queries contact number" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4">Google Class Code : </label>
                <div class="col-md-8">
                  <input type="text" name="google_code" id="google_code" class="form-control" placeholder="Enter Google Class Code"/>
                </div>
              </div>

                <div class="form-group">
                <label class="control-label col-md-4">Seminar Date : </label>
                <div class="col-md-8">
                  <input type="date" name="seminar_date" id="seminar_date" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4">Meet Link : </label>
                <div class="col-md-8">
                  <input type="text" name="meet_link" id="meet_link" class="form-control" placeholder="Enter here meeting link" />
                </div>
              </div>
              <div class="form-group">
             <label class="control-label col-md-4">Description :  </label>
             <textarea name="description"  id="description"  rows="8" cols="50" placeholder="Enter here Others Notice."></textarea>
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
      url: "{{ route('semesternotice.index') }}",
      data: {category:category}
    },
    columns: [
      {
        data: 'semester',
        name: 'semester'
      },
      {
        data: 'contact',
        name: 'contact'
      },
      {
        data: 'google_code',
        name: 'google_code'
      },
      {
        data: 'seminar_date',
        name: 'seminar_date'
      },
      {
        data: 'meet_link',
        name: 'meet_link'
      },
      {
        data: 'description',
        name: 'description'
      },
      {
        data: 'created_at',
        name: 'created_at'
      },
     {
        data: 'updated_at',
        name: 'updated_at'
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
      action_url = "{{ route('semesternotice.store') }}";
    }

    if($('#action').val() == 'Edit')
    {
      action_url = "{{ route('semesternotice.update') }}";
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

  $(document).on('click', '.edit', function(){
    var id = $(this).attr('id');
    $('#form_result').html('');
    $.ajax({
      url :"semesternotice/"+id+"/edit",
      dataType:"json",
      success:function(data)
      {
        $('#meet_link').val(data.result.meet_link);
        $('#seminar_date').val(data.result.seminar_date);
        $('#google_code').val(data.result.google_code);
        $('#contact').val(data.result.contact);
        $('#semester').val(data.result.semester);
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
      url:"semesternotice/destroy/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
        setTimeout(function(){
          $('#confirmModal').modal('hide');
          $('#user_table').DataTable().ajax.reload();
          alert('Data Deleted');
        }, 200);
      }
    })
  });

});

</script>

   
@endsection
