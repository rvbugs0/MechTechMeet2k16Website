<?php
require_once("DAO/functions.php");
beginSession();
if(!file_exists("DAO/DatabaseConnection.php"))
{
  redirect_to("InstallationForm.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <?php
  include_once("head.php");
  ?>

<style>

        #preloader {
            position: absolute;
            z-index: 1000;
            height: 100%;
            width: 100%;
            left: 0;
            top: 0;
  background-color:rgba(0, 0, 0, 1);
            color: white;
            text-align: center;
            overflow: hidden;
        }
        .preimage{
          margin: 0 auto;
        }

#myModalImage
{
/*  max-height: 608px;
*/}
.cimg {
    position: relative;
    top: 0;
    left: 0;
    min-width: 100%;
}



</style>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>

<?php

if(!checkBasicSession())
{
  ?>
 <script type="text/javascript">
$(window).load(function() {
  // When the page has loaded
  $("#preloader").fadeOut(4000);
  $("#myDiv").fadeIn(2000);
});
 </script>
  <?php
}

?>  </head>

  <body>
<?php include_once("analyticstracking.php"); ?>

<?php

if(!checkBasicSession())
{
  ?>
<div id="preloader" >
  <h1>Mech Tech Meet Season-7</h1>
<img  style="max-height:640px;" class="img img-responsive preimage" src="images/gjbig.jpg">
</div>
  <?php
}
createBasicSession();
?>



 <div id="myDiv">
    <!-- Begin page content -->


<?php
include_once("components/header-home.php");
include_once("components/section-home.php")
?>


<section id="event">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-lg-9">
          <div id="event-carousel" class="carousel slide" data-interval="false">
            <h2 class="heading">Event Categories</h2>
            <a class="even-control-left" href="#event-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
            <a class="even-control-right" href="#event-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
            
          <?php
            include_once("home-category-list.php");

            ?>

          </div>
        </div>
        <div class="guitar">
          <img class="img-responsive" src="images/guitar.png" alt="guitar">
        </div>
      </div>      
    </div>
  </section><!--/#event-->





<?php
include_once("components/section-about.php");
?>


<section id="explore">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-lg-12">
          <div id="event-carousel2" class="carousel slide" data-interval="false">
            <h2 class="heading">Photo Album</h2>
            <a class="even-control-left" href="#event-carousel2" data-slide="prev"><i class="fa fa-angle-left"></i></a>
            <a class="even-control-right" href="#event-carousel2" data-slide="next"><i class="fa fa-angle-right"></i></a>
            
          <?php
            include_once("gallery-section.php");

            ?>

          </div>
        </div>
      </div>      
    </div>
  </section>

  
  
<?php
//include_once("components/section-twitter.php");
//include_once("components/section-sponsor.php");
include_once("components/section-contact.php");
?>

    <!--/#contact-->

  
<?php
include_once("footer.php");
?>



    <script src="js/backstretch.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
    <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
        
<script>
 

  $(document).ready(function () {
       //$('#exploreRow').backstretch("images/footer-bg.jpg",{fade:1000});

       $(".galleryImage").on("click",function(){
          $("#myModalImage").attr("src",$(this).attr("src"));
          $("#imageModal").modal("show");
       });
});    



   </script>
    </div>
  <section id="imageModal" class="modal fade">
    <div class="modal-body">
      <div class="container">
     <center> <img style="cursor:pointer" id="myModalImage" data-toggle="modal" class="img img-responsive" data-target="#imageModal" src="" alt="Modal Photo">
      </center>
      </div>
    </div><!-- modal-body -->
  </section><!-- modal -->
</body>
</html>





