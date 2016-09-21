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
if(isset($_POST['view'])){

     header('Content-type: application/pdf');
     header('Content-Disposition: inline; filename="'.$pro_pdf.'"');
     header('Content-Transfer-Encoding: binary');
     header('Accept-Ranges: bytes');

     echo @readfile("books/$pro_pdf");
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


       <?php

            $con=mysqli_connect("localhost","1028045","gate2017","1028045");

           if(mysqli_connect_errno()){

            echo "Field to connect to Mysql:" .mysqli_connect_error();

         }

        global $con;

          $get_pro="select * from book_reg";
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

    <table class='table q'>
    <tbody>
     <tr>
       <td width='11%'><font id='user_result'>$pro_accession_no</font></td>
       <td width='12%'><font id='user_result'>$pro_isbn_no</font></td>
       <td width='13%'><font id='user_result'>$pro_book_title</font></td>
       <td width='15%'><font id='user_result'>$pro_auther_name</font></td>
       <td width='12%'><font id='user_result'><a href='view.php?user=$pro_pdf'>View</a></font></td>
       <td width='10%'><font id='user_result'>$pro_edition</font></td>
       <td width='9%'><font id='user_result'>$pro_bookself</font></td>
       <td width='7%'><font id='user_result'>$pro_row_no</font></td>
       <td width='12%'><font id='user_result'>$pro_column_no</font></td>
          </tr>
      </tbody>
    </table>


    ";
  }
  ?>

</body>
</html>
