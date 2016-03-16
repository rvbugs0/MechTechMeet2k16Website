<?php
require_once("DAO/functions.php");
if(!checkSession())
{
redirect_to("index.php");
}
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

  a:hover
  {
    color:red;
  }
table
{
  height: 100px;
  overflow: scroll;
}

</style>
</head><!--/head-->

<body>

<div id="manage-category">
<div class="container">

<h1>Participants List</h1>
<br/>
<a href="AdminHome.php" class="btn btn-primary">Admin Home</a><br/>
<table class="table table-responsive">
<thead>
<tr>
<td>S.No.</td>
<td>Name</td>
<td>MTM-ID</td>
<td>College</td>
<td>Phone</td>
<td>Email</td>
<td>Address</td>
<td>Age</td>
<td>Gender</td>
</tr>
</thead>
<tbody>
<?php
require_once("DAO/ParticipantDAO.php");

try
{

$pdo=new ParticipantDAO();
$participants=$pdo->getAll();
$x=1;
foreach ($participants as $participant) {
	echo "<tr>"; 
	echo "<td>".$x."</td>";
	echo "<td>".$participant->name."</td>";
	echo "<td>".$participant->participantId."</td>";
	echo "<td>".$participant->college."<br/>";
	echo "<td>".$participant->phone."<br/>";
	echo "<td>".$participant->email."<br/>";
	echo "<td>".$participant->address."<br/>";
	echo "<td>".$participant->age."<br/>";
	echo "<td>".$participant->gender."<br/>";
	echo "</tr>";
	$x++;
}

}
catch(Exception $e)
{
	//echo $e->getMessage();
}

?>
</tbody>
</table>
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
