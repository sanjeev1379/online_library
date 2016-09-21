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
    $result=mysql_query("select * from student_reg where reg_no like '%$search_query%' ");
    if(!$result)
    echo "Error in query.. <br />";
    else {
        header("Location:results_borrow.php?q=$uemail&user_query=".$search_query);
      }
    }else{
      echo "<script>alert('Please Enter a Valid Search!')</script>";
      echo  "<script>window.open('book_edit.php?q=$uemail','_self')</script>";
    }
}
@mysqli_free_result($result);
@mysqli_close($dbh);

?>


<?php
include("includes/db.php");
include("includes/connection.php");


if(isset($_POST['borrow'])){

@$search_accession_no = htmlentities($_GET['user_query']);
  $borrow_accession_no=$_POST['borrow_accession_no'];

  if(!empty($borrow_accession_no)){
    if(@($password_hash!=$password_again_hash)){

      }else{
        //$query="INSERT into bill (bill_name,bill_no,month,date_e,unit_consumed,status) values('$search_username','$bill_no','$month','$date_e','$update_unit_cost','$status')";
        //$query_pro=mysqli_query($con,$query);
        @$query="UPDATE `student_reg` SET /*`room_no`='@$room_no' ,*/  `borrow_accession`='$borrow_accession_no' WHERE `reg_no`='$search_accession_no' ";
        $query_pro=mysqli_query($con,$query);
        if($query_pro){
          echo "<script>alert('Borrow Books Information Is Successfully Updated!')</script>";
          echo  "<script>window.open('borrow_list.php?q=$uemail','_self')</script>";
        //header("Location:bill.php?q=$admin&username=".$search_username);
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
   }
  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('borrow_book.php?q=$uemail','_self')</script>";
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
<body onload="document.reg.user_query.focus();">
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
          <li class="active"><a id="left" href="borrow_book.php?q=<?php echo $uemail ?>">Borrow Book</a></li>
          <li><a id="left" href="borrow_list.php?q=<?php echo $uemail ?>">Borrower's list</a></li>
          <li><a id="left" href="borrow_return.php?q=<?php echo $uemail ?>">Return Book</a></li>
        </ul>
      </div>
</nav>
      <center><div class="modal-content" style="width:28%;margin-left:-60%;" id="bg_form">
      <div class="modal-body">
        <?php
        @$search_accession_query=htmlentities($_GET['user_query']);

        ?>
        <form name="reg" role="form" method="post" action="results_borrow.php?q=<?php echo @$uemail ?>" enctype="multiplepart/form">
          <div class="form-group">
              <span class='label label-info' id="n">  Registation No </span>
              <input type="search" name="user_query" class="form-control" value="<?php echo @$search_accession_query ?>" style="width:90%;"  />
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" name="search" id="bt" class="btn btn-primary btn-block" value="Search"  style="width:172%; margin-left:-36%;"/>
      </div>
      </form>
    </div></center>
    <center>
      <div class="modal-content" style="width:28%;margin-left:-2%;margin-top:-16.5%;" id="bg_form" style="float:right;">
    <div class="modal-body">
      <?php

      $con=mysqli_connect("localhost","1028045","gate2017","1028045");

     if(mysqli_connect_errno()){

      echo "Field to connect to Mysql:" .mysqli_connect_error();

   }

  global $con;

  @$search_query = htmlentities($_GET['user_query']);

    $get_pro="select * from student_reg where reg_no LIKE '%$search_query' ";
    $run_pro=mysqli_query($con,$get_pro);

        while($row_pro=mysqli_fetch_array($run_pro)){
//$pro_student_id=$row_pro['student_id'];
           @$pro_username=$row_pro['std_name'];
           @$pro_session=$row_pro['session'];
           @$pro_mobile_no=$row_pro['mobile_no'];
         }
?>
      <form role="form" method="post" action="" enctype="multiplepart/form">
        <div class="form-group">
            <span class='label label-info' id="n">  Username </span>
            <input type="text" name="consumer" class="form-control" value="<?php echo @$pro_username ?>" style="width:90%;" disabled="" />
          </div>
          <div class="form-group">
            <span class='label label-info' id="n"> Session </span>
            <input type="text" name="consumer" class="form-control" value="<?php echo @$pro_session ?>" style="width:90%;" disabled="" />
          </div>
          <div class="form-group">
            <span class='label label-info' id="n">  Contact No </span>
            <input type="text" name="consumer" class="form-control" value="<?php echo @$pro_mobile_no ?>" style="width:90%;" disabled="" />
          </div>
    </div>
    </form>
  </div>
</center>
<center>
  <div class="modal-content" style="width:30%;margin-left:58%;margin-top:-22%;" id="bg_form" style="float:right;">
<div class="modal-body">
  <form role="form" method="post" action="" enctype="multiplepart/form">
    <div class="form-group">
        <span class='label label-info' id="n">  Assession No </span>
        <input type="text" name="borrow_accession_no" class="form-control" placeholder="Assession Number...." style="width:90%;"  />
      </div>
      <div class="modal-footer">
        <input type="submit" name="borrow" id="bt" class="btn btn-primary btn-block" value="Borrow"  style="width:172%; margin-left:-36%;"/>
      </div>
</div>
</form>
</div>
</center>
  </div>
  <center>
         <p id="footer_x">Devloped By</p>
         <p id="footer_id">B.C.E Bhagalpur</p>
         <p id="footer_id">spring - 2010 : Reg # 11022152 : cse</p>
  </center>
</div>
</body>
</html>
