@extends('admin.layouts.master')

@section('title')
Semester Info
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Semester Information
        <small>Add Semester Information</small>
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
                    
            </div>

            <!-- /.box-header -->
            <div class="box-body">
        <!--<div align="right">-->
        <!--  <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Add Student</button>-->
        <!--</div>-->
        <br />
      <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="1%">Semester Name</th>
              <th width="1%">Semester Year</th>
              <th width="1%">Status</th>
              <th width="5%">Created Date</th>
              <th width="1%">Updated Date</th>
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
            <h4 class="modal-title">Update Semester Info Only For Submit Proposal</h4>
          </div>
          <div class="modal-body">
            <span id="form_result"></span>
            <form method="post" id="sample_form" class="form-horizontal">
              @csrf
              <div class="form-group">
                <label class="control-label col-md-4" >Semester Name: </label>
                <div class="col-md-8">
           <select type="text" id="semester_name" class="form-control " name="semester_name">
                    <option value="Spring">Spring</option>
                    <option value="Summer">Summer</option>
                    <option value="Fall">Fall</option>
            </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-4">Semester Year : </label>
                <div class="col-md-8">
                   <select type="text" id="year" class="form-control " name="year">
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
                    <option value="2028">2028</option>
                    <option value="2029">2029</option>
                    <option value="2030">2030</option>
            </select>
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

  $('#user_table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
      url: "{{ route('updatesemester.index') }}"
    },
    columns: [
      {
        data: 'semester_name',
        name: 'semester_name'
      },
      {
        data: 'year',
        name: 'year'
      },
      {
        data: 'status',
        name: 'status'
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




  $('#sample_form').on('submit', function(event){
    event.preventDefault();
    var action_url = '';

 
    if($('#action').val() == 'Edit')
    {
      action_url = "{{ route('updatesemester.update') }}";
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
      url :"updatesemester/"+id+"/edit",
      dataType:"json",
      success:function(data)
      {
        $('#semester_name').val(data.result.semester_name);
        $('#year').val(data.result.year);
        $('#end_date').val(data.result.end_date);
        $('#status').val(data.result.status);
        $('#hidden_id').val(id);
        $('.modal-title').text('Update Semester Info Only For Submit Proposal');
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
      url:"http://swe.application.daffodilvarsity.edu.bd/final_project/public/updatesemester/destroy/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
        setTimeout(function(){
          $('#confirmModal').modal('hide');
          $('#user_table').DataTable().ajax.reload();
          alert('Data Deleted');
        }, 100);
      }
    })
  });

});

</script>

   
@endsection
