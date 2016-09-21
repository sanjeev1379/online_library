<html>
<head>
<title></title>
</head>
<body>
<?php

include "includes/db.php";

$username=$_GET['username'];
$code=$_GET['code'];
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
    $confirmed_database=$row['confirmed'];
    $confirm_code_database=$row['confirm_code'];
  }
  //echo $uid_database;
  if(@($code==$confirm_code_database)){
    @$query="UPDATE `register` SET /*`room_no`='@$room_no' ,*/  `confirmed`='1',`confirm_code`='0' WHERE `username`='$username' ";
    $query_pro=mysqli_query($con,$query);
    if($query_pro){
     header("Location:index.php");
    //header("Location:bill.php?q=$admin&username=".$search_username);
  }
    }
 }
 ?>
</body>
</html>
