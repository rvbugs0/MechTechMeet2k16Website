<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once("head.php");
?>
<style>
body
{

}

</style>


</head><!--/head-->

<body>
<?php
include_once("header.php");
?>    
<div class="container" id="registrationBox" >


<br/>
<div class="row">
<div class="col-lg-offset-3 col-lg-5">
<div id="inner-box">

<center><h1>Get Your MTM ID</h1></center>
<br/>
<center><b><span  class="" id="mtmId"></span></b><center>
<form class="form-horizontal" id="registrationForm" role="form">

<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<input type="text" class="form-control" name="name" id="name" placeholder="Name">
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<input type="email" class="form-control" name="email" id="email" placeholder="Email">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<input type="number" class="form-control" id="age" name="age" placeholder="Age">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<input type="text" class="form-control" id="college" name="college" placeholder="College">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<input type="text" name="address" class="form-control" id="address" placeholder="Branch">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<input type="radio" id="male" name="gender" value="M" checked>Male &nbsp;
<input type="radio" id="female" name="gender" value="F">Female
</div>
</div>
<center>
<button type="button" id="registerButton" class="btn-primary" >Submit </button>
 </center>


</div>
</form>
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
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/backstretch.min.js"></script>
	<script src="js/form-rules.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  	<script type="text/javascript" src="js/gmaps.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  

<script>
 

	$(document).ready(function () {
    "use strict";
 		
     $('body').backstretch("images/slider/bg9.jpg",{fade:1000});
             $('#footer').backstretch("images/footer-bg.jpg",{fade:1000});
});

$("#registerButton").on("click",function(){
	
	if($("#registrationForm").valid())
	{
	$(this).attr("disabled",true);
$.ajax({
   url: 'DAO/AddParticipant.php',
   dataType:'json',
   data: {
      name: $("#name").val(),
      age: $("#age").val(),
      address: $("#address").val(),
      college: $("#college").val(),
      gender: function(){
      	if($('#male').is(':checked'))
      	{
      		return "M";
      	}
      	return "F"; 
      },

   	  phone: $("#phone").val(),	
   	  email: $("#email").val(),
   },
error: function(xhr, status, error) {
  var err = eval("(" + xhr.responseText + ")");
	},
   success: function(data) {
      if(data.success)
      {
      $("#registrationForm").hide();	
      $("#mtmId").html("Your MTM ID is :    "+data.id);      	
  	  }
  	  else
  	  {
      $("#registrationForm").hide();	  	  	
  	  $("#mtmId").html(data.errorMessage);	
  	  }	

   },
   type: 'GET'
});		
	}



});


   </script>
</body>

</html>
