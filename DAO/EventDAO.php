<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once("DAOException.php");
require_once("DatabaseConnection.php");
require_once("Event.php");

class EventDAO
{

				public function existsByCode($code)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from event where code = ".$code);
			$x=0;
			foreach($rs as $row)
			{
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
			throw new DAOException("EventDAO : existsByCode() -->".$exception->getMessage());
		}

	}


	public function addEvent($event)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$ps=$c->prepare("insert into event (name,introduction,description,coordinator_details,team_description,category_code,image_url,instructions_document) values (?,?,?,?,?,?,?,?)");
			$ps->bindParam(1,$event->name);
			$ps->bindParam(2,$event->introduction);
			$ps->bindParam(3,$event->description);
			$ps->bindParam(4,$event->coordinatorDetails);
			$ps->bindParam(5,$event->teamDescription);
			$ps->bindParam(6,$event->categoryCode);
			$ps->bindParam(7,$event->imageURL);
			$ps->bindParam(8,$event->instructionsDocument);
			$ps->execute();
			$event->code=$c->lastInsertId('code');
			mkdir("../img/albums/event_".$event->code."_images");
			$ps=null;
			$c=null;

		}
		catch(Exception $exception)
		{
			throw new DAOException("EventDAO : addEvent() -->".$exception->getMessage());
		}
	}

	public function updateEvent($event)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$ps=$c->prepare("update event set name=?,introduction=?,description=?,coordinator_details=?,
				team_description=?,category_code=? , image_url=?,instructions_document=? where code= ?");
			$ps->bindParam(1,$event->name);
			$ps->bindParam(2,$event->introduction);
			$ps->bindParam(3,$event->description);
			$ps->bindParam(4,$event->coordinatorDetails);
			$ps->bindParam(5,$event->teamDescription);
			$ps->bindParam(6,$event->categoryCode);
			$ps->bindParam(7,$event->imageURL);
			$ps->bindParam(8,$event->instructionsDocument);
			$ps->bindParam(9,$event->code);
			$ps->execute();
			$ps=null;
			$c=null;

		}
		catch(Exception $exception)
		{
			throw new DAOException("EventDAO : updateEvent() -->".$exception->getMessage());
		}
	}

	public function getAll()
	{
			 $images;
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from event");
			$events=[];
			$x=0;
			foreach ($rs as $row) {
			$event=new Event();
			$event->name=$row["name"];
			$event->introduction=$row["introduction"];
			$event->description=$row["description"];
			$event->coordinatorDetails=$row["coordinator_details"];
			$event->teamDescription=$row["team_description"];
			$event->categoryCode=$row["category_code"];
			$event->code=$row["code"];
			$event->imageURL=$row["image_url"];
			$event->instructionsDocument=$row["instructions_document"];
			$images=array();
			$y=0;
			foreach(glob('../img/albums/event_'.$event->code.'_images/*.*') as $file) {
			$images[$y]=$file;
			$y++;
			}
			$event->images=$images;
			
			$events[$x]=$event;
			$x++;
			}
			$rs=null;
			$c=null;
			return $events;
		}
		catch(Exception $exception)
		{
			throw new DAOException("EventDAO : getAll() -->".$exception->getMessage());
		}
	}


	public function getByCode($code)
	{
			 $images;
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from event where code = ".$code);
			
			$x=0;
			foreach ($rs as $row) {
			$event=new Event();
			$event->name=$row["name"];
			$event->introduction=$row["introduction"];
			$event->description=$row["description"];
			$event->coordinatorDetails=$row["coordinator_details"];
			$event->teamDescription=$row["team_description"];
			$event->categoryCode=$row["category_code"];
			$event->code=$row["code"];
			$event->instructionsDocument=$row["instructions_document"];
			$event->imageURL=$row["image_url"];
			$images=array();
			$y=0;
			foreach(glob('../img/albums/event_'.$event->code.'_images/*.*') as $file) {
			$images[$y]=$file;
			$y++;
			}
			$event->images=$images;
			$x++;
			}
			$rs=null;
			$c=null;
			return $event;
		}
		catch(Exception $exception)
		{
			throw new DAOException("EventDAO : getByCode() -->".$exception->getMessage());
		}
	}


public function getAllByCategoryCode($categoryCode)
	{
 $images;
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from event where category_code= ".$categoryCode);
			$events=array();
			$x=0;
			foreach ($rs as $row) {
			$event=new Event();
			$event->imageURL=$row["image_url"];
			$event->name=$row["name"];
			$event->instructionsDocument=$row["instructions_document"];
			$event->introduction=$row["introduction"];
			$event->description=$row["description"];
			$event->coordinatorDetails=$row["coordinator_details"];
			$event->teamDescription=$row["team_description"];
			$event->categoryCode=$row["category_code"];
			$event->code=$row["code"];
			$images=array();
			$y=0;
			foreach(glob('../img/albums/event_'.$event->code.'_images/*.*') as $file) {
			$images[$y]=$file;
			$y++;
			}
			$event->images=$images;
			$events[$x]=$event;
			$x++;
			}
			$rs=null;
			$c=null;
			return $events;
		}
		catch(Exception $exception)
		{
			throw new DAOException("EventDAO : getAllByCategoryCode() -->".$exception->getMessage());
		}
	}


	public function deleteEvent($code)
	{
		try
		{
			$eve=self::getByCode($code);
			unlink($eve->imageURL);
			unlink($eve->instructionsDocument);
			$c=DatabaseConnection::getConnection();
			$ps=$c->prepare("delete from event where code = ?");
			$ps->bindParam(1,$code);
			$ps->execute();
			$imagesDirectory="../img/albums/event_".$code."_images"; 
			//self::deleteDir($imagesDirectory);
			$ps=null;
			$c=null;
		}
		catch(Exception $exception)
		{
			throw new DAOException("EventDAO : deleteEvent() -->".$exception->getMessage());
		}

	}


	public static function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}




}
?>