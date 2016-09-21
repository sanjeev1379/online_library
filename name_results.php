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

require 'includes/connection.php';
if(isset($_POST['search'])){
  $search_query = $_POST['user_query'];
  if(!empty($search_query)){
    $result=mysql_query("select * from book_reg where book_title like '%$search_query%' ");
    if(!$result)
    echo "Error in query.. <br />";
    else {
        header("Location:name_results.php?q=$uemail&user_query=".$search_query);
      }
    }else{
      echo "<script>alert('Please Enter a Valid Search!')</script>";
      echo  "<script>window.open('search_name.php?q=$uemail','_self')</script>";
    }
}
@mysqli_free_result($result);
@mysqli_close($dbh);

?>


<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Library | Search</title>
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
          <li><a id="left" href="search_accession.php?q=<?php echo $uemail ?>">Search by Accession number</a></li>
          <li><a id="left" href="search_isbn.php?q=<?php echo $uemail ?>">Search by ISBN number</a></li>
          <li class="active"><a id="left" href="search_name.php?q=<?php echo $uemail ?>">Search by Name</a></li>
        </ul>
      </div>
</nav>
        <div class="modal-content" style="width:88.5%;margin-top:-1.7%;margin-left:5.8%;" id="bg_form">
          <div class="modal-body">
            <?php
            @$search_isbn_query=htmlentities($_GET['user_query']);

            ?>
            <form name="reg" class="form-horizontal" style="margin-left:12%;" action="name_results.php?q=<?php echo @$uemail ?>" method="post" >
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Book Name :</label>
                <div class="col-sm-10">
                 <input type="search" name="user_query" class="form-control" id="pwd" value="<?php echo @$search_isbn_query ?>" style="width:70%;" />
                </div>
              </div>
             <div class="form-group" >
                <div class="col-sm-offset-2 col-sm-10" style="margin-top:-5.6%;margin-right:-20%;padding-left:60%;">
                 <a href="search_name_1.php?q=<?php echo $uemail ?>"  target="iframe_a" style="text-decoration:none;"><input type="submit" name="search" class="btn btn-default" value="Search" /></a>
                </div>

                  <table class="table q" border="1" style="background-color:black;margin-left:-8%;">
                 <thead>
                   <tr>
                     <td id="k"style="color:white;">Accession</td>
                     <td id="k" style="color:white;">ISBN No</td>
                     <td id="k" style="color:white;">Book Title</td>
                     <td id="k" style="color:white;">Auther Name</td>
                     <td id="k" style="color:white;">View Book</td>
                     <td id="k" style="color:white;">Edition</td>
                     <td id="k" style="color:white;">Bookself</td>
                     <td id="k" style="color:white;">Row</td>
                     <td id="k" style="color:white;">Column</td>
                   </tr>
                 </thead>
                </table>
                <?php

                     $con=mysqli_connect("localhost","1028045","gate2017","1028045");

                    if(mysqli_connect_errno()){

                     echo "Field to connect to Mysql:" .mysqli_connect_error();

                  }

                 global $con;
                 @$search_query = htmlentities($_GET['user_query']);

                   $get_pro="select * from book_reg where book_title LIKE '%$search_query' ";
                   $run_pro=mysqli_query($con,$get_pro);
                       while($row_pro=mysqli_fetch_array($run_pro)){
                         @$pro_accession_no=$row_pro['accession_no'];
                         @$pro_isbn_no=$row_pro['isbn_no'];
                         @$pro_book_title=$row_pro['book_title'];
                         @$pro_auther_name=$row_pro['auther_name'];
                         @$pro_pdf=$row_pro['pdf'];
                         @$pro_edition=$row_pro['edition'];
                         @$pro_bookself=$row_pro['bookself'];
                         @$pro_row_no=$row_pro['row_no'];
                         @$pro_column_no=$row_pro['column_no'];
                  echo "

                <table class='table q' style='margin-left:-8%;'>
                <tbody>
                <tr>
                <td width='11%'><font id='user_result'>$pro_accession_no</font></td>
                <td width='12%'><font id='user_result'>$pro_isbn_no</font></td>
                <td width='13%'><font id='user_result'>$pro_book_title</font></td>
                <td width='13%'><font id='user_result'>$pro_auther_name</font></td>
                <td width='12%'><font id='user_result'><a href='view.php?user=$pro_pdf'>View</a></font></td>
                <td width='10%'><font id='user_result'>$pro_edition</font></td>
                <td width='12%'><font id='user_result'>$pro_bookself</font></td>
                <td width='8%'><font id='user_result'>$pro_row_no</font></td>
                <td width='12%'><font id='user_result'>$pro_column_no</font></td>
                   </tr>
                </tbody>
                </table>


                ";
                }
                ?>

          </div>
          <hr color="black" />
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
