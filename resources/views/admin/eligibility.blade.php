@extends('admin.layouts.master')

@section('title')
Eligibility Notice
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Eligibility Notice
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
            
            <!-- /.box-header -->
            <div class="box-body">
        <!--<div align="right">-->
        <!--  <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Add Eligibility</button>-->
        <!--</div>-->
        <br />
      <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Thesis</th>
              <th>Project</th>
              <th>Intrnship</th>
              <th>Created Date</th>
              <th>Updated Date</th>
              <th>Action</th>
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
                <label class="control-label col-md-4">Thesis Eligibility : </label>
                <div class="col-md-8">
                   <textarea name="thesis" id="thesis" class="form-control" rows="8" cols="50" placeholder="Enter here Thesis Eligibility"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4">Project Eligibility : </label>
                <div class="col-md-8">
                  <textarea name="project" id="project" class="form-control" rows="8" cols="50" placeholder="Enter here Project Eligibility"></textarea>
                </div>
              </div>

                <div class="form-group">
                <label class="control-label col-md-4">Internship Eligibility : </label>
                <div class="col-md-8">
                  <textarea name="intrnship" id="intrnship" class="form-control" rows="8" cols="50" placeholder="Enter here Internship Eligibility"></textarea>
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

<script>
$(document).ready(function(){

fetch_data();

 function fetch_data(category = '')
 {

  $('#user_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{ route('eligibility.index') }}",
      data: {category:category}
    },
    columns: [
      {
        data: 'thesis',
        name: 'thesis'
      },
      {
        data: 'project',
        name: 'project'
      },
      {
        data: 'intrnship',
        name: 'intrnship'
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
      action_url = "{{ route('eligibility.store') }}";
    }

    if($('#action').val() == 'Edit')
    {
      action_url = "{{ route('eligibility.update') }}";
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
      url :"eligibility/"+id+"/edit",
      dataType:"json",
      success:function(data)
      {
        $('#intrnship').val(data.result.intrnship);
        $('#thesis').val(data.result.thesis);
        $('#project').val(data.result.project);
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
      url:"eligibility/destroy/"+user_id,
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
