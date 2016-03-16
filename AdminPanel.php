<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once("head.php");
?>
<style>
#committeeBox
{
  padding-bottom: 10px;
  color: white;
   background-color:rgba(0, 0, 0, 0.1);
}
</style>


</head><!--/head-->

<body>
<?php
include_once("header.php");
?>    
<div class="container" style="padding-top:7%;" >


<br/>
<div id="inner-box">
<?php
include_once("components/section-committee.php");
?>
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

   </script>
</body>

</html>
