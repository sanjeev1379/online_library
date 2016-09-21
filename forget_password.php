<?php
include("includes/db.php");


if(isset($_POST['user'])){
  $username = htmlentities($_POST['username']);
  $password = htmlentities($_POST['password']);
  //$password_hash=md5($password);
  if(!empty($username)&&!empty($password)){
    $result="select * from register where username='$username'";
    $result_run=mysqli_query($con,$result);
    if(!$result_run)
    echo "Error in query.. <br />";
    else {
      while($row=mysqli_fetch_array($result_run,MYSQLI_ASSOC))
      {
        $password_hash_database=$row['password'];
        $username_database=$row['username'];
        $email_database=$row['email'];
      }
      //echo $uid_database;
      if(@($username==$username_database)&&($password==$password_hash_database)){
        //require 'profile.php';
        header("Location:home.php?q=".$email_database);
      } else {
        echo "<script>alert('Please Enter a Correct Username and Password!')</script>";
        echo  "<script>window.open('forget_password.php','_self')</script>";
      }
    }
  }else{
    echo "<script>alert('All Field are required!')</script>";
    echo  "<script>window.open('forget_password.php','_self')</script>";
  }
}
@mysqli_free_result($result);
@mysqli_close($dbh);


?>


<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Library | Home</title>
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
    <div class="container" id="bg_1">
      <center>
           <a href="#"><img src="image/logo.png" style="border-radius:50%;margin-top:4%;" class="img-responsive" width="12%" height="12%" /></a>
           <p id="para">Departmental Library</p>
           <p id="para_id">Department of Computer Science & Engineering (CSE)</p>
      </center>
    </div>
    <div class="container"  id="bg_1">
      <center><div class="modal-content" style="width:45%;" id="bg_form">
      <div class="modal-body">
        <form role="form" method="post" action="" enctype="multiplepart/form">
          <div class="form-group">
              <span class='label label-info' id="n">  Username </span>
              <input type="text" name="username" class="form-control" placeholder="Enter Username..." style="width:55%;"  />
            </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Password </span>
              <input type="password" name="password" class="form-control" placeholder="Enter Password..." style="width:55%;"  />
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="user" id="bt" class="btn btn-primary btn-block" value="Submit"  style="width:100%; margin-left:%;"/>
      </div>
      </form>
      <a href="register.php" id="new" style="">New User ! Register?</a> <a href="email.php" id="new" style="margin-left:10%">Forgetted Password?</a>
    </div></center>
  </div>
  <center>
         <p id="footer">Devloped By</p>
         <p id="footer_id">B.C.E Bhagalpur</p>
         <p id="footer_id">spring - 2010 : Reg # 11022152 : cse</p>
  </center>
</div>
</body>
</html>
