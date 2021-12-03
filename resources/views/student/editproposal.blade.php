@extends('student.layouts.form')

@section('title')
Proposal Edit Form
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
<marquee><h3><b>Dear student, you can update your proposal at once. But When assigned to the supervisor then you cannot update your proposal.</b></h3></marquee>

 <form class="well form-horizontal"  action="{{action('ProjectController@update', $id)}}" method = "post" enctype="multipart/form-data">
                              {{csrf_field()}}
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <input type="hidden" name="_method" value="PATCH" />
<fieldset>

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
  <label class="col-md-4 control-label" >Batch</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
  <input name="batch" placeholder="Enter Batch" class="form-control" value="{{ $student->batch }}"  type="text" readonly>
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
  <label class="col-md-4 control-label">Phone Number</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input  name="phone" placeholder="Enter Phone Number" class="form-control" value="{{ $student->phone }}" type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Study Area</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
  <input name="study" placeholder="Enter Study Area" class="form-control" value="{{ $student->study }}"  type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">CGPA</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="cgpa" placeholder="Enter CGPA" class="form-control" value="{{ $student->cgpa }}" type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Credit Completed</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
  <input name="credit" placeholder="Enter Completed Credit" class="form-control" value="{{ $student->credit }}"  type="text">
    </div>
  </div>
</div>

<div class="form-group"> 
  <label class="col-md-4 control-label">Choose Your Course</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="course" class="form-control selectpicker">
      @foreach($sproject as $usr)
      @if($usr->s_id == $student->s_id)
      @if($usr->course == $student->course)
      <option selected value="{{ $usr->course }}">{{ $usr->course }}</option>
      @endif
       <option value="Thesis/Project-SWE431">Thesis/Project-SWE431</option>
              <option value="Final Year Project/ Thesis/ Internship-SE431">Final Year Project/ Thesis/ Internship-SE431</option>
              <option value="Data Science Major Capstone Project (DS Major)-DS431">Data Science Major Capstone Project (DS Major)-DS431</option>
              <option value="Robotics & Embedded Systems Major Capstone Project (RE Major)-RE431">Robotics & Embedded Systems Major Capstone Project (RE Major)-RE431</option>
               <option value="Cyber Security Major Capstone Project (CS Major)-CS439">Cyber Security Major Capstone Project (CS Major)-CS439</option>
      @endif
       @endforeach
    </select>
  </div>
</div>
</div>

<div class="form-group"> 
  <label class="col-md-4 control-label">Project/Thesis/Internship</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="project" class="form-control selectpicker">
      @foreach($sproject as $usr)
      @if($usr->s_id == $student->s_id)
      @if($usr->project == $student->project)
      <option selected value="{{ $usr->project }}">{{ $usr->project }}</option>
      @endif
      <option value="Project">Project</option>
      <option value="Thesis">Thesis</option>
      <option value="Internship">Internship</option>
      @endif
       @endforeach
    </select>
  </div>
</div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Title</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="title" placeholder="Project Title" class="form-control" value="{{ $student->title }}" type="text">
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" >Description</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <textarea name="description" placeholder="description" class="form-control"  type="password">{{ $student->description}} </textarea>
    </div>
  </div>
</div>
 <input name="edit"  class="form-control" value="2"  type="hidden" >

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