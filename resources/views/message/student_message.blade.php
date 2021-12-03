@extends('message.layouts.messagalayout')

@section('title')
Message Info
@endsection

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
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
              <h3 class="box-title">Message List</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_table" class="table table-bordered table-striped w-auto">
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
                                @foreach($students as $freelancer)
                                 @if($freelancer->email == Auth::user()->email)
                                <tr>
                                  <td> {{ $freelancer->s_id}} </td>
                                  <td> {{ $freelancer->s_name}} </td>
                                  <td> {{ $freelancer->email}} </td>
                                  <td> {{ $freelancer->subject}} </td>
                                  <td>{{ $freelancer->due_date}}</td>
                                   @if($freelancer->status == 'pending')
                                  <td><span class="label label-danger">Pending</span></td>
                                  @elseif($freelancer->status == 'progress')
                                   <td><span class="label label-primary">Progress</span></td>
                                   @elseif($freelancer->status == 'done')
                                   <td><span class="label label-success">Complete</span></td>
                                   @endif
                                  <td><a href="{{action('MessageController@show', $freelancer['id'])}}"  data-toggle="modal" data-target="#modal-info" class="btn btn-info btn-xs"> <i class="fa fa-eye"></i>View Message</a></td>
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
