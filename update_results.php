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
        header("Location:update_results.php?q=$uemail&user_query=".$search_query);
      }
    }else{
      echo "<script>alert('Please Enter a Valid Search!')</script>";
      echo  "<script>window.open('student_update.php?q=$uemail','_self')</script>";
    }
}
@mysqli_free_result($result);
@mysqli_close($dbh);

?>
<?php
include("includes/db.php");
include("includes/connection.php");


if(isset($_POST['update'])){

@$search_reg_no = htmlentities($_GET['user_query']);
  @$std_name=$_POST['std_name'];
  @$session=$_POST['session'];
  @$mobile_no=$_POST['mobile_no'];

  if(!empty($std_name)&&!empty($mobile_no)){
    if(@($password_hash!=$password_again_hash)){

      }else{
        //$query="INSERT into bill (bill_name,bill_no,month,date_e,unit_consumed,status) values('$search_username','$bill_no','$month','$date_e','$update_unit_cost','$status')";
        //$query_pro=mysqli_query($con,$query);
        @$query="UPDATE `student_reg` SET /*`room_no`='@$room_no' ,*/  `std_name`='$std_name',`session`='$session',`mobile_no`='$mobile_no' WHERE `reg_no`='$search_reg_no' ";
        $query_pro=mysqli_query($con,$query);
        if($query_pro){
          echo "<script>alert('Student Information Is Successfully Updated!')</script>";
          echo  "<script>window.open('student_details.php?q=$uemail&r=$search_reg_no','_self')</script>";
        //header("Location:bill.php?q=$admin&username=".$search_username);
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
   }
  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('update_results.php?q=$uemail&user_query=$search_reg_no','_self')</script>";
  }
}

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
          <li><a id="left" href="student_details.php?q=<?php echo $uemail ?>&r=<?php echo $search_reg_no ?>">Student details</a></li>
          <li class="active"><a id="left" href="student_update.php?q=<?php echo $uemail ?>&r=<?php echo $search_reg_no ?>">Edit student / member</a></li>
        </ul>
      </div>
</nav>
        <div class="modal-content" style="width:88.5%;margin-top:-1.7%;margin-left:5.8%;" id="bg_form">
          <div class="modal-body">
           <?php
           @$search_accession_query=htmlentities($_GET['user_query']);

           ?>
            <form name="reg" class="form-horizontal" style="margin-left:12%;" method="POST" action="update_results.php?q=<?php echo $uemail ?>" >
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Registation no :</label>
                <div class="col-sm-10">
                 <input type="search" name="user_query" class="form-control" id="pwd" value="<?php echo @$search_accession_query ?>" style="width:40%;">
                </div>
              </div>
             <div class="form-group" >
                <div class="col-sm-offset-2 col-sm-10" style="margin-top:-5.6%;margin-right:-20%;padding-left:35%;">
                 <input type="submit" name="search" class="btn btn-default" value="Search" />
                </div>
          </div>
          </form>
          <?php

          $con=mysqli_connect("localhost","1028045","gate2017","1028045");

         if(mysqli_connect_errno()){

          echo "Field to connect to Mysql:" .mysqli_connect_error();

       }

      global $con;

      @$search_reg_no = htmlentities($_GET['user_query']);

        $get_pro="select * from student_reg where reg_no LIKE '%$search_reg_no' ";
        $run_pro=mysqli_query($con,$get_pro);

            while($row_pro=mysqli_fetch_array($run_pro)){
  //$pro_student_id=$row_pro['student_id'];
               @$pro_reg_no=$row_pro['reg_no'];
               @$pro_std_name=$row_pro['std_name'];
               @$pro_session=$row_pro['session'];
               @$pro_mobile_no=$row_pro['mobile_no'];
             }
         ?>
          <hr color="black" />

          <form class="form-horizontal" style="margin-left:12%;" method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Student's Name :</label>
            <div class="col-sm-10">
             <input type="text" name="std_name" class="form-control" id="pwd" value="<?php echo @$pro_std_name ?>" style="width:40%;">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Session :</label>
            <div class="col-sm-10">
              <select class="form-control" id="sel1" name="session" value="<?php echo @$pro_session ?>" style="width:40%;">
           <option><?php echo @$pro_session ?></option>
           <option >2010-2014</option>
           <option>2011-2015</option>
           <option >2012-2016</option>
           <option>2013-2017</option>
           <option >2014-2018</option>
           <option>2015-2019</option>
           <option >2016-2020</option>
           <option>2017-2021</option>
           <option >2018-2022</option>
           <option>2019-2023</option>
           <option >2020-2024</option>
         </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Contact no :</label>
            <div class="col-sm-10">
             <input type="text" name="mobile_no" class="form-control" id="pwd" value="<?php echo @$pro_mobile_no ?>" style="width:40%;">
            </div>
          </div>
         <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
             <input type="submit" name="update" class="btn btn-default" value="Update" />
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
