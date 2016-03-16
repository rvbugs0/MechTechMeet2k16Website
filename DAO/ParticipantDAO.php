<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once("DAOException.php");
require_once("DatabaseConnection.php");
require_once("Participant.php");

	class ParticipantDAO
{

	public function addParticipant($participant)
	{

		try
		{

			if(self::exists($participant)==false)
			{
			$c=DatabaseConnection::getConnection();
			$ps=$c->prepare("insert into participant (name,email,age,phone,college,address,participant_id,gender) values (?,?,?,?,?,?,?,?)");
			$partId="MTM-2K16-".substr(uniqid(rand()),0,5);
			$ps->bindParam(1,$participant->name);
			$ps->bindParam(2,$participant->email);
			$ps->bindParam(3,$participant->age);
			$ps->bindParam(4,$participant->phone);
			$ps->bindParam(5,$participant->college);
			$ps->bindParam(6,$participant->address);
			$ps->bindParam(7,$partId);
			$ps->bindParam(8,$participant->gender);
			$participant->participantId=$partId;
			$ps->execute();
			$to = $participant->email; // this is your Email address
			$from = "donotreply@mechtechmeet.in"; // this is the sender's Email address
			$subject = "Mech Tech Meet - 2K16 Registration";
			$message = "Hello , ".$participant->name."  you have successfully registered on the MECH TECH MEET Website, \n\n Here is your MTM-ID : ".$partId ;
			$headers = "From:" . $from;
			mail($to,$subject,$message,$headers);
			$ps=null;
			$c=null;
			}
			else
			{
			$tempParticipant=self::getParticipantByEmail($participant->email);
			$to = $participant->email; // this is your Email address
			$from = "donotreply@mechtechmeet.in"; // this is the sender's Email address
			$subject = "Mech Tech Meet - 2K16 Registration";
			$message = "Hello , ".$tempParticipant->name."   Here is your MTM-ID : ".$tempParticipant->participantId ;
			$headers = "From:" . $from;
			mail($to,$subject,$message,$headers);
				throw new DAOException("You are already Registered with us , we have sent you an email with your MTM-ID");
			}


		}catch(Exception $e)
		{
			throw new DAOException($e->getMessage());
		}

	}


	public function exists($participant)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from participant where email = '".$participant->email."' or phone = '".$participant->phone."'");
			$x=0;
			foreach($rs as $row)
			{
				$participant->participantId=$row["participant_id"];
				
				$x++;
			}
			if($x>0)
			{
				return true;
			}


			return false;	
			$c=null;
		}
		catch(Exception $exception)
		{
			throw new DAOException("ParticipantDAO : exists() -->".$exception->getMessage());
		}

	}



		public function deleteParticipant($code)
	{
		try
		{

		}catch(Exception $e)
		{
			throw new DAOException("ParticipantDAO delete() ".$e->getMessage());
		}

	}


		public function getAll()
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from participant");
			$participants=[];
			$x=0;
			foreach ($rs as $row) {
			$participant=new Participant();
			$participant->name=$row["name"];
			$participant->gender=$row["gender"];
			$participant->age=$row["age"];
			$participant->phone=$row["phone"];
			$participant->email=$row["email"];
			$participant->college=$row["college"];
			$participant->address=$row["address"];
			$participant->code=$row["code"];
			$participant->participantId=$row["participant_id"];
			
			$participants[$x]=$participant;
			$x++;
			}
			$rs=null;
			$c=null;
			return $participants;
		}catch(Exception $e)
		{
			throw new DAOException("ParticipantDAO getAll() ".$e->getMessage());
		}

	}


	public function getParticipantByEmail($email)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from participant where email= '".$email."'");
			$participant=new Participant();
			$x=0;
			foreach ($rs as $row) {
			$participant->gender=$row["gender"];
			$participant->name=$row["name"];
			$participant->age=$row["age"];
			$participant->phone=$row["phone"];
			$participant->email=$row["email"];
			$participant->college=$row["college"];
			$participant->address=$row["address"];
			$participant->code=$row["code"];
			$participant->participantId=$row["participant_id"];
			
			$x++;
			}
			$rs=null;
			$c=null;
			return $participant;
		}catch(Exception $e)
		{
			throw new DAOException("ParticipantDAO getParticipantByEmail() ".$e->getMessage());
		}

	}





}


?>
