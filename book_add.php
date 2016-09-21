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


if(isset($_POST['book_add'])){

  $accession_no=$_POST['accession_no'];
  $isbn_no=$_POST['isbn_no'];
  $book_title=$_POST['book_title'];
  $auther_name=$_POST['auther_name'];
  $edition=$_POST['edition'];
  $bookself=$_POST['bookself'];
  $row_no=$_POST['row_no'];
  $column_no=$_POST['column_no'];

  $pdf=$_FILES['pdf']['name'];
    $pdf_tmp=$_FILES['pdf']['tmp_name'];

    move_uploaded_file($pdf_tmp,"books/$pdf");

  /*  @header('Content-type: application/pdf');
    @header('Content-Disposition: inline; filename="'.$pdf.'"');
    @header('Content-Transfer-Encoding: binary');
    @header('Accept-Ranges: bytes');*/

  //  echo @readfile("images/$image");

  if(!empty($accession_no)&&!empty($isbn_no)&&!empty($book_title)&&!empty($auther_name)){
    if(@($password_hash!=$password_again_hash)){

      }else{
      $query="INSERT into book_reg (accession_no,isbn_no,book_title,auther_name,pdf,edition,bookself,row_no,column_no) values('$accession_no','$isbn_no','$book_title','$auther_name','$pdf','$edition','$bookself','$row_no','$column_no')";
      $query_pro=mysqli_query($con,$query);
      if($query_pro){
        echo "<script>alert('Thanku! Books are successfully Added!')</script>";
        echo  "<script>window.open('book_list.php?q=$uemail','_self')</script>";
      }else{
        /*  header("Location:home.php?q=".$email);*/
      }
   }
  }else{
    echo "<script>alert('All field are Required!')</script>";
    echo  "<script>window.open('book_add.php?q=$uemail','_self')</script>";
  }
}

?>


<!DOCTYPE Html>
<html lang="en">
<head>
  <title>Library | Book</title>
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
          <li class="active"><a id="left" href="book_add.php?q=<?php echo $uemail ?> ">Add new book</a></li>
          <li><a id="left" href="book_list.php?q=<?php echo $uemail ?> ">List of books</a></li>
          <li><a id="left" href="book_edit.php?q=<?php echo $uemail ?> ">Edit book information</a></li>
        </ul>
      </div>
</nav>
        <div class="modal-content" style="width:88.5%;margin-top:-1.7%;margin-left:5.8%;" id="bg_form">
          <div class="modal-body">
            <form class="form-horizontal" style="margin-left:12%;" action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Accession no :</label>
                <div class="col-sm-10">
                 <input type="text" name="accession_no" class="form-control" id="pwd" placeholder="Enter accession no" style="width:40%;">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">ISBN no :</label>
                <div class="col-sm-10">
                  <input type="text" name="isbn_no" class="form-control" id="pwd" placeholder="Enter ISBN no" style="width:40%;">
                 </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Book Title :</label>
                <div class="col-sm-10">
                 <input type="text" name="book_title" class="form-control" id="pwd" placeholder="Enter book title" style="width:40%;">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Auther Name :</label>
                <div class="col-sm-10">
                 <input type="text" name="auther_name" class="form-control" id="pwd" placeholder="Enter book auther" style="width:40%;">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Choose Book :</label>
                <div class="col-sm-10">
                 <input type="file" name="pdf" class="form-control" id="pwd" placeholder="Enter book auther" style="width:40%;">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Edition :</label>
                <div class="col-sm-10">
                 <input type="text" name="edition" class="form-control" id="pwd" placeholder="Enter book edition" style="width:40%;">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Boolself no :</label>
                <div class="col-sm-10">
                 <input type="text" name="bookself" class="form-control" id="pwd" placeholder="Enter bookself no" style="width:40%;">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Row no :</label>
                <div class="col-sm-10">
                 <input type="text" name="row_no" class="form-control" id="pwd" placeholder="Enter book row no" style="width:40%;">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Column no :</label>
                <div class="col-sm-10">
                 <input type="text" name="column_no" class="form-control" id="pwd" placeholder="Enter book column no" style="width:40%;">
                </div>
              </div>
             <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                 <input name="book_add" type="submit" class="btn btn-default" value="Submit" />
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
