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
              <h3 class="box-title">Link Status</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_table" class="table table-bordered table-striped w-auto">
                <thead>
                                <tr>
                                  <th>Semester Name</th>
                                  <th>Semester Year</th>
                                  <th>Link Status</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($semester as $smstr)
                                <tr>
                                  <td> {{ $smstr->semester_name}} </td>
                                  <td> {{ $smstr->year}} </td>
                                   @if($smstr->status == 'stop')
                                  <td><span class="label label-danger">Stop</span></td>
                                   @elseif($smstr->status == 'open')
                                   <td><span class="label label-success">Open</span></td>
                                   @endif
                                  <td><button class="btn btn-success btn-xs openLink" data-id="{{$smstr->id}}">ON</button> <button class="btn btn-danger btn-xs Paid offLink" data-id="{{$smstr->id}}">OFF</button></td>
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

    
$(document).ready(function(){

   //Open Link
    $(document).on('click', '.openLink', function(){ 
      var id = $(this).data('id');
      $('.loading').show();
        $.ajax({ 
          type: 'post',
          url: 'http://swe.application.daffodilvarsity.edu.bd/final_project/public/panel/link/open',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            id: id
          },success: function(data) {  
              location.reload();
              toastr.success(' ', 'Pending', {timeOut: 100, positionClass: 'toast-top-center'});
              $('.loading').hide();
          }
      });
    }); 

    //Off Link
    $(document).on('click', '.offLink', function(){ 
      var id = $(this).data('id');
      $('.loading').show();
        $.ajax({ 
          type: 'post',
          url: 'http://swe.application.daffodilvarsity.edu.bd/final_project/public/panel/link/off',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            id: id
          },success: function(data) {  
              location.reload();
              toastr.success(' ', 'Complete', {timeOut: 100, positionClass: 'toast-top-center'});
              $('.loading').hide();
          }
      });
    }); 
    

     

});//document.ready

    </script>    
        
@endsection
