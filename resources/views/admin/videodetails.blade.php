@extends('admin.layouts.master')

@section('title')
Video list
@endsection

@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       All Uploaded Video
        <small>Video</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
      
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
        <form method="get">
                   <select name="category" class="form-control show-tick">
                       <option>--Select Video Category--</option>
                       <option value="MIDVIDEO">Mid Defense video</option>
                       <option value="FINALVIDEO">Final Defense video</option>
                       </select> 
                       <br>
                      <select name="search" class="form-control show-tick">
                       <option>--Select semester--</option>
                        <option value="Spring-2020">Spring-2020</option>
                        <option value="Summer-2020">Summer-2020</option>
                        <option value="Fall-2020">Fall-2020</option>
                         <option value="Spring-2021">Spring-2021</option>
                        <option value="Summer-2021">Summer-2021</option>
                        <option value="Fall-2021">Fall-2021</option>
                       </select> 
             
                    <br>
                      <button align="right" class="btn btn-info mt-2" id="searchCat">Seach</button>
                    </form>
        <br />
        
         <table id="user_table" class="table table-bordered table-striped">
                                    <thead>
                                <tr>
                                  <th>Video</th>
                                  <th>Student Name</th>
                                  <th>Student ID</th> 
                                  <th>Project Title</th>
                                  <th>Semester</th>
                                  <th>Video Type</th>
                                  <th>Supervisor Initial</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($videourl as $freelancer)
                        
                                <tr>
                         <td><iframe width="300" height="200" src="{{ $freelancer->url}} " allowfullscreen>
                                    </iframe></td>
                                  <td> {{ $freelancer->s_name}} </td>
                                  <td> {{ $freelancer->s_id}} </td>
                                  <td> {{ $freelancer->title}} </td>
                                  <td>{{ $freelancer->semester}}</td>
                                  <td>{{$freelancer->defense}}</td>
                                  <td>{{ $freelancer->sv_init}}</td> 
                                </tr>
                          
                                @endforeach
                              </tbody>
                             <span id="val"></span>
                            </table>
   <!--   <div class="table-responsive">-->
          

      
   <!--     <div class="row">-->
   <!--          @foreach($videourl as $freelancer)-->
   <!--          <div class="col-md-4">-->
   <!--               <table id="user_table" class="table table-bordered table-striped">-->
   <!--       <tbody>-->
   <!--         <tr>-->
   <!--             <th>-->
          <!-- Widget: user widget style 1 -->
   <!--       <div class="box box-widget widget-user-2">-->
            <!-- Add the bg color to the header using any of the bg-* classes -->
   <!--         <div class="widget-user-header bg-yellow">-->
   <!--             <iframe width="338" height="200"src="{{ $freelancer->url}} " allowfullscreen> </iframe>-->
              <!-- /.widget-user-image -->
   <!--           <h5 class="widget-user-desc">{{ $freelancer->s_name}}</h5>-->
   <!--           <h5 class="widget-user-desc">{{ $freelancer->s_id}}</h5>-->
   <!--         </div>-->
   <!--         <div class="box-footer no-padding">-->
   <!--           <ul class="nav nav-stacked">-->
   <!--             <li><a href="#"><span class="pull-left badge bg-blue">{{ $freelancer->title}}</span></a></li>-->
   <!--             <li><a href="#">Supervisor Initial:  <span class=" badge bg-aqua">{{ $freelancer->sv_init}}</span></a></li>-->
                <!--<li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>-->
                <!--<li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>-->
   <!--           </ul>-->
   <!--         </div>-->
   <!--       </div>-->
   <!--       </th>-->
   <!--       </tr>-->
   <!--       </tbody>-->
   <!--     </table>-->
          <!-- /.widget-user -->
   <!--     </div>-->
   <!--@endforeach-->
   
   
   <!--   </div>-->
      <!-- /.row -->
      <!-- END TYPOGRAPHY -->
                           </div>
                           </div>
                           </div>
                           </div>
                           </div>
  




        
@endsection
