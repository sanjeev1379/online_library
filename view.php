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

@$pdf_view = htmlentities($_GET['user']);

     header('Content-type: application/pdf');
     header('Content-Disposition: inline; filename="'.$pdf_view.'"');
     header('Content-Transfer-Encoding: binary');
     header('Accept-Ranges: bytes');

     echo @readfile("books/$pdf_view");

?>
