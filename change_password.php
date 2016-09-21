<?php

include("includes/db.php");

?>

<?php
require_once 'includes/connection.php';

@$uemail = htmlentities($_GET['q']);

$result=mysql_query("select * from register where email='$uemail'");
if(!$result)
echo "Error in query.. <br />";
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$name_database=$row['username'];
    @$email_database=$row['email'];
    @$password_database=$row['password'];
  }

}
?>

<?php
include("includes/db.php");
include("includes/connection.php");


if(isset($_POST['update_register'])){
@$uemail = htmlentities($_GET['q']);
  @$username=$_POST['username'];
  @$email=$_POST['email'];
  @$password=$_POST['password'];
//  @$password_hash=md5($password);

  if(!empty($username)&&!empty($email)&&!empty($password)){
    if(@($password==$password_again_hash)){

      }else{
        //$query="INSERT into bill (bill_name,bill_no,month,date_e,unit_consumed,status) values('$search_username','$bill_no','$month','$date_e','$update_unit_cost','$status')";
        //$query_pro=mysqli_query($con,$query);
        @$query="UPDATE `register` SET /*`room_no`='@$room_no' ,*/  `username`='$username',`email`='$email',`password`='$password' WHERE `email`='$uemail' ";
        $query_pro=mysqli_query($con,$query);
        if($query_pro){
          echo "<script>alert('Student Information Is Successfully Updated! Please Login')</script>";
          echo  "<script>window.open('index.php','_self')</script>";
        //header("Location:bill.php?q=$admin&username=".$search_username);
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
   }
  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('change_password.php?q=$uemail','_self')</script>";
  }
}

?>



<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Library | Password</title>
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
<body>
  <div class="container-fluid" id="bg_1">
    <div id="corner" style="margin-left:90%;inline:block;">
      <a href="home.php?q=<?php echo $uemail ?>"><img src="image/home.png" style="border:solid 1px black;margin-top:1%;" class="img-responsive" width="25%" height="25%" /></a>
      <a href="index.php"><img src="image/logout_1.png" style="border:solid 1px black;margin-top:-25.7%;margin-left:30%;" class="img-responsive" width="25%" height="25%" /></a>
    </div>
    <div class="container" id="bg_1">
      <center>
           <a href="#"><img src="image/logo.png" style="border-radius:50%;margin-top:4%;" class="img-responsive" width="12%" height="12%" /></a>
           <p id="para">Departmental Library</p>
           <p id="para_id">Department of Computer Science & Engineering (CSE)</p>
      </center>
    </div>
    <div class="container"  id="bg_1">
      <center><div class="modal-content" style="width:35%;margin-left:-38%;" id="bg_form">
      <div class="modal-body">
        <form role="form" method="post" action="" enctype="multiplepart/form">
          <div class="form-group">
              <span class='label label-info' id="n">  Enter Current Password </span>
              <input type="password" name="consumer" class="form-control" placeholder="Enter Username..." style="width:90%;"  />
            </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Enter New Password </span>
              <input type="text" name="consumer" class="form-control" placeholder="Enter Password..." style="width:90%;"  />
            </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Confirm New Password </span>
              <input type="text" name="consumer" class="form-control" placeholder="Enter Password..." style="width:90%;"  />
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="submit_feedback" id="bt" class="btn btn-primary btn-block" value="Update"  style="width:172%; margin-left:-36%;"/>
      </div>
      </form>
    </div></center>
    <center>
      <div class="modal-content" style="width:35%;margin-left:39%;margin-top:-28.5%;" id="bg_form" style="float:right;">
    <div class="modal-body">
      <form role="form" method="post" action="" enctype="multiplepart/form">
        <div class="form-group">
            <span class='label label-info' id="n">  Username </span>
            <input type="text" name="username" class="form-control" value="<?php echo @$name_database ?>" style="width:90%;"  />
          </div>
          <div class="form-group">
            <span class='label label-info' id="n">  Email </span>
            <input type="email" name="email" class="form-control" value="<?php echo @$email_database ?>" style="width:90%;"  />
          </div>
          <div class="form-group">
            <span class='label label-info' id="n">  Enter Current Password </span>
            <input type="password" name="password" class="form-control" placeholder="Enter Password..." style="width:90%;"  />
          </div>
    </div>
    <div class="modal-footer">
      <input type="submit" name="update_register" id="bt" class="btn btn-primary btn-block" value="Update"  style="width:170%; margin-left:-36%;"/>
    </div>
    </form>
  </div>
</center>
  </div>
  <center>
         <p id="footer">Devloped By</p>
         <p id="footer_id">B.C.E Bhagalpur</p>
         <p id="footer_id">spring - 2010 : Reg # 11022152 : cse</p>
  </center>
</div>
</body>
</html>
