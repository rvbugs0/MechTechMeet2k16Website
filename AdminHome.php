<?php
require_once("DAO/functions.php");
require_once("DAO/AdminDAO.php");
if(!checkSession())
{
redirect_to("index.php");
}
$adminDAO=new AdminDAO();
$admin=$adminDAO->getByUsername($_SESSION["username"]);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once("head.php");
?>
<style type="text/css">

body
{
  color:black;
} 
.btn
{
	margin-bottom: 20px;
}

</style>
</head><!--/head-->

<body>

<div class="container">

<div class="row">
<div class="col-lg-6"><br/>
<h1><?php  echo "Hello , ".$admin->name ?></h1><br/>

<a href="ViewParticipants.php" class="btn btn-primary">View Participants</a><br/>
<a href="ViewRegistrations.php" class="btn btn-primary">View Registrations</a><br/>
<a href="ManageCategories.php" class="btn btn-primary">Manage Categories</a><br/>
<a href="ManageEvents.php" class="btn btn-primary">Manage Events</a><br/>
</div>
</div>
</div>

  
      <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="js/backstretch.min.js"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  


</body>

</html>
