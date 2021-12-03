@extends('admin.layouts.master')
@section('title')
Dashboard
@endsection
@section('content')

<style>
    .box{
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    .Spring_2020{ background: #ff0000; }
    .green{ background: #228B22; }
    .blue{ background: #0000ff; }
    
    .blink{

	    background-color: green;
		padding: 15px;	
		text-align: center;
		line-height: 50px;
		font-size: 25px;
		font-family: cursive;
		color: white;
		animation: blink 2s linear infinite;
	}

@keyframes blink{
0%{opacity: 0;}
50%{opacity: .5;}
100%{opacity: 1;}
}

/* Here's some environment setup,
   scroll down for the interesting parts */

.animated-box {
  font-family: 'Lato';
  color: #ffffff;
  padding: 30px;
  text-align: center;
  border-radius: 4px;
}

.animated-box h1 {
  font-weight: 200;
  font-size: 40px;
  text-transform: uppercase;
}

.animated-box p {
  font-weight: 200;
}

/* The animation starts here */
.animated-box {
  position: relative;
}

.animated-box:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  border-radius: 4px;
  background: linear-gradient(120deg, #00F260, #0575E6, #00F260);
  background-size: 300% 300%;
  clip-path: polygon(0% 100%, 3px 100%, 3px 3px, calc(100% - 3px) 3px, calc(100% - 3px) calc(100% - 3px), 3px calc(100% - 3px), 3px 100%, 100% 100%, 100% 0%, 0% 0%);
}

.animated-box.in:after {
  animation: frame-enter 1s forwards ease-in-out reverse, gradient-animation 4s ease-in-out infinite;
}

/* motion */
@keyframes gradient-animation {
  0% {
    background-position: 15% 0%;
  }
  50% {
    background-position: 85% 100%;
  }
  100% {
    background-position: 15% 0%;
  }
}

@keyframes frame-enter {
  0% {
    clip-path: polygon(0% 100%, 3px 100%, 3px 3px, calc(100% - 3px) 3px, calc(100% - 3px) calc(100% - 3px), 3px calc(100% - 3px), 3px 100%, 100% 100%, 100% 0%, 0% 0%);
  }
  25% {
    clip-path: polygon(0% 100%, 3px 100%, 3px 3px, calc(100% - 3px) 3px, calc(100% - 3px) calc(100% - 3px), calc(100% - 3px) calc(100% - 3px), calc(100% - 3px) 100%, 100% 100%, 100% 0%, 0% 0%);
  }
  50% {
    clip-path: polygon(0% 100%, 3px 100%, 3px 3px, calc(100% - 3px) 3px, calc(100% - 3px) 3px, calc(100% - 3px) 3px, calc(100% - 3px) 3px, calc(100% - 3px) 3px, 100% 0%, 0% 0%);
  }
  75% {
    -webkit-clip-path: polygon(0% 100%, 3px 100%, 3px 3px, 3px 3px, 3px 3px, 3px 3px, 3px 3px, 3px 3px, 3px 0%, 0% 0%);
  }
  100% {
    -webkit-clip-path: polygon(0% 100%, 3px 100%, 3px 100%, 3px 100%, 3px 100%, 3px 100%, 3px 100%, 3px 100%, 3px 100%, 0% 100%);
  }
}

</style>
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<!-- <script>
$(document).ready(function(){
    $("select").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".box").hide();
            }
        });
    }).change();
});
</script> -->


    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">-->
    <!--  <h1>-->
    <!--    Dashboard-->
    <!--    <small>Control panel</small>-->
    <!--  </h1>-->
    <!--  <ol class="breadcrumb">-->
    <!--    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
    <!--    <li class="active">Dashboard</li>-->
    <!--  </ol>-->
    <!--</section>-->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header" align="center">
            <h3>Submit Your Proposal <a href="http://swe.application.daffodilvarsity.edu.bd/final_project/public/myproposal"  class="blink">Click Here</a></h3>  
    
    <br>
          @if(count($notice) > 0)
      @foreach($notice as $ntc)
    <div class="animated-box in">
      @if(isset($ntc->semester ))
    <h3 class="text-success">Notice For {{ $ntc->semester}}</h3>
    @else
     <marquee> <h3 class="text-success">Notice Not Published Yet. Coming Soon...</h3> </marquee>
     @endif
      @if(isset($ntc->description ))
    <h4 class="text-danger">**NB: {{ $ntc->description}}</h4>
    @endif
    @if(isset($ntc->contact ))
     <h4 class="text-danger">**NB: For further queries contact with this number: {{ $ntc->contact}}</h4>
     @endif
      @if(isset($ntc->google_code ))
     <h4 class="text-danger">*** Join Google classroom for all the update: <b>{{ $ntc->google_code}}</b> </h4>
      @endif
      @if(isset($ntc->seminar_date ))
           <h4 class="text-danger">***Seminar Date: {{ $ntc->seminar_date}}***</h4>
            @endif
            @if(isset($ntc->meet_link ))
            <h4 class="text-danger">***Code: <a href="{{ $ntc->meet_link}}" target="_blank"> {{ $ntc->meet_link}} </a></h4>
           <h4 class="text-danger">***Meet link: <a href="{{ $ntc->meet_link}}" target="_blank">Click Here for Join meeting</a></h4>
            @endif
            
           <h3 class="text-success">*** Dear Students, If you face any type of issue, please take a screenshot and send it to <b> washim35-1730@diu.edu.bd </b> </h3> 
           <h4 class="text-success">Must add the subject of your email ISSUE OF FINAL YEAR PROJECT/THESIS MANAGEMENT SYSTEM *** </h4> 
    </div>
    @endforeach
                @else
<div class="animated-box in">
           <marquee> <h3 class="text-success">Notice Not Published Yet. Coming Soon...</h3> </marquee>
 </div>
                @endif
           
         <h3 class="text-danger">***<b>Eligibility for Thesis/Project/Internship</b>***</h3>
         <h4 class="text-danger">A student must be completed at least 120 Credits to Enrolled SWE-431: Project/Thesis proposal. </h4>
          <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                                <tr>
                                  <th>Thesis</th>
                                  <th>Project</th>
                                  <th>Internship</th>
                                  <!--<th>Submit Mark</th>-->
                                </tr>
                              </thead>
                              <tbody>
                                 @foreach($eligibility as $elgblt)
                                 <tr>
                                  <td align="justify"> {{ $elgblt->thesis}} </td>
                              
                                <td align="justify">{{ $elgblt->project}}</td>
                                <td align="justify"> {{ $elgblt->intrnship}} </td>
                              </tr>
                              @endforeach
                              </tbody>
                             </table>
            </div>
       
<h3 class="text-danger">***No group allowed, Individual Task.***</h3> </div>
  <marquee> <h4>Design & Developed by Washim Akram, Md. Shohel Arman, Asif Khan Shakir </h4></marquee>
            </div>
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p align="center">{{$message}}</p>
  </div>
  @endif
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.2.0
    </div>
    <strong>Copyright &copy; 2021 <a href="#">Washim Akram</a>.</strong> All rights
    reserved.

    @endsection