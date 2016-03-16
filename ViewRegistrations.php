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

.btn{
  margin-bottom: 10px;
}
</style>
</head><!--/head-->

<body>

<div id="manage-category">
<div class="container">

<h1>Registrations</h1>
<br/>
<a href="AdminHome.php" class="btn btn-primary">Admin Home</a><br/>
<?php
try
{
require_once("DAO/EventDAO.php");
$eventDAO=new EventDAO();
$events=$eventDAO->getAll();
foreach ($events as $event) {
echo "<a class='btn btn-primary' href='ViewRegistrations.php?eventId=".$event->code."'>".$event->name."</a>&nbsp&nbsp;";
}

}catch(Exception $e)
{

}

?>


<br/>
<?php
if(isset($_GET["eventId"]))
{
echo "<center><h1>".$eventDAO->getByCode($_GET["eventId"])->name."</h1></center><br/>";
?>
<table class="table table-responsive">
<thead>
<tr>
<td>S.No.</td>
<td>Name</td>
<td>MTM-ID</td>
<td>College</td>
<td>Phone</td>
<td>Email</td>
<td>Gender</td>
</tr>
</thead>
<tbody>
<?php
try
{
require_once("DAO/DatabaseConnection.php");  
$c=DatabaseConnection::getConnection();
$rs=$c->query("select * from event_registrations_view where event_id = ".$_GET["eventId"]);
$x=1;
foreach ($rs as $row) {
  echo "<tr>"; 
  echo "<td>".$x."</td>";
  echo "<td>".$row["participant_name"]."</td>";
  echo "<td>".$row["participant_id"]."</td>";
  echo "<td>".$row["college"]."<br/>";
  echo "<td>".$row["phone"]."<br/>";
  echo "<td>".$row["email"]."<br/>";
  echo "<td>".$row["gender"]."<br/>";
  echo "</tr>";
  $x++;
}
}
catch(Exception $e)
{
  echo $e->getMessage();
}

?>
</tbody>
</table>

<?php
}
?>


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

