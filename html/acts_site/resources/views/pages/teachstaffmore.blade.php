
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
      @if ( $teacher->isteacher)
        <!-- nav bar -->
         <div class="line"></div>
        <div class = "row" style = "padding: 15px; margin-top:0px;">
          <a href="{{ $teacher->Intellect}}" class ="Intellectbtn ">@lang('teachstaff.intellect')</a>
          <a href="{{ $teacher->AnotherSite}}" class ="Web-sitebtn">@lang('teachstaff.website')</a>
          <a href="{{ $teacher->TimeTable}}" class ="TimeTablebtn">@lang('teachstaff.timetable')</a>
         @if ($user->hasmasters)
          <a href="/masterdocs/{{$user->user_id}}" class ="Mastersbtn">@lang('teachstaff.sketches')</a>
         @endif
        </div>
         <div class="line"></div>
         <!-- end nav bar -->
       <!-- other  information block -->
        <div style = "margin-top:10px;">
          <p><b>@lang('teachstaff.disciplines'):</b></p>
              {!! $teacher->Discipline !!}
           <div class = "line-bottom-mini"></div>
          <p><b>@lang('teachstaff.ProfessionInt'):</b></p>
            {!! $teacher->ProfInterest !!}
           <div class = "line-bottom-mini"></div>
          <p><b>@lang('teachstaff.Consultations'):</b> {{ $teacher->TimeDay}} {{ $teacher->Room }}</p>
           <div class = "line-bottom-mini"></div>
        <!-- end block -->
        <!-- publication block-->

         <div class="spoiler">
          <input type="checkbox" id="spoilerid_1"><label for="spoilerid_1">
             <a><p><b>@lang('teachstaff.Publications')</b></p></a>
          </label>
          <div class = "spoiler_body">
       		 <?php

                echo App\Works::ShowWork(1,$user->user_id);
			     ?>
           </div>
          </div>
            <div class = "line-bottom-mini"></div>
        <!-- end block -->
        <!-- conference block-->
         <div class = "spoiler">
          <input type="checkbox" id="spoilerid_2"><label for="spoilerid_2">
            <a><p><b>@lang('teachstaff.Conference')</b></p></a>
          </label>
            <div class = "spoiler_body">
       		   <?php

               echo App\Works::ShowWork(2,$user->user_id);
			       ?>
            </div>
          </div>
          <!-- end block -->
	       	<div class = "line-bottom-mini"></div>
        </div>
      @endif
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
