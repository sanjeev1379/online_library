<?php

include("includes/db.php");

?>

<?php
require_once 'includes/connection.php';
@$search_reg_no = htmlentities($_GET['user_query']);
@$uemail = htmlentities($_GET['q']);

$result=mysql_query("select * from register where email='$uemail'");
if(!$result)
echo "Error in query.. <br />";
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$name_database=$row['username'];
  }

}

?>
<?php

require 'includes/connection.php';
if(isset($_POST['search'])){
  $search_query = $_POST['user_query'];
  if(!empty($search_query)){
    $result=mysql_query("select * from student_reg where reg_no like '%$search_query%' ");
    if(!$result)
    echo "Error in query.. <br />";
    else {
        header("Location:details_results.php?q=$uemail&user_query=".$search_query);
      }
    }else{
      echo "<script>alert('Please Enter a Valid Search!')</script>";
      echo  "<script>window.open('student_details.php?q=$uemail','_self')</script>";
    }
}
@mysqli_free_result($result);
@mysqli_close($dbh);

?>



<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Library | Student</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width-device-width scale=1.0" />
  <link rel="shortcut icon" href="image/user.png" ></link>
  <link rel="stylesheet" href="css/style.css" ></link>
  <link rel="stylesheet" href="css/circle-hover.css" ></link>
  <link rel="stylesheet" href="css/bootstrap.min.css" ></link>
  <script type="text/javascript" src="js/script.js" ></script>
  <script type="text/javascript" src="js/jquery.min.js" ></script>
  <script type="text/javascript" src="js/bootstrap.min.js" ></script>
  <script type="text/javascript" src="js/jquery.kwicks-1.5.1.js"></script>
</head>
<body onload="document.reg.user_query.focus();">
  <div class="container-fluid" id="bg_1">
    <div id="corner" style="margin-left:90%;inline:block;">
      <a href="home.php?q=<?php echo $uemail ?>"><img src="image/home.png" style="border:solid 1px black;margin-top:1%;" class="img-responsive" width="25%" height="25%" /></a>
      <a href="index.php"><img src="image/logout_1.png" style="border:solid 1px black;margin-top:-25.7%;margin-left:30%;" class="img-responsive" width="25%" height="25%" /></a>
    </div>
    <div class="container" id="bg_1">
      <!--<div id="home" style="float:right;">
        <a href="#"><img src="image/home.jpg" style="border:solid 1px black;margin-top:1%;" class="img-responsive" width="3%" height="3%" /></a>
        <a href="#"><img src="image/logout.png" style="border:solid 1px black;margin-top:1%;" class="img-responsive" width="3%" height="3%" /></a>
      </div>-->
      <center>
           <a href="#"><img src="image/logo.png" style="border-radius:60%;margin-top:3.0%;" class="img-responsive" width="12%" height="12%" /></a>
           <p id="para">Departmental Library</p>
           <p id="para_id">Department of Computer Science & Engineering (CSE)</p>
      </center>
    </div>
    <div class="container"  id="bg_1">
      <nav class="navbar navbar-inverse" id="bg_2" style="width:88.7%;margin-left:5.7%;margin-top:0.4%;">
      <div class="navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav navbar-left" style="margin-left:4%;">
          <li><a id="left" href="student_registation.php?q=<?php echo $uemail ?>">Add new student / member</a></li>
          <li class="active"><a id="left" href="student_details.php?q=<?php echo $uemail ?>">Student details</a></li>
          <li><a id="left" href="student_update.php?q=<?php echo $uemail ?>&r=<?php echo @$search_reg_no ?>">Edit student / member</a></li>
        </ul>
      </div>
</nav>
        <div class="modal-content" style="width:88.5%;margin-top:-1.7%;margin-left:5.8%;" id="bg_form">
          <div class="modal-body">
            <form name="reg" class="form-horizontal" style="margin-left:12%;" action="details_results.php?q=<?php echo $uemail ?>" method="post">
              <div class="form-group">
                <label class="control-label col-sm-2" for="text">Registation no :</label>
                <div class="col-sm-10">
                 <input type="search" name="user_query" class="form-control" id="text" placeholder="Enter Accession no..." style="width:40%;">
                </div>
              </div>
             <div class="form-group" >
                <div class="col-sm-offset-2 col-sm-10" style="margin-top:-5.6%;margin-right:-20%;padding-left:35%;">
                 <input type="submit" name="search" class="btn btn-default" value="Submit" />
                </div>
          </div>
          <hr color="black" />
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Registation no :</label>
      <div class="col-sm-10">
        <p class="form-control-static"></p>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Student Name :</label>
      <div class="col-sm-10">
        <p class="form-control-static"></p>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Session :</label>
      <div class="col-sm-10">
        <p class="form-control-static"></p>
      </div>
    </div>
    <div class="form-group">
<label class="control-label col-sm-2" for="email">Contact :</label>
<div class="col-sm-10">
  <p class="form-control-static"></p>
</div>
</div>
           </form>

    </div>
  </div>
  <center>
         <p id="footer_k">Devloped By</p>
         <p id="footer_id">B.C.E Bhagalpur</p>
         <p id="footer_id">spring - 2010 : Reg # 11022152 : cse</p>
  </center>
</div>
</body>
</html>
