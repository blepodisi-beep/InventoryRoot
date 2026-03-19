<?php

//ini_set('display_errors',1);
//header ('Location:equipfrm.php');
error_reporting(0);
include('../../login/dblink.php');
//populate values from AJAX

$uname2 = $_POST['uname1'];
$title2 = $_POST['usertitle1'];
$firstname2 = $_POST['firstname1'];
$lastname2 = $_POST['lastname1'];
$type2 = $_POST['ctype1'];
$department2 = $_POST['department1'];

//submit details for custodian
$result="INSERT INTO custodian
       (custodian_id,title,fname,surname,type,department)
            VALUES
                  ('$uname2','$title2','$firstname2','$lastname2','$type2','$department2')";


if(!mysqli_query($myconn,$result))
          {
             die('Error : '.mysqli_error($myconn));
          }
else
          {

          echo"Entry successful";
          }

mysqli_close($myconn); 



?>


