<?php

require_once("DatabaseConnection.php");
require_once("EventDAO.php");
require_once("functions.php");  
    

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_FILES["image"]) &&
isset($_POST["teamDescription"]) && isset($_POST["introduction"]) &&
isset($_POST["coordinatorDetails"]) && isset($_POST["categoryCode"])
&& isset($_FILES["instructionsDocument"])
    )
{

    try
    {
        $event=new Event();
        $event->name=trim($_POST["name"]);
        $event->teamDescription=trim($_POST["teamDescription"]);
        $event->introduction=trim($_POST["introduction"]);
        $event->coordinatorDetails=trim($_POST["coordinatorDetails"]);
        $event->description=trim($_POST["description"]);
        $event->categoryCode=trim($_POST["categoryCode"]);

        $target_dir = "img/albums/event_images/";
        $target_address = $target_dir .uniqid(rand()) .basename($_FILES["image"]["name"]);

        $target_file= "../".$target_address;


$target_address2 = $target_dir .uniqid(rand()) .basename($_FILES["instructionsDocument"]["name"]);        
$target_file2= "../".$target_address2;
$pdfFileType = pathinfo($target_file2,PATHINFO_EXTENSION);



if($pdfFileType != "pdf" && $pdfFileType != "doc" && $pdfFileType != "docx" ) 
{
echo "Invalid Instruction Document Format";
return;
}


$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {

        $uploadOk = 1;
    } else {
            echo "Invalid Image Format";
              
        $uploadOk = 0;
        return;
    }
}





// Check file size
if ($_FILES["image"]["size"] > 500000) {
    echo "Image size not allowed ";
    $uploadOk = 0;
    return;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Invalid image type";
    $uploadOk = 0;
    return;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Cannot upload : Errors in the process";
// if everything is ok, try to upload file
} else {



    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["instructionsDocument"]["tmp_name"], $target_file2)) 
    {
        try {

                $event->imageURL=$target_address;
                $event->instructionsDocument=$target_address2;    
                  $eventDAO = new EventDAO();
                  $eventDAO->addEvent($event);  
                  redirect_to("../ManageEvents.php");
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