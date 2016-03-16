<?php
function redirect_to( $location = NULL ) {
if ($location != NULL) 
{
header("Location: {$location}");
exit;
}
}


function beginSession()
{
if(session_id()=="" && !isset($_SESSION)) session_start();	
}

function checkSession()
{
beginSession();	
if(isset($_SESSION['username']))
{
return true;
}
return false;
}

function clearSession()
{
beginSession();	
if(isset($_SESSION['username']))
{
session_destroy();
}
}

function clearBasicSession()
{
beginSession();	
if(isset($_SESSION['BasicUser']))
{
session_destroy();
}
}


function createSession($username)
{
	beginSession();
	$_SESSION["username"]=$username;
}


function checkBasicSession()
{
beginSession();	
if(isset($_SESSION['BasicUser']))
{
return true;
}
return false;
}

function createBasicSession()
{
	beginSession();
	$_SESSION["BasicUser"]="abcde";
}

?>
