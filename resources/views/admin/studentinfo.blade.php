@extends('admin.layouts.view')

@section('title')
View Student Info
@endsection

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Student Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Advanced Elements</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Select2</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">

    <form class="" action="{{action('AdminController@update', $id)}}" method="POST">
{{csrf_field()}}
 <input type="hidden" name="_method" value="PATCH" />
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">


            <div class="col-md-6">
              <div class="form-group">
         <label for="exampleInputEmail1">Student ID</label>
              <input name="s_id" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ $student->s_id}}" readonly>
       </div>

       <div class="form-group col-6">
          <label for="exampleInputEmail1">Student Name</label>
          <input name="s_name" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ $student->s_name}}" readonly>
        </div>
      </div>

     <div class="col-md-6">
              <div class="form-group">
           <label for="exampleInputEmail1">Batch</label>
           <input name="batch" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp"value="{{ $student->batch}}" readonly>
         </div>

         <div class="form-group col-6">
          <label for="exampleFormControlSelect1">Semester</label>
         <input name="semester" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp"value="{{ $student->semester}}" readonly>
        </div>
        </div>

      <div class="col-md-6">
              <div class="form-group">
             <label for="exampleInputEmail1">Email</label>
             <input name="email" type="email" class="form-control" id="exampleInputEmail1" name="Passingyear" aria-describedby="emailHelp" value="{{ $student->email}}" readonly>
           </div>

           <div class="form-group col-6">
            <label for="exampleInputEmail1">Phone Number</label>
           <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $student->phone}}" readonly>
          </div>
        </div>
<div class="col-md-6">
              <div class="form-group">
            <label for="exampleFormControlSelect1">Project/Thesis</label>
            <input name="project" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp"value="{{ $student->project}}" readonly>
          </div>

        <div class="form-group col-6">
           <label for="exampleInputEmail1">Title</label>
           <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ $student->title}}" readonly>
         </div>

           
        </div>

          <div class="form-group">
             <label for="exampleFormControlTextarea1">Project/Thesis Description</label>
             <textarea name="description" class="form-control" id="exampleFormControlTextarea1"  rows="3" cols="50" readonly>{{ $student->description}}</textarea>
           </div>
           </form>
         </div>
       </div>
     </div>

    <h2 align="center">Display here all message</h2>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $student->s_name}}</h3> <small>All task</small>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_table" class="table table-bordered table-striped">
                                    <thead>
                                <tr>
                                  <th>Student ID</th>
                                  <th>Student Name</th>
                                  <th>Email</th> 
                                  <th>Subject</th>
                                  <th>Due Date</th>
                                  <th>Status</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($message as $freelancer)
                                 @if($freelancer->sup_id ==  Auth::user()->id &&$freelancer->email == $student->email)
                                <tr>
                                  <td> {{ $freelancer->s_id}} </td>
                                  <td> {{ $freelancer->s_name}} </td>
                                  <td> {{ $freelancer->email}} </td>
                                  <td> {{ $freelancer->subject}} </td>
                                  <td> {{ $freelancer->due_date}} </td>
                                  @if($freelancer->status == 'pending')
                                  <td><span class="label label-danger">Pending</span></td>
                                  @elseif($freelancer->status == 'progress')
                                   <td><span class="label label-primary">Progress</span></td>
                                   @elseif($freelancer->status == 'done')
                                   <td><span class="label label-success">Complete</span></td>
                                   @endif
                                  <td><a href="{{action('MessageController@show', $freelancer['id'])}}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-info">View Message</a> </td>
                                </tr>
                                   @endif
                                @endforeach
                              </tbody>
                             <span id="val"></span>
                            </table>
                           </div>
                           </div>

           
        </div>


    </form>
  </div>
  </div>
  </div>
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

        
@endsection