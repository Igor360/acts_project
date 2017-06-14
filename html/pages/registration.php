<?php
	header('Content-Type: text/html; charset=UTF-8');
	require "PageParts/header.php";	
?>
      <div  style="background-image: url(../img/slide_3.png); height: 100px; background-position: center; background-size: contain;">
      </div>
<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
     	<h2 class="c__block-title" style="text-align: left;">Реєстрація</h2>
   <div class = "col-sm-12 col-md-12 col-xs-12 main">
 <?php
 if (isset($_POST['page']))
 	{ 
 		$page = $_POST['page'];
 		if($page == "next")
 			require_once("registrationPage/teacherRegistration.php");
 	}
 else 
 	require_once("registrationPage/userRegistration.php");
 ?>
	</div>
  </div>
 </div>
</div>
<style>
.col-md-4,.col-md-6 span{
	line-height: 50px;
	font-size: 14pt;
}
.main{
	padding-top: 10px;
	border-top:1px solid  #0036c3;
	border-bottom:1px solid  #0036c3;
	color: #57a2e3;
}
.line{
	margin-top: 30px;
	border-top:1px solid  #57a2e3;
	margin-bottom: 40px;
}
</style>

<!-- Scroll To Top Button -->
<a href="#" class="scroll-to-top-btn">
 <i class="icon-arrow-up"></i>   
</a><!-- .scroll-to-top-btn -->
<!-- flie Footer -->
<?php
	require "PageParts/footer.php";
?>
<!-- end Footer -->




