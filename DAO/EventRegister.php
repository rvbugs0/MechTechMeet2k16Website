<?php
require_once("EventRegistrationDAO.php");
if (isset($_GET["eventId"]) && isset($_GET["mtmId"])) {

try {
	
	$eventRegistrationDAO=new EventRegistrationDAO();
	$eventRegistration=new EventRegistration();
	$eventRegistration->eventId=$_GET["eventId"];
	$eventRegistration->participantId=trim($_GET["mtmId"]);
	$eventRegistrationDAO->register($eventRegistration);
	echo '{"success":true,"message":"registered successfully"}';

} catch (Exception $e) {
		echo '{"success":false,"message":"registeration unsuccessfull"}';	
}

}

?>