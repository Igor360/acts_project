<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">#АУТС</h3>
   @include('auth.sidebar')  
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
          @if ($teacher != null)
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Головна</h3></div>

                <div class="panel-body">
<div class="row">
  <div class="col-md-8">
  <div class="meta-info">
    <span style="font-size:12px;">{{ $teacher->Department }}</span><br>
     {{ $teacher->LastName }} {{ $teacher->FirstName }} {{ $teacher->MiddleName }}
      <br>
      <span style="font-size:10px;">{{ $teacher->position }}</span>
  </div>
  </div>
    <div class="col-md-4">
      <img class="img-circle-teacher" src="{{ $teacher->Photo}}">
    </div>
</div>

<div class="row buttons">
    <div class="container nav-teacher-page">
     <div class="col-md-6">
      <p class="button"><a class="btn btn-lg btn-primary blue" href="/user/publication/">Публікації</a></p>   
     </div>
     <div class="col-md-6">
            <p class="button"><a class="btn btn-lg btn-primary blue" href="/user/conference/">Конференції</a></p> 
     </div>
     </div>
    </div>
    <div class="row buttons">
    <div class="container nav-teacher-page">
    <div class="col-md-4">
      <p class="button"><a class="btn btn-lg btn-primary blue" href="{{ $teacher->AnotherSite}}">Альтернативний сайт</a></p>
    </div>
    <div class="col-md-4"> 
     
      <p class="button"><a class="btn btn-lg btn-primary blue" href="{{ $teacher->Intellect }}">Intellect</a></p>
    </div>
    <div class="col-md-4">
      <p class="button"><a class="btn btn-lg btn-primary blue" href="{{ $teacher->TimeTable }}">Розклад</a></p>
    </div>
  </div>
  </div>
@if(isset($typework))
<?php 
require_once('showWorks.php');
ShowWork($typework,$user_id);
?>
@else
  @yield('main')
@endif
                </div>
                @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Дані відсутні</h3></div>
                @endif
            </div>



        </div>
    </div>
</div>