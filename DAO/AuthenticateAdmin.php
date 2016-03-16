<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once("AdminDAO.php");
require_once("functions.php");
if(isset($_POST["username"]) && isset($_POST["password"]))
{
	try
	{

		$admin=new Admin();
		$admin->username=$_POST["username"];
		$admin->password=$_POST["password"];
		$adminDAO=new AdminDAO();
		if($adminDAO->validate($admin)==true)
		{
			createSession($admin->username);
			redirect_to("../AdminHome.php");
		}
		else
		{
			echo "incorrect username / password";
		}
	}
	catch(Exception $e)
	{
			echo "incorrect username / password";
	}
}

?>