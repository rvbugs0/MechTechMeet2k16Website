<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once("AdminDAO.php");	
require_once("functions.php");	

if(isset($_POST["name"]) && isset($_POST["username"]) && isset($_POST["password"]))
{
try
{
	$admin=new Admin();
	$adminDAO=new AdminDAO();
	$admin->name=$_POST["name"];
	$admin->username=$_POST["username"];
	$admin->password=$_POST["password"];
	$adminDAO->addAdmin($admin);
	redirect_to("../AdminLogin.php");

}
catch(Exception $e)
{
echo $e->getMessage();
}

}
?>

