@extends('admin.layouts.master')

@section('title')
Details Info
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
              <h3 class="box-title">Student Information</h3>
                    <h4 class="h4 text-info">Select Semester</h4>
                    <form method="get">
                      <select name="search" class="form-control show-tick">
                       <option>--Select semester--</option>
                        <option value="Spring-2020">Spring-2020</option>
                        <option value="Summer-2020">Summer-2020</option>
                        <option value="Fall-2020">Fall-2020</option>
                         <option value="Spring-2021">Spring-2021</option>
                        <option value="Summer-2021">Summer-2021</option>
                        <option value="Fall-2021">Fall-2021</option>
                       </select> 
                    
                      <button class="btn btn-info mt-2" id="searchCat">Seach</button>
                    </form>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="user_table" class="table table-bordered table-striped w-auto">
                <thead>
                                <tr>
                                  <th>Student ID</th>
                                  <th>Student Name</th>
                                  <th>Batch</th>
                                  <th>Semester</th> 
                                  <th>Email</th> 
                                  <th>Phone</th>
                                  <th>Title</th>
                                  <th>Supervisor Initial</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($students as $freelancer)
                              @if($freelancer->sv_name ==  Auth::user()->name)
                                <tr>
                                  <td> {{ $freelancer->s_id}} </td>
                                  <td> {{ $freelancer->s_name}} </td>
                                  <td> {{ $freelancer->batch}} </td>
                                  <td>{{ $freelancer->semester }}</td>
                                  <td> {{ $freelancer->email}} </td>
                                  <td> {{ $freelancer->phone}} </td>
                                  <td> {{ $freelancer->title}} </td>
                                  @if($freelancer->sv_name == NULL)
                                   <td> Not Assign Supervisor </td>
                                  @else
                                  <td> {{ $freelancer->sv_init}} </td>
                                  @endif
                                  <td><a href="{{action('AdminController@show', $freelancer['id'])}}" class="btn btn-info btn-xs">View</a>
                                   <a href="{{action('MessageController@edit', $freelancer['id'])}}" class="btn btn-primary btn-xs">Send Message</a></td>
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
                     
        
@endsection
