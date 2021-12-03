@extends('admin.layouts.form')

@section('title')
Assign Supervisior
@endsection

@section('content')
<style>
    .group {
    border-style: dotted;
    border-width: 3px;
    border-left-width: 10px;
    border-right-width: 10px;
    border-color: black;
}
</style>
    <section class="content">
    <div class="row">
   <div class="col-md-10">
    <div class="card">
    <div class="card-body">
<h1 align="center">View Student Details Info And assign Supervisor
 </h1>
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



          <div class="group" >
         <div class="form-group col-6">
            <label for="exampleFormControlSelect1">Project/Thesis</label>
            <input name="project" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp"value="{{ $student->project}}" readonly>
          </div>
           <div class="form-group col-6">
           <label for="exampleInputEmail1">Title</label>
           <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ $student->title}}" readonly>
         </div>

             <label for="exampleFormControlTextarea1">Project/Thesis Description</label>
             <textarea name="description" class="form-control" id="exampleFormControlTextarea1"  rows="3" cols="50" readonly>{{ $student->description}}</textarea>

        <div class="form-row">
        <div class="form-group col-6">
         
            <label for="exampleFormControlSelect1">Supervisor Name</label>
             
          <select class="form-control" name="sv_name" id="sv_name" style="width:350px">
            <option value="">Select Supervisor</option>
            @foreach ($user as $usr) 
             @if($usr->role=='faculty' || $usr->role=='admin' )
                <option value="{{$usr->name}}">
                 {{$usr->name}}
                </option>
                  @endif
            @endforeach
        </select>
           
          </div>

        <div class="form-group col-6">
           <label for="exampleInputEmail1">Supervisor Initial</label>
            <select name="sv_init" id="state" class="form-control" style="width:350px">
                </select>
         </div>
         </div>
         <div class="form-row">
<div class="form-group col-6">
         
            <label for="exampleFormControlSelect1">Internal Reviewer_1</label>
             
          <select class="form-control" name="Internal_Reviewer_1" id="seeAnotherField" style="width:350px">
            <option value="no">Select Internal Reviewer_1</option>
            @foreach ($user as $usr) 
             @if($usr->role=='faculty' || $usr->role=='admin' )
                <option value="{{$usr->name}}">
                 {{$usr->name}}
                </option>
                  @endif
            @endforeach
        </select>
           
          </div>

        <div class="form-group col-6" id="otherFieldDiv">
           <label for="exampleInputEmail1">Internal Reviewer_2</label>
            <select name="Internal_Reviewer_2" id="otherField" class="form-control" style="width:350px">
                 <option value="">Select Internal Reviewer_2</option>
            @foreach ($user as $usr) 
             @if($usr->role=='faculty' || $usr->role=='admin' )
                <option value="{{$usr->name}}">
                 {{$usr->name}}
                </option>
                  @endif
            @endforeach
                </select>
         </div>
           
        </div>
  </div>

           <div class="form-group col-6" >
             <button type="submit" class="btn btn-success">Submit Supervisor</button>
           </div>


    </form>

 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $("#seeAnotherField").change(function() {
  if ($(this).val() == "no") {
  	$('#otherFieldDiv').hide();
    $('#otherField').removeAttr('required');
    $('#otherField').removeAttr('data-error');
  
  } else {
      $('#otherFieldDiv').show();
    $('#otherField').attr('required', '');
    $('#otherField').attr('data-error', 'This field is required.');
  }
});
$("#seeAnotherField").trigger("change");
</script>
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
@endsection