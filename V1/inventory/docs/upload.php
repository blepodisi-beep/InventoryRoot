<?php
//session_start();
//$errorMSG = "";

//ini_set('display_errors',1);
//populate values from AJAX///

//if(@$_REQUEST['f']){  $function= $_REQUEST['f'];}
//declare variables

//$myfile_ = $_FILES['image']['name'];
//$ref = $_POST['reference'];
$dates = $_POST['date'];
$codes = $_POST['records'];
$fpath = $_POST['filep'];
$description = $_POST['description'];
$type = $_POST['type'];
$file = $_POST['file'];
/*if(@$_REQUEST['ref']){ $ref= $_REQUEST['ref'];}
if(@$_REQUEST['dates']){ $dates= $_REQUEST['dates'];}
if(@$_REQUEST['codes']){ $codes= $_REQUEST['codes'];}
if(@$_REQUEST['file']){ $fname = $_REQUEST['file'];}
*/

/*
$ref= $_POST['ref'];
$dates = $_POST['dates'];
$codes = $_POST ['codes'];*/
///////////////////////////////
//function upload($ref,$dates,$codes){
include('../login/dblink.php');
//include("file.php");
//echo $ref;
//echo " :  ";
//echo $dates;
//echo " :  ";
//echo $codes;
//echo " :  ";
          //$filen = realpath("images/".$fpath);
          $f = "http://168.167.30.135/inventory/docs/images/";
          $filen = $f.$fpath;
         // $filen = realpath("docs/images/".$fpath);
          //echo $filen;
          //$filen = add_file();
          // echo "FNAME:".add_file();
          /////submit into db/////////////////////////////////////////
          $result="INSERT INTO docs
                 (date,records,filepath,description,type,file)
                 VALUES
                 ('$dates','$codes','$filen','$description','$type','$file')";
         if(!mysqli_query($myconn,$result))
           {
             die('Error : '.mysqli_error($myconn));
           }
         else
          {
           echo "Entry successful:";
          }

          mysqli_close($myconn); 

        /////////////////////////////////////////////////////////////


/* end of  function */
?>

