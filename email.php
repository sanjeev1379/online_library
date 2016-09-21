<?php
include("includes/db.php");


if(isset($_POST['send'])){
  $email = htmlentities($_POST['email']);
  if(!empty($email)){
    $result="select * from register where email='$email'";
    $result_run=mysqli_query($con,$result);
    if(!$result_run)
    echo "Error in query.. <br />";
    else {
      while($row=mysqli_fetch_array($result_run,MYSQLI_ASSOC))
      {
        $password_hash_database=$row['password'];
        $username_database=$row['username'];
        $email_database=$row['email'];
          $confirmed_database=$row['confirmed'];
      }
      //echo $uid_database;
      if(@($email==$email_database)){
        //require 'profile.php';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= 'From: Website <onlinelibrary.freevar.com>' . "\r\n";

         $message=
        "
          Username =$username_database;
          Password = $password_hash_database;
         Confirm your Code...<br />
         click to link this below and Login account<br />
         http://onlinelibrary.freevar.com/index.php
         ";

         mail($email,'Your confirm email',$message,$headers);
         header("Location:index.php");
      } else {
        echo "<script>alert('Please Enter a Valid Email Id!')</script>";
        echo  "<script>window.open('email.php','_self')</script>";
      }
    }
  }else{
    echo "<script>alert('All Field are required!')</script>";
    echo  "<script>window.open('email.php','_self')</script>";
  }
}
@mysqli_free_result($result);
@mysqli_close($dbh);


?>


<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Library | Email</title>
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
           <a href="#"><img src="image/logo.png" style="border-radius:50%;margin-top:3.4%;" class="img-responsive" width="12%" height="12%" /></a>
           <p id="para">Departmental Library</p>
           <p id="para_id">Department of Computer Science & Engineering (CSE)</p>
      </center>
    </div>
    <div class="container"  id="bg_1">
      <center><div class="modal-content" style="width:50%;" id="bg_form">
        <p id="middle">REMEMBER !!</p>
        <p id="middle_id">This action is used only to recover your forgetten username & password<br />when you enter the valid address sysyem will send you an email that<br /> contains the username and password otherwise sustem will redirected to<br /> the HOME automatically !!</p>
      <div class="modal-body">
        <form role="form" method="post" action="" enctype="multiplepart/form">
            <div class="form-group">
              <span class='label label-info' id="n">  Enter Valid Email address </span>
              <input type="email" name="email" class="form-control" placeholder="Enter Email..." style="width:70%;"  />
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="send" id="bt" class="btn btn-primary btn-block" value="Submit"  style="width:130%; margin-left:-15%;"/>
      </div>
      </form>
    </div></center>
  </div>
  <center>
         <p id="footer_p">Devloped By</p>
         <p id="footer_id">B.C.E Bhagalpur</p>
         <p id="footer_id">spring - 2010 : Reg # 11022152 : cse</p>
  </center>
</div>
</body>
</html>
