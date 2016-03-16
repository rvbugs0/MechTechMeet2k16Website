<?php

require_once("Admin.php");
require_once("DatabaseConnection.php");
require_once("DAOException.php");


class AdminDAO
{

	public function addAdmin($admin)
	{
		try
		{
			$valid= false;

			try
			{
			$temp=self::getByUsername($admin->username);				
			$valid=false;
			}
			catch(DAOException $e)
			{
				$valid=true;
			}
			if($valid==false)
			{
				throw new DAOException("Username : ".$admin->username." not available");
				
			}

			$c=DatabaseConnection::getConnection();
			$ps=$c->prepare("insert into admin (name ,username,password) values (?,?,md5(?))");
			$ps->bindParam(1,$admin->name);
			$ps->bindParam(2,$admin->username);
			$ps->bindParam(3,$admin->password);
			$ps->execute();
			$ps=null;
			$c=null;

		}
		catch(Exception $e)
		{
		throw new DAOException("AdminDAO : add() ".$e->getMessage());

		}
	}





	public function validate($admin)
	{
		try
		{
			$adminTemp=self::getByUsername($admin->username);
			if(strcmp($adminTemp->password,md5($admin->password))==0)
			{
				return true;
			}
		return false;	
		}
		catch(Exception $e)
		{
			return false;
			//throw new DAOException("AdminDAO : validate()")

		}
	}


		public function getByUsername($username)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from admin where username ='".$username."'");
			$admin=new Admin();
			$x=0;
			foreach ($rs as $row) {
				$admin->code=$row["code"];
				$admin->name=$row["name"];
				$admin->username=$row["username"];
				$admin->password=$row["password"];
				$x++;
			}
			$rs=null;
			$c=null;

			if($x==0)
			{
				throw new DAOException("No admin with given username");
				
			}
			return $admin;

		}
		catch(Exception $e)
		{
			throw new DAOException("AdminDAO : validate() ".$e->getMessage());
		}
	}


			public function getCount()
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select count(*) as cnt from admin");
			$count=0;
			foreach ($rs as $row) {
			$count=$row["cnt"];
			}
			$rs=null;
			$c=null;

			return $count;

		}
		catch(Exception $e)
		{
			throw new DAOException("AdminDAO : getCount() ".$e->getMessage());
		}
	}
}

?>