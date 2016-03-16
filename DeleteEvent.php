<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once("DAO/functions.php");
require_once("DAO/EventDAO.php");
try
{
if(!isset($_GET["code"]))
{
redirect_to("index.php");
}
$code =$_GET["code"];
$eventDAO=new EventDAO();
$eventDAO->deleteEvent($code);
redirect_to("ManageEvents.php");
}
catch(Exception $e)
{
echo $e->getMessage();
}


?>