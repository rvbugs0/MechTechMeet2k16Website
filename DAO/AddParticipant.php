<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

include_once("ParticipantDAO.php");
try
{
	if(isset($_GET["name"]) && isset($_GET["age"])
		&& isset($_GET["gender"]) && isset($_GET["college"])
		&& isset($_GET["address"]) && isset($_GET["email"])
		&& isset($_GET["phone"])
		)
	{
		$participant=new participant();
$participant->name=$_GET["name"];
$participant->age=$_GET["age"];
$participant->gender=$_GET["gender"];
$participant->college=$_GET["college"];
$participant->address=$_GET["address"];
$participant->email=$_GET["email"];
$participant->phone=$_GET["phone"];	
$pdo=new ParticipantDAO();
$pdo->addParticipant($participant);
echo '{"success":true,"id":"'.$participant->participantId.'"}';
	}
	else
	{
echo '{"success":false,"errorMessage":"Incomplete Entries"}';		
	}


 
}
catch(Exception $e)
{
echo '{"success":false,"errorMessage":"'.$e->getMessage().'"}';
}

?>