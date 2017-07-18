
@include('layouts.header')

<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">
@if ( isset($teacher) and isset($user))
 @if ($teacher != null and $user != null)
 <div class="col-lg-5 col-md-5 col-xs-5">
        <div class = "teacher_image">
          <img src = "{{ $teacher->Photo }}" style="width:88%; border-radius: 5px; box-shadow: inset 0px 0px 20px black;">
          <div class = "image-logo"><img src="/img/logo.png"></div>
        </div>
      </div>
      <div class="col-lg-7 col-md-7 col-xs-7">
        <h3 class="text-left" style="text-decoration: underline;">  {{ $teacher->LastName }} {{ $teacher->FirstName }} {{ $teacher->MiddleName }}</h3>
        <p>{{ $teacher->position }} {{ $teacher->Profession}}</p>
        <div class="line"></div>
        <div class = "row" style = "padding: 15px; margin-top:0px;">
        <a href="{{ $teacher->Intellect}}" class ="Intellectbtn ">@lang('teachstaff.intellect')</a>
          <a href="{{ $teacher->AnotherSite}}" class ="Web-sitebtn">@lang('teachstaff.website')</a>
          <a href="{{ $teacher->TimeTable}}" class ="TimeTablebtn">@lang('teachstaff.timetable')</a>
         @if ($user->hasmasters)
          <a href="/masterdocs/{{$user->id}}" class ="Mastersbtn">@lang('teachstaff.sketches')</a>
        @endif
        </div>
        <div class="line"></div>
        <div style = "margin-top:10px;">
          <p><b>@lang('teachstaff.disciplines'):</b></p>
              {!! $teacher->Discipline !!}
          <div class = "line-bottom-mini"></div>
          <p><b>@lang('teachstaff.ProfessionInt'):</b></p>
            {!! $teacher->ProfInterest !!}
          <div class = "line-bottom-mini"></div>
          <p>@lang('teachstaff.Consultations'): {{ $teacher->TimeDay}} {{ $teacher->Room }}</p>
          <div class = "line-bottom-mini"></div>
          <p><b>@lang('teachstaff.Publications'):</b></p>
       		<?php 
require_once('showWorks.php');
ShowWork(1,$user->id);
			?>
 <div class = "line-bottom-mini"></div>
          <p><b>@lang('teachstaff.Conference'):</b></p>
       		<?php 
require_once('showWorks.php');
ShowWork(2,$user->id);
			?>

		<div class = "line-bottom-mini"></div>
        </div>
      </div>
 @else
  <h2 class="c__block-title col-xs-12" style="text-align: left;">@lang('messages.no_data')</h2><hr>
 @endif
@else
<h2 class="c__block-title col-xs-12" style="text-align: left;">@lang('messages.no_data')</h2><hr>
@endif   



</div>
</div>
</div>
</div>
<!-- Scroll To Top Button -->
<a href="#" class="scroll-to-top-btn">
 <i class="icon-arrow-up"></i>   
</a><!-- .scroll-to-top-btn -->
<!-- flie Footer -->
@include('layouts.footer')
<!-- end Footer -->

<style type="text/css">
  .Intellectbtn{
   border-radius:5px; padding: 15px; width:40%; font-size: 14px; margin-left: 23%;
  }
 .Intellectbtn:hover{
  color: green;
}
.Web-sitebtn{
 padding: 15px; border-radius:5px; font-size: 14px; margin-left: 3%;
}
.Web-sitebtn:hover{
  color: #ff7c73; 
}
.TimeTablebtn,.Mastersbtn{
 padding: 15px; font-size: 14px; border-radius:5px; margin-left: 3%;

}
.TimeTablebtn:hover{
  color: red;
}
.Mastersbtn:hover{
  color: blue;
}
.teacher_image{
  text-align: center;
  padding: 10px;
  margin-left: 10%;
  margin-right: 10%;
}
.line-image-bottom{
  border-bottom: 3px solid #ffb76f;
  width: 59.5%;
  margin-left: 14%;
  margin-right: 14%;
}
.image-logo{
 // background-color: #ffb76f;
 height: 72px;
 width: 59.5%;
 margin-left: 14%;
 margin-right: 14%;
 margin-top: -10px;

}
.line{
  border-bottom: 3px solid #063cc7;
}
.line-bottom-mini{
  border-bottom: 3px solid #5ca2f3;
  margin-top: -10px;
  margin-bottom: 10px;
  //  margin-left: 14%;
  //  margin-right: 14%;
}
</style>


