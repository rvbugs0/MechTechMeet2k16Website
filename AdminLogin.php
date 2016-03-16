<!DOCTYPE html>
<html lang="en">
<head>

<?php 
include_once("head.php");
?>
<style>

body{
	color: #000;
}
</style>
</head><!--/head-->
<body>
<div class="container">
<?php
require_once("DAO/AdminDAO.php");
try
{
$adminDAO=new AdminDAO();
if($adminDAO->getCount()==0)
{
?>
<h1>Add Admin :</h1><br/>
<form class="form"  method="post" action="DAO/AddAdmin.php" role="form">
Name :<br>
<input type="text" class="form-control" name="name">
<br>
Username :<br>
<input type="text" class="form-control" name="username">
<br>
password :<br>
<input type="password" class="form-control" name="password">
<br>
<input class="btn btn-primary" type="submit" value="Submit">

</form>
  




<?php


}else
{
?>
<h1> Admin Login :</h1><br/>
<form class="form"  method="post" action="DAO/AuthenticateAdmin.php" role="form">
Username :<br>
<input type="text" class="form-control" name="username">
<br>
password :<br>
<input type="password" class="form-control"  name="password">
<br>
<input class="btn btn-primary" type="submit" value="Submit">

</form>


<?php
}
}
catch(Exception $e)
{

}

?>
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