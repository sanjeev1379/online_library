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
    <div id="corner" style="margin-left:90%;inline:block;">
      <a href="home.php?q=<?php echo $uemail ?>"><img src="image/home.png" style="border:solid 1px black;margin-top:1%;" class="img-responsive" width="25%" height="25%" /></a>
      <a href="index.php"><img src="image/logout_1.png" style="border:solid 1px black;margin-top:-25.7%;margin-left:30%;" class="img-responsive" width="25%" height="25%" /></a>
    </div>
    <div class="container" id="bg_1">
      <center>
           <a href="#"><img src="image/logo.png" style="border-radius:60%;margin-top:3.0%;" class="img-responsive" width="12%" height="12%" /></a>
           <p id="para">Departmental Library</p>
           <p id="para_id">Department of Computer Science & Engineering (CSE)</p>
      </center>
    </div>
    <div class="container"  id="bg_1">
      <center>
        <div class="modal-content" id="bg_form">
          <table class="table q">
            <thead>
              <tr>
                <td id="k"style="color:black;"><a href="student_registation.php?q=<?php echo $uemail ?>"><img id="user_image" src="image/logo1.png" style="margin-top:3.4%;margin-left:22%;" class="img-responsive" width="70%" height="70%" /></a></td>
                <td id="k" style="color:black;"><a href="book_add.php?q=<?php echo $uemail ?>"><img id="user_image" src="image/logo2.png" style="margin-top:3.4%;margin-left:18%;" class="img-responsive" width="38%" height="46%" /></a></td>
                <td id="k" style="color:black;"><a href="search_accession.php?q=<?php echo $uemail ?>"><img id="user_image" src="image/logo3.png" style="margin-top:3.4%;margin-left:-50%;" class="img-responsive" width="95%" height="85%" /></a></td>
                <td id="k" style="color:black;"><a href="borrow_book.php?q=<?php echo $uemail ?>"><img id="user_image" src="image/logo4.png" style="margin-top:3.4%;margin-left:-2%;" class="img-responsive" width="58%" height="58%" /></a></td>
                <td id="k" style="color:black;"><a href="change_password.php?q=<?php echo $uemail ?>"><img id="user_image" src="image/logo5.png" style="margin-top:3.4%;margin-left:-15%;" class="img-responsive" width="90%" height="90%" /></a></td>
              </tr>
            </thead>
         <tbody>
           <tr>
             <td id="k"style="color:black;"><font style="margin-left:22%;">Student's information</font></td>
             <td id="k" style="color:black;"><font style="margin-left:-18%;">Collection of books</font></td>
             <td id="k" style="color:black;"><font style="margin-left:-85%;">Search books</font></td>
             <td id="k" style="color:black;"><font style="margin-left:-25%;">Borrow books</font></td>
             <td id="k" style="color:black;"><font style="margin-left:-25%;">Change password</font></td>
           </tr>
         </tbody>
       </table>
    </div>
  </center>
  </div>
  <center>
        <a href="index.php"><img src="image/logout.png" style="border:solid 1px black;margin-top:1%;" class="img-responsive" width="3%" height="3%" /></a>
         <p id="footer_k">Devloped By</p>
         <p id="footer_id">B.C.E Bhagalpur</p>
         <p id="footer_id">spring - 2010 : Reg # 11022152 : cse</p>
  </center>
</div>
</body>
</html>
