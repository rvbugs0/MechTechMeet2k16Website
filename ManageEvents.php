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
  color: black;
}

</style>
</head><!--/head-->

<body>

<div class="container">
<div class="row">
<div class="col-lg-12">
<h1>Manage Events</h1>
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
<td>Introduction</td>
<td>Coord. Details</td>
<td>Team Description</td>
<td>Category</td>
<td>Options</td>

</tr>
</thead>
<tbody>
<?php
require_once("DAO/CategoryDAO.php");
require_once("DAO/EventDAO.php");
$categoryDAO=new CategoryDAO();
try
{
$eventDAO=new EventDAO();
$events=$eventDAO->getAll();
$x=1;
foreach ($events as $event ) {
echo "<tr>";
echo "<td>".$x."</td>";
echo "<td>".$event->name."</td>";
echo "<td>".$event->description."</td>";
echo "<td><a href='".$event->imageURL."' target='_blank'>Click here to open</a></td>";
echo "<td>".$event->introduction."</td>";
echo "<td>".$event->coordinatorDetails."</td>";
echo "<td>".$event->teamDescription."</td>";


$cat=$categoryDAO->getByCode($event->categoryCode);

echo "<td>".$cat->name."</td>";
echo "<td><a class='btn btn-primary' href='DeleteEvent.php?code=".$event->code."'>Delete</a></td>";
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
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
         <form class="form-horizontal" role="form" method="post"  enctype="multipart/form-data" action="DAO/AddEvent.php">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title black">Add Event</h4>
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
                            <input type="text" class="form-control" name="introduction" placeholder="Introduction">
                        </div>
                     </div>

                    <div class="form-group">
                         <div class="col-sm-offset-1 col-sm-10">
                            <input type="text" class="form-control" name="coordinatorDetails" placeholder="Coordinator Details">
                        </div>
                     </div>
                                         <div class="form-group">
                         <div class="col-sm-offset-1 col-sm-10">
                            <input type="text" class="form-control" name="teamDescription" placeholder="Team Description">
                        </div>
                     </div>
                                         <div class="form-group">
                         <div class="col-sm-offset-1 col-sm-10">
                            <label for="categoryCode">Select a Category</label>
                            <select name="categoryCode" id="categoryCode" class="form-control">
                            <?php
                            try
                            {
                              $categoryDAO=new CategoryDAO();
                              $categories=$categoryDAO->getAll();
                              foreach ($categories as $category) {
                               echo "<option value='".$category->code."'>".$category->name."</option>";
                                }
                            }
                            catch(Exception $e)
                            {

                            }
                            ?>
                             </select>
                        </div>
                     </div>

                     <div class="form-group">
                         <div class="col-sm-offset-1 col-sm-10">
                         <label for="Image">Image</label>
                    <input type="file"  id="image" name="image"  class="form-control" >
                    </div>
                </div>

                <div class="form-group">
                         <div class="col-sm-offset-1 col-sm-10">
                         <label for="pdf">Instructions Document</label>
                    <input type="file"  id="pdf" name="instructionsDocument" class="form-control" >
                    </div>
                </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" value="Save Event" id="submit" name="submit" class="btn btn-primary">
        </div>
      </div><!-- /.modal-content -->
    </div>
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
    <!--/#footer-->
  
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/coundown-timer.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.nav.js"></script>
    <script type="text/javascript" src="js/main.js"></script>  

</body>

</html>
