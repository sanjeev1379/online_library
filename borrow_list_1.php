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
require_once 'includes/connection.php';

@$user_query = htmlentities($_GET['user_query']);

$result=mysql_query("select * from student_reg where reg_no='$user_query'");
if(!$result)
echo "Error in query.. <br />";
else {
  while($row=mysql_fetch_array($result,MYSQLI_ASSOC))
  {
    @$reg_no_database=$row['reg_no'];
      @$session_database=$row['session'];
      @$mobile_no_database=$row['mobile_no'];
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

       <?php

            $con=mysqli_connect("localhost","1028045","gate2017","1028045");

           if(mysqli_connect_errno()){

            echo "Field to connect to Mysql:" .mysqli_connect_error();

         }

        global $con;
             $date=date('Y-m-d');
          $get_pro="select reg_no,std_name,session,mobile_no,accession_no,isbn_no from book_reg, student_reg where book_reg.accession_no=student_reg.borrow_accession";
          $run_pro=mysqli_query($con,$get_pro);
              while($row_pro=mysqli_fetch_array($run_pro)){
                @$pro_accession_no=$row_pro['accession_no'];
                @$pro_isbn_no=$row_pro['isbn_no'];
                @$session_database=$row_pro['session'];
                @$reg_no_database=$row_pro['reg_no'];
                @$name_database=$row_pro['std_name'];
                @$mobile_no_datbase=$row_pro['mobile_no'];

         echo "

    <table class='table q'>
    <tbody>
     <tr>
       <td width='9.5%'><font id='user_result'>$reg_no_database</font></td>
       <td width='9%'><font id='user_result'>$name_database</font></td>
       <td width='7%'><font id='user_result'>$session_database</font></td>
       <td width='7%'><font id='user_result'>$mobile_no_datbase</font></td>
       <td width='10%'><font id='user_result'>$pro_accession_no</font></td>
       <td width='12%'><font id='user_result'>$pro_isbn_no</font></td>
       <td width='10%'><font id='user_result'>$date</font></td>
          </tr>
      </tbody>
    </table>


    ";
  }
  ?>

</body>
</html>
