<?php
header('Content-Type: text/html; charset=UTF-8');
function __autoload( $className ) 
{
  $className = str_replace( "..", "", $className );
  require_once( "library/$className.php" );
}
	require "header.php";	
?>
<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">
<?php
include_once("getArticleforPage.php");
 ?>

</div>
</div>
</div>
</div>
<!-- Scroll To Top Button -->
<a href="#" class="scroll-to-top-btn">
 <i class="icon-arrow-up"></i>   
</a><!-- .scroll-to-top-btn -->
<!-- flie Footer -->
<?php
require "footer.php";
?>
<!-- end Footer -->



