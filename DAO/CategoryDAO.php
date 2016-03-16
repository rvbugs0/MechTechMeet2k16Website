<?php


ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once("DAOException.php");
require_once("DatabaseConnection.php");
require_once("Category.php");

 class CategoryDAO
{
	public function addCategory($category)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$ps=$c->prepare("insert into category (name,description ,image_url) values (?,?,?)");
			$ps->bindParam(1,$category->name);
			$ps->bindParam(2,$category->description);
			$ps->bindParam(3,$category->imageURL);
			$ps->execute();
			$category->code=$c->lastInsertId('code');
			$ps=null;
			$c=null;
		}
		catch(Exception $exception)
		{
			
			throw new DAOException("CategoryDAO : addCategory() -->".$exception->getMessage());
		}

	}


		public function updateCategory($category)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$ps=$c->prepare("update category set name=?,description=? ,image_url=? where code =?");
			$ps->bindParam(1,$category->name);
			$ps->bindParam(2,$category->description);
			$ps->bindParam(3,$category->imageURL);
			$ps->bindParam(4,$category->code);
			$ps->execute();
			$ps=null;
			$c=null;
		}
		catch(Exception $exception)
		{
			throw new DAOException("CategoryDAO : updateCategory() -->".$exception->getMessage());
		}

	}

		public function deleteCategory($code)
	{
		try
		{
			$cat=self::getByCode($code);
			unlink($cat->imageURL);
			$c=DatabaseConnection::getConnection();
			$ps=$c->prepare("delete from category where code = ?");
			$ps->bindParam(1,$code);
			$ps->execute();
			$ps=null;
			$c=null;
		}
		catch(Exception $exception)
		{
			throw new DAOException("CategoryDAO : deleteCategory() -->".$exception->getMessage());
		}

	}


			public function getAll()
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from category");
			$categories=  array();
			foreach($rs as $row)
			{
			$category=new Category();
			$category->code=$row["code"];
			$category->name=$row["name"];
			$category->imageURL=$row["image_url"];
			$category->description=$row["description"];
			array_push($categories, $category);		
			}	
			$c=null;
		return $categories;
		}
		catch(Exception $exception)
		{
			throw new DAOException("CategoryDAO : getAll() -->".$exception->getMessage());
		}

	}

			public function getByCode($code)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from category where code =".$code );
			$category="";
			foreach($rs as $row)
			{
			$category=new Category();
			$category->code=$row["code"];
			$category->name=$row["name"];
			$category->imageURL=$row["image_url"];
			$category->description=$row["description"];
			}	
			$c=null;
		return $category;
		}
		catch(Exception $exception)
		{
			throw new DAOException("CategoryDAO : getByCode() -->".$exception->getMessage());
		}

	}

				public function existsByCode($code)
	{
		try
		{
			$c=DatabaseConnection::getConnection();
			$rs=$c->query("select * from category where code = ".$code);
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
			throw new DAOException("CategoryDAO : existsByCode() -->".$exception->getMessage());
		}

	}


}



?>