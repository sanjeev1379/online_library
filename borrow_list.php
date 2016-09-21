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
  <title>Library | Borrow</title>
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
      <nav class="navbar navbar-inverse" id="bg_2" style="width:88.7%;margin-left:5.7%;margin-top:0.4%;">
      <div class="navbar-collapse" id="mainNavBar">
        <ul class="nav navbar-nav navbar-left" style="margin-left:4%;">
          <li><a id="left" href="borrow_book.php?q=<?php echo $uemail ?>">Borrow Book</a></li>
          <li class="active"><a id="left" href="borrow_list.php?q=<?php echo $uemail ?>">Borrower's list</a></li>
          <li><a id="left" href="borrow_return.php?q=<?php echo $uemail ?>">Return Book</a></li>
        </ul>
      </div>
</nav>
<center>
  <div class="modal-content" style="width:88.5%;margin-top:-1.7%;margin-left:%;" id="bg_form">
  <div class="modal-body">
    <div class="modal-footer">
      <div class="col-sm-offset-2 col-sm-10" style="margin-left:-20%;">
       <button type="submit" class="btn btn-default"><a href="borrow_list_1.php"  target="iframe_a" style="text-decoration:none;">Borrower's list</a></button>
      </div></div>
      <table class="table q" border="1" style="background-color:black;" style="margin-top:-14%;padding-bottom:20%;">
     <thead>
       <tr>
         <td id="k"style="color:white;">Registation</td>
         <td id="k" style="color:white;">Name</td>
         <td id="k" style="color:white;">Session</td>
         <td id="k" style="color:white;">Contact</td>
         <td id="k" style="color:white;">Accession No</td>
         <td id="k" style="color:white;">ISBN No</td>
         <td id="k" style="color:white;">Date/Time</td>
       </tr>
     </thead>
   </table>
    <iframe height="200px" width="100%" style="margin-top:-2%;"  name="iframe_a"></iframe>
  </div>
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
