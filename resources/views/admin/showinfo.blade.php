@extends('admin.layouts.form1')

@section('title')
View Student Info
@endsection

@section('content')
    <section class="content">
    <div class="row">
   <div class="col-md-10">
    <div class="card">
    <div class="card-body">
<h1 align="center">View Student Details Info </h1>
@if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
    <form class="" action="{{action('AdminController@update', $id)}}" method="POST">
{{csrf_field()}}
 <input type="hidden" name="_method" value="PATCH" />
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">


     <div class="form-row">
      <div class="form-group col-6">
         <label for="exampleInputEmail1">Student ID</label>
              <input name="s_id" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ $student->s_id}}" readonly>
       </div>

       <div class="form-group col-6">
          <label for="exampleInputEmail1">Student Name</label>
          <input name="s_name" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ $student->s_name}}" readonly>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-6">
           <label for="exampleInputEmail1">Batch</label>
           <input name="batch" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp"value="{{ $student->batch}}" readonly>
         </div>

         <div class="form-group col-6">
          <label for="exampleFormControlSelect1">Semester</label>
         <input name="semester" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp"value="{{ $student->semester}}" readonly>
        </div>
        </div>

        <div class="form-row">

          <div class="form-group col-6">
             <label for="exampleInputEmail1">Email</label>
             <input name="email" type="email" class="form-control" id="exampleInputEmail1" name="Passingyear" aria-describedby="emailHelp" value="{{ $student->email}}" readonly>
           </div>

           <div class="form-group col-6">
            <label for="exampleInputEmail1">Phone Number</label>
           <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $student->phone}}" readonly>
          </div>
        </div>

      <div class="form-row">
        <div class="form-group col-6">
            <label for="exampleFormControlSelect1">Project/Thesis</label>
            <input name="project" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp"value="{{ $student->project}}" readonly>
          </div>

        <div class="form-group col-6">
           <label for="exampleInputEmail1">Title</label>
           <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ $student->title}}" readonly>
         </div>

           
        </div>

          <div class="form-group">
             <label for="exampleFormControlTextarea1">Project/Thesis Description</label> <br>

             <object width="400" height="400" align="justify">
{{ $student->description}}
</object>
           </div>
           
<div class="form-row">
        <div class="form-group col-6">
         
            <label for="exampleFormControlSelect1">Supervisor Name</label>
              @if($student->sv_name==NULL)
           <input name="sv_init" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="The supervisor not yet assigned" readonly>
           @else
           <input name="sv_init" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ $student->sv_name}}">
           @endif
          </div>

        <div class="form-group col-6">
           <label for="exampleInputEmail1">Supervisor Initial</label>
            @if($student->sv_init==NULL)
           <input name="sv_init" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"placeholder="The supervisor not yet assigned" readonly>
           @else
           <input name="sv_init" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ $student->sv_init}}">
           @endif
         </div>

           
        </div>
    </form>
  </div>
  </div>
  </div>
  </div>
@endsection