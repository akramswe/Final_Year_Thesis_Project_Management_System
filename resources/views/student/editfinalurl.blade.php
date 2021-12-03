@extends('student.layouts.form')

@section('title')
Final Video Edit Form
@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>
<marquee><h3><b>Dear student, Upload Your Embed Video URL here.</b></h3></marquee>

 <form class="well form-horizontal"  action="{{action('FinalurlController@update', $id)}}" method = "post" enctype="multipart/form-data">
                              {{csrf_field()}}
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <input type="hidden" name="_method" value="PATCH" />
<fieldset>
<h2 align="center">EDIT FINAL VIDEO URL FORM</h2>
<div class="form-group">
  <label class="col-md-4 control-label" >Student ID</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
  <input name="s_id"  class="form-control" value="{{ $student->s_id }}"  type="text" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Student Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="s_name" placeholder="Student Name" class="form-control" value="{{ $student->s_name }}" type="text" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Semester</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
  <input name="batch" placeholder="Enter Batch" class="form-control" value="{{ $student->semester}}"  type="text" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Email</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="Enter Email ID" class="form-control" value="{{ $student->email }}"  type="text" readonly>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Title</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
   <input  name="title" placeholder="Project Title" class="form-control" value="{{ $student->title }}" type="text" readonly>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" >URL</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <textarea name="url" placeholder="description" class="form-control"  type="password">{{ $student->final_video}} </textarea>
    </div>
  </div>
</div>


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-primary" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspUPDATE <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>


@endsection