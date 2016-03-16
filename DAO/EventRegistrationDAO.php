<?php
require_once("DatabaseConnection.php");
require_once("DAOException.php");

require_once("EventRegistration.php");

class EventRegistrationDAO
{
	public function register($eventRegistration)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$ps=$c->prepare("insert into registrations (participant_id,event_id) values(?,?)");
			$ps->bindParam(1,$eventRegistration->participantId);
			$ps->bindParam(2,$eventRegistration->eventId);
			$ps->execute();
			$ps=null;
			$c=null;
		}catch(Exception $e)
		{
			throw new DAOException("EventRegistrationDAO : register() ".$e->getMessage());
		}

	}


	public function getAll()
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from registrations");
			$registrations=[];
			$x=0;
			foreach ($rs as $row) {
			$eventRegistration=new EventRegistration();
			$eventRegistration->code=$row["code"];
			$eventRegistration->participantId=$row["participant_id"];
			$eventRegistration->eventId=$row["event_id"];
			$registrations[$x]=$eventRegistration;
			$x++;
			}
			$rs=null;
			$c=null;
			return $registrations;
			}catch(Exception $e)
		{
			throw new DAOException("EventRegistrationDAO : getAll() ".$e->getMessage());
		}

	}


	public function getAllByEventCode($code)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from registrations where event_id = ".$code);
			$registrations=[];
			$x=0;
			foreach ($rs as $row) {
			$eventRegistration=new EventRegistration();
			$eventRegistration->code=$row["code"];
			$eventRegistration->participantId=$row["participant_id"];
			$eventRegistration->eventId=$row["event_id"];
			$registrations[$x]=$eventRegistration;
			$x++;
			}
			$rs=null;
			$c=null;
			return $registrations;
			}catch(Exception $e)
		{
			throw new DAOException("EventRegistrationDAO : getAllByEventCode() ".$e->getMessage());
		}

	}
}

?>