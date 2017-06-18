
@extends('auth.userpage')

@section('main')

<div class="container-fluid">
  <div class="inform">
  <b>{{ $teacher->Profession }}</b><br>
  <div id="main_inf">
    <b>День та час прийому відвідувачів:</b>{{ $teacher->TimeDay}}<br>
    <b>Кімната:</b>{{ $teacher->Room }}<br>
    <b>Стаціонарний телефон:</b>{{ $teacher->Phone}}<br>
    <b>Мобільний телефон:</b>{{ $teacher->Mobile }}<br>
    <b>E-mail:</b>{{ $teacher->Email }}<br>
  </div>


  <div id="prof_int">

    <span class="detail">Професійні інтереси:</span>
    <br><br>
     {!! $teacher->ProfInterest !!}
    <br>
    <span class="detail">Дисципліни:</span>
    <br><br>
    {!! $teacher->Discipline !!}
  </div>       
        </div>
</div>

@endsection