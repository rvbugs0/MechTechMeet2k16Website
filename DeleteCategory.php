<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once("DAO/functions.php");
require_once("DAO/CategoryDAO.php");
try
{
if(!isset($_GET["code"]))
{
redirect_to("index.php");
}
$code =$_GET["code"];
$categoryDAO=new CategoryDAO();
$categoryDAO->deleteCategory($code);
redirect_to("ManageCategories.php");
}
catch(Exception $e)
{
echo $e->getMessage();
}


?>