
@include('layouts.header')

<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">

   	      <div class = "namepage">
        <div class = "left-line"></div>
        <div class = "name-text"><h3>{{ $namepage }}</h3></div>
        <div class = "right-line"></div>
      </div>
       <div class = "teachers">
       @if ($persons != null)
<?php
$i = 0;
$rowcol = 1;
foreach ($persons as $person) {

if ($rowcol == 6 ) $rowcol = 1;

try{
$photo_name = explode('/', $person->Photo); // get file name
$entry = \App\Files::where('filename', '=', $photo_name[count($photo_name)- 1])->first(); // check the record in bd
$image = \Storage::disk('public')->get($entry->filename); // check the file in folder
}
catch(Exception  $e){ // if files or record not exist, then get the url adreess
  $image = $person->Photo;
  if($entry != null)
      $image = asset('img/Photo.png');
}


  echo   "   <div class = \"teacher\" id = \"teacher_ab${i}\">";
  echo   "   <img src = \" {$image}\">";
  echo   "     <div class = \"description\"><h6>".$person->LastName." ".$person->FirstName." ".$person->MiddleName."</h6></div>";
  echo      "</div>";
  echo      "<div  class = \"about_teacher teacher_ab${i}\">";
if ($rowcol < 4)
  echo        "<div class = \"text animated bounceInRight aboutTeacherRight\" >";
else
  echo        "<div class = \"text animated bounceInLeft  aboutTeacherLeft\" >";
  echo          "<h4 class= \"teacher_name\">".$person->LastName." ".$person->FirstName." ".$person->MiddleName. "</h4><br/>";
  echo           "<p class=  \"teachDescr\">".$person->position." ".$person->Profession."</p>";
  if ($person->isteacher)
  	echo           "<a class = \"teacherbtn\" href=\"/teachstaff/more/{$person->teacher_id}\">".__('article.article_morebtn')."</a>";
  echo       "</div>";
  echo     "</div>";
$rowcol +=1;
  $i+=1;
}
?>

@else
<h2 class="c__block-title col-xs-12" style="text-align: left;">@lang('messages.no_data')</h2><hr>
@endif

</div>
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
