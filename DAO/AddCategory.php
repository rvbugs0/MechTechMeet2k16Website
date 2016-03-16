<?php
require_once("DatabaseConnection.php");
require_once("CategoryDAO.php");
require_once("functions.php"); 	
 	

if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_FILES["image"]))
{


	try
	{
		$category=new Category();
		$category->name=trim($_POST["name"]);
		$category->description=trim($_POST["description"]);
		$target_dir = "img/categories/";



$target_address = $target_dir .uniqid(rand()) .basename($_FILES["image"]["name"]);
$target_file= "../".$target_address;


$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {

        $uploadOk = 1;
    } else {
	        echo "{\"success\":false}";
        $uploadOk = 0;
    }
}


// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "{\"success\":false}";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "{\"success\":false}";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "{\"success\":false}";
// if everything is ok, try to upload file
} else {



    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
    {
        try {

        		$category->imageURL=$target_address;	
                  $categoryDAO = new CategoryDAO();
                  $categoryDAO->addCategory($category);  
				  redirect_to("../ManageCategories.php");
				  //echo "{\"success\":true}";                        

                } catch (Exception $e) {
		           echo "{\"success\":false}";
                }        

		} else {
echo "{\"success\":false}";
    }

}
	}




catch(Exception $exception)
{
	echo "{\"success\":false}";
}
}


?>