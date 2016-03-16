<?php
require_once("DAO/functions.php");
if(!checkSession())
{
redirect_to("index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
include_once("head.php");

?>
<style type="text/css">

body
{
  color:black;
} 

  a:hover
  {
    color:red;
  }
table
{
  height: 100px;
  overflow: scroll;
}

</style>
</head><!--/head-->

<body>

<div id="manage-category">
<div class="container">

<h1>Manage Categories</h1>
<br/>
<a href="AdminHome.php" class="btn btn-primary">Admin Home</a><br/>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add </button><br/><br/>
<table class="table table-responsive">
<thead>
<tr>
<td>S.No.</td>
<td>Name</td>
<td>Description</td>
<td>Image</td>
<td>Options</td>
</tr>
</thead>
<tbody>
<?php
require_once("DAO/CategoryDAO.php");
try
{
$CategoryDAO=new CategoryDAO();
$categories=$CategoryDAO->getAll();
$x=1;
foreach ($categories as $category ) {
echo "<tr>";
echo "<td>".$x."</td>";
echo "<td>".$category->name."</td>";
echo "<td>".$category->description."</td>";
echo "<td><a href='".$category->imageURL."' target='_blank'>Click here to open</a></td>";
echo "<td><a class='btn btn-primary' href='DeleteCategory.php?code=".$category->code."'>Delete</a></td>";
$x++;
echo "</tr>";
}

}
catch(Exception $e)
{
echo $e->getMessage();
}

?>
</tbody>
</table>
</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
         <form class="form-horizontal" role="form" method="post"  enctype="multipart/form-data" action="DAO/AddCategory.php">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title black">Add Category</h4>
            </div>
            <div class="modal-body">
                    <div class="form-group">

                        <div class="col-sm-offset-1 col-sm-10">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                        </div>
                     </div>

                    <div class="form-group">
                         <div class="col-sm-offset-1 col-sm-10">
                            <input type="text" class="form-control" name="description" placeholder="Description">
                        </div>
                     </div>



                     <div class="form-group">
                         <div class="col-sm-offset-1 col-sm-10">
                    <input type="file"  id="image" name="image" class="form-control" >
                    </div>
                </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" value="Save Category" id="submit" name="submit" class="btn btn-primary">
        </div>
      </div><!-- /.modal-content -->
    </div>
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
    <!--/#footer-->
  
      <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="js/backstretch.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  

<script>
 

  $(document).ready(function () {
    "use strict";
    

    /* BG IMAGE */
    if (jQuery(window).width() > 1024) {
        /* PCs,Desktops etc. */
       // $('body').backstretch("images/bg2.png",{fade:1000});
      
      }
    else {
        /* Mobile Devices */
        jQuery('body').backstretch("images/photos/bg-small.jpg");
    }

});    
   </script>

</body>

</html>
