<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once("DAO/CategoryDAO.php");
require_once("DAO/EventDAO.php");
	$category="";
	$categoryDAO=new CategoryDAO();
function checkVaidity($code)
{
$categoryDAO=new CategoryDAO();	
if($categoryDAO->existsByCode($code)==true)
{
return true;	
}
return false;
}


$code=0;
if(isset($_GET["code"]))
{
try
{
if($_GET["code"]%2==0 || $_GET["code"]%2==1)
{
if(checkVaidity($_GET["code"]))
{
	$code=$_GET["code"];
}
else{

	$categories=$categoryDAO->getAll();
	$code=$categories[0]->code;
}
}
}
catch(Exception $e)
{

	$categories=$categoryDAO->getAll();
	$code=$categories[0]->code;
}
}
else
{
	$categories=$categoryDAO->getAll();
	$code=$categories[0]->code;
}

	$category=$categoryDAO->getByCode($code);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php

include_once("head.php");
?>
<style>

body {
  background-color: #1881a2;
  background-image: url("images/performar-bg.jpg");
  background-position:50% 0;
  background-size: cover;
  background-repeat:no-repeat;
  
}

</style>
</head><!--/head-->
<body>
<?php include_once("analyticstracking.php"); ?>
	<?php
	include_once("header.php");
	?>
	
	<div class="container" >
	<div class="row">
	<div class="col-lg-12">
    <?php
	include_once("section-category-home.php");
	?>
    </div>
	</div>	
	</div>


	<?php

	include_once("footer.php");
	?>	
 
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="js/backstretch.min.js"></script>
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
<script>
 

  $(document).ready(function () {
    

      //  $('body').backstretch("images/sponsor-bg.jpg",{fade:1000});
        $('#footer').backstretch("images/footer-bg.jpg",{fade:1000});
    
    
});    
   </script>
</body>

	
</html>
