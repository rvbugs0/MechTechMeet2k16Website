<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once("DAO/CategoryDAO.php");
require_once("DAO/EventDAO.php");
	$event="";
	$eventDAO=new EventDAO();
function checkVaidity($code)
{
$eventDAO=new EventDAO();	
if($eventDAO->existsByCode($code)==true)
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

	$events=$eventDAO->getAll();
	if(sizeof($events)==0)
	{
		return;
	}
	$code=$events[0]->code;
}
}
}
catch(Exception $e)
{

	$events=$eventDAO->getAll();
	$code=$events[0]->code;
}
}
else
{
	$events=$eventsDAO->getAll();
	if(sizeof($events)==0)
	{
		return;
	}
	$code=$events[0]->code;
}

	$event=$eventDAO->getByCode($code);
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once("head.php");
?>



</head><!--/head-->

<body>
<?php include_once("analyticstracking.php"); ?>

<?php
include_once("header.php");
?>
    
<div class="container" style="">

<div class="row">
<div class="col-lg-12">
<?php

include_once("section-event-details.php");
?>
<br/ class="clear" >
</div>
</div>

</div>


<?php
include_once("footer.php");

?>

	

    <!--/#footer-->
  
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="js/backstretch.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  	<script type="text/javascript" src="js/gmaps.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  

<script>
 
$("#eventRegisterButton").on("click",function()
	{

		if($("#mtmId").val().trim().length==0)
		{
		alert("please enter your MTM - ID");
		return;	
		}
		$(this).attr("disabled",true);
	$.ajax({
   url: 'DAO/EventRegister.php',
   dataType:'json',
   data: {
      eventId: $("#eventId").val(),
      mtmId: $("#mtmId").val()
      },
error: function(xhr, status, error) {
  var err = eval("(" + xhr.responseText + ")");
	},
   success: function(data) {
      $("#registerSpan").html(data.message);
   },
   type: 'GET'
});

	});


	$(document).ready(function () {
    "use strict";
 		
     $('body').backstretch("images/performar-bg.jpg",{fade:1000});
             $('#footer').backstretch("images/footer-bg.jpg",{fade:1000});
});    
   </script>
</body>

</html>


