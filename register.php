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
  }

}

?>
<?php
include("includes/db.php");
include("includes/connection.php");


if(isset($_POST['register'])){

  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
//  $password_hash=md5($password);

  if(!empty($username)&&!empty($password)&&!empty($email)){
    if(@($password==$password_again_hash)){

      }else{
          $confirmcode=rand();
      $query="INSERT into register (username,email,password,confirmed,confirm_code) values('$username','$email','$password','0','$confirmcode')";
      $query_pro=mysqli_query($con,$query);
      if($query_pro){
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= 'From: Website <onlinelibrary.freevar.com>' . "\r\n";

         $message=
        "
          Username =$username;
          Password = $password;
         Confirm your Code...<br />
         click to link this below and verifey account<br />
         http://onlinelibrary.freevar.com/confirm_email.php?username=$username&code=$confirmcode
         ";

         mail($email,'Your confirm email',$message,$headers);

        echo "<script>alert('Thanku! you are successfully Registerd! Please Conform your Account ')</script>";
        echo  "<script>window.open('index.php','_self')</script>";
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
   }
  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('register.php','_self')</script>";
  }
}

?>


<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Library | Register</title>
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
                <span class='label label-info' id="n">  Email </span>
                <input type="text" name="email" class="form-control" placeholder="Enter Email..." style="width:55%;"  />
              </div>
            <div class="form-group">
              <span class='label label-info' id="n">  Password </span>
              <input type="password" name="password" class="form-control" placeholder="Enter Password..." style="width:55%;"  />
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="register" id="bt" class="btn btn-primary btn-block" value="Register"  style="width:100%; margin-left:%;"/>
      </div>
      </form>
      <a href="index.php" id="new" style="">Already Register ! Login</a>
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
