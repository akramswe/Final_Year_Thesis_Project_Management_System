@extends('admin.layouts.master')

@section('title')
All Document/Video URL
@endsection

@section('content')
      @php
                                     $count=0;
                                    @endphp
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
      
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
   <div class="box-header">
              <h3 class="box-title"></h3> <button data-toggle="modal" data-target="#modal-default"  type="button" class="btn btn-info btn-sm"><i class="fa fa-exclamation-circle"></i> Upload Video Instruction</button>
              <button data-toggle="modal" data-target="#modal-default1"  type="button" class="btn btn-info btn-sm"><i class="fa fa-exclamation-circle"></i> Video Tutorial (Upload Video Instruction)</button>
                    <marquee><h3 class="text-left text-danger"><b>Please read Video Upload Instruction first</b></h3></marquee>
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
            </div>
            
            
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Upload Video Instruction</h4>
              </div>
              <div class="modal-body" align="justify">
                  <h3 class="text-danger text-center" >Strictly Follow this instruction otherwise your video will not be accepted.</h3>
                  <br>
                  <h4 ><span class="text-danger" align="justify">1. At First  upload the video in YouTube and create embed link. </span> </h4>
                <h4 ><span class="text-danger">2. Right-click on the youtube video and copy the embed code. </span> </h4>
                <h4 ><span class="text-danger">3. A code will be copied here. You will paste this code in your Notepad and copy the URL that you will find here and submit it to our system.</h4>
               <h4><span class="text-danger">* Example: https://www.youtube.com/embed/08dshwwZBo8</span></h4>
               <h4><span class="text-danger">* Format your URL: www.youtube.com/embed/(video_ID) </span></h4>
               <h4><span class="text-danger">*** Must Be Chosen Video Category otherwise, your video submission is not accepted. *** </span></h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
        
             <div class="modal fade" id="modal-default1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-danger text-center">Strictly Follow this instruction otherwise your video will not be accepted.</h4>
              </div>
              <div class="modal-body" align="justify">
                 
             <iframe width="570" height="300"src="https://www.youtube.com/embed/v_7uDpKaP78 " allowfullscreen> </iframe>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

  @if(!$email)
 <div class="box-body">
       <h3 class="text-center text-danger"><b>Dear Student, Not Found Your Submission data. Please Upload Your Submission URL then you can see Details Info.</b></h3>
  </div> 

@else

    @if($email->mid_video==Null)
     <div align="right">
         <button  type="button" name="create_record" id="create_record" class="btn btn-success btn-sm" >Upload Mid Video</button>
            </div>
   @elseif($email->f_url==Null && $email->Internal_Reviewer_1==Null)
 
    <div align="right">
         <button  type="button" name="create_record" id="create_record" class="btn btn-success btn-sm" >Upload Document Drive URL</button>
   </div>
   @elseif($email->final_video==Null)
    <div align="right">
         <button  type="button" name="create_record" id="create_record" class="btn btn-success btn-sm" >Upload Final Video</button>
            </div>
            
    @else
       <div align="right">
           <button disabled type="button" class="btn btn-danger btn-sm">Already Uploaded All URL</button>
        </div>
 
          @endif  
  
    
      <!--<h1>{{ $count }}</h1>-->
      <!--   <div align="right">-->
      <!--   <button  type="button" name="create_record" id="create_record" class="btn btn-success btn-sm" >Upload Video</button>-->
      <!--      </div>-->


            <!-- /.box-header -->
            <div class="box-body">
        <br />
      <div class="table-responsive">
        <table id="user_table" class="table table-bordered table-striped">
                                    <thead>
                                <tr>
                                  <th>Mid Video</th>
                                  <th>Final Video</th>
                                  <th>File URL</th>
                                  <th>Student Name</th>
                                  <th>Student ID</th> 
                                  <th>Project Title</th>
                                  <th>Edit MID URL</th>
                                  <th>Edit Final URL</th>
                                  <th>Edit Doc URL</th> 
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($videourl as $urlinfo)
                                 @if($urlinfo->email ==  Auth::user()->email)
                                <tr>
                              @if($urlinfo->mid_video ==  Null)
                                 <td> <span class="label label-danger"> MID Video Submission Not Done</span> </td>
                                 @else
                                 <td><iframe width="300" height="200"
                                    src="{{ $urlinfo->mid_video}} " allowfullscreen>
                                    </iframe></td>
                                @endif
                              @if($urlinfo->final_video ==  Null)
                                 <td> <span class="label label-danger"> Final Video Submission Not Done</span> </td>
                                 @else
                                 <td><iframe width="300" height="200"
                                    src="{{ $urlinfo->final_video}} " allowfullscreen>
                                    </iframe></td>
                                @endif
                                  @if($urlinfo->f_url ==  Null)
                                 <td> <span class="label label-danger">Document URL Submission Not Done</span> </td>
                                 @else
                                 <td><a href="{{ $urlinfo->f_url}}" + data + "\" target=\"popup\"  onclick=\"window.open('','popup','width=600,height=600')\"> View Doc</a></td>
                                 <!--<td><iframe width="300" height="200"-->
                                 <!--   src="{{ $urlinfo->f_url}} " allowfullscreen>-->
                                 <!--   </iframe></td>-->
                                @endif
                                  <td> {{ $urlinfo->s_name}} </td>
                                  <td> {{ $urlinfo->s_id}} </td>
                                  <td> {{ $urlinfo->title}} </td>
    
    @if($urlinfo->mid_video ==  Null)
      <td> <span class="label label-danger"> MID Video Submission Not Done</span> </td>
    @elseif((\Carbon\Carbon::parse($dates->mid_date)->format('d/m/Y')) == date('d/m/Y') || $dates->mid_date == NULL)
   <td class="danger">
        Disable Edit MId Video->{{(\Carbon\Carbon::parse($dates->mid_date)->format('d/m/Y'))}}
    </td>
@else
<td><a href="{{action('VideourlController@edit', $urlinfo['id'])}}" class="btn btn-success"> <i class="fa fa-pencil-square-o"></i> Edit MID</a> </td> 
@endif

@if($urlinfo->final_video ==  Null)
<td> <span class="label label-danger"> Final Video Submission Not Done</span> </td>
@elseif((\Carbon\Carbon::parse($dates->final_date)->format('d/m/Y'))== date('d/m/Y') || $dates->final_date == NULL )
   <td class="danger">
        Disable Edit Final Video
    </td>
@else
<td><a href="{{action('FinalurlController@edit', $urlinfo['id'])}}" class="btn btn-info"> <i class="fa fa-pencil-square-o"></i> Edit Final</a> </td> 
@endif

 @if($urlinfo->f_url ==  Null)
 <td> <span class="label label-danger">Document URL Submission Not Done</span> </td>
 @elseif($urlinfo->f_url != Null && $urlinfo->Internal_Reviewer_1 == NULL )
<td ><a href="{{action('DocurlController@edit', $urlinfo['id'])}}" class="btn btn-primary"> <i class="fa fa-pencil-square-o"></i> Edit Doc</a> </td>
@else
    <td class="danger">
        Disable Edit File URL
    </td>
   @endif 
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
    <div id="formModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Submit Your URL</h4>
          </div>
          <div class="modal-body">
            <span id="form_result"></span>
            <form class="" action="{{url('uploadvideo')}}" method="POST">
{{csrf_field()}}
 <div class="form-row">
           <div class="form-group col-6">
            <label for="exampleInputEmail1">URL</label><span class="text-danger"></span>
           <input name="url" type="text" class="form-control" id="url" aria-describedby="emailHelp" placeholder="Enter Here URL">

          </div>
        </div>

     <div class="form-row">
         <div class="form-group col-6">
          <label for="exampleInputEmail1">Student Name</label> <span class="text-danger">* If you want then you can change your name.</span>
          <input name="s_name" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ Auth::user()->name }}">
        </div>
        
      <div class="form-group col-6">
         <label for="exampleInputEmail1">Student ID</label>
         <input name="s_id" type="text" class="form-control" id="exampleInputEmail1"  aria-describedby="emailHelp" value="{{ Auth::user()->email_id }}" readonly>
       </div>

       
      </div>

      <div class="form-row">

         <div class="form-group col-6">
          <label for="exampleFormControlSelect1">Semester</label>
          <select type="text" class="form-control form-control-sm" name="semester">
              @foreach($student as $smstr)
              @if($smstr->email ==  Auth::user()->email)
          <option value="{{$smstr->semester}}">{{$smstr->semester}}</option>
             @endif
               @endforeach
          </select>
         
               
        </div>
        </div>
        
              <!-- <div class="form-row">

         <div class="form-group col-6">
          <label for="exampleFormControlSelect1">Choose Video</label>
          <select type="text" class="form-control form-control-sm" name="defense">
             <option value="">--Select Video Category---</option>
            <option value="MIDVIDEO">Mid Defense video</option>
            <option value="FINALVIDEO">Final Defense video</option>
          </select>
        </div>
        </div>
 -->
        <div class="form-row">
             <input name="email" class="form-control" id="exampleInputEmail1" name="Passingyear" aria-describedby="emailHelp" value="{{Auth::user()->email}}" type="hidden">

           
           <div class="form-group col-6">
             <label for="exampleInputEmail1">Title</label>
             @foreach($student as $titl)
              @if($titl->email ==  Auth::user()->email)
             <input name="title" class="form-control" id="exampleInputEmail1" name="Passingyear" aria-describedby="emailHelp" value="{{$titl->title}}" readonly>
             @endif
               @endforeach
           </div>
           
              <div class="form-group col-6">
             <label for="exampleInputEmail1">Supervisor</label>
             @foreach($student as $smstr)
              @if($smstr->email ==  Auth::user()->email)
             <input name="sv_init" class="form-control" id="exampleInputEmail1" name="Passingyear" aria-describedby="emailHelp" value="{{$smstr->sv_init}}" readonly>
             @endif
               @endforeach
           </div>

             @foreach($student as $smstr)
              @if($smstr->email ==  Auth::user()->email)
             <input name="sv_name" class="form-control" id="exampleInputEmail1" name="Passingyear" aria-describedby="emailHelp" value="{{$smstr->sv_name}}" type="hidden">
             @endif
               @endforeach


           <div class="" >
             <button type="submit"  class="btn btn-success">Submit</button>
           </div>


    </form>
          </div>
      </div>
    </div>
</div>



<script>
$(document).ready(function(){

  $('#create_record').click(function(){
    $('.modal-title').text('Submit Your Link');
    $('#action_button').val('Add');
    $('#action').val('Add');
    $('#form_result').html('');

    $('#formModal').modal('show');
  });

  $('#sample_form').on('submit', function(event){
    event.preventDefault();
    var action_url = '';


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

  

  var user_id;

  $(document).on('click', '.delete', function(){
    user_id = $(this).attr('id');
    $('#confirmModal').modal('show');
  });

  $('#ok_button').click(function(){
    $.ajax({
      url:"sample/destroy/"+user_id,
      beforeSend:function(){
        $('#ok_button').text('Deleting...');
      },
      success:function(data)
      {
        setTimeout(function(){
          $('#confirmModal').modal('hide');
          $('#user_table').DataTable().ajax.reload();
          alert('Data Deleted');
        }, 2000);
      }
    })
  });

});
</script>

                      <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("mylist");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
} 
    </script>    

     @endif   
@endsection
