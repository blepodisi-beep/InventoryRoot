<?php
session_start();
$errorMSG = "";

//ini_set('display_errors',1);
//populate values from AJAX///

//if(@$_REQUEST['f']){  $function= $_REQUEST['f'];}
//declare variables

$myfile_ = $_FILES['image']['name'];
$ref = $_POST['reference'];
$dates = $_POST['date'];
$codes = $_POST['records'];
if(@$_REQUEST['ref']){ $ref= $_REQUEST['ref'];}
if(@$_REQUEST['dates']){ $dates= $_REQUEST['dates'];}
if(@$_REQUEST['codes']){ $codes= $_REQUEST['codes'];}



/*
$ref= $_POST['ref'];
$dates = $_POST['dates'];
$codes = $_POST ['codes'];*/
///////////////////////////////
//function upload($ref,$dates,$codes){
include('../login/dblink.php');
echo $ref;
echo " :  ";
echo $dates;
echo " :  ";
echo $codes;

   //if(isset($_FILES['image'])){
      $errors= array();
      //$file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("pdf","jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
         $errorMSG .="<li>Invalid File Format!</li>";
      }
      
      if($file_size > 2097152){
         //$errors[]='File size must be excately 2 MB';
         $errorMSG .="<li>Invalid File Size!</li>";
      }
      
      if($errorMSG==""){
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "File uploaded!";
         //$errorMSG .="<li>Invalid File Uploaded!</li>";
         $filen = realpath("images/".$file_name);
          echo "FNAME:".$file_name;
         /////submit into db/////////////////////////////////////////
         $result="INSERT INTO docs
                 (reference,date,records,file)
                 VALUES
                 ('$ref','$dates','$codes','$filen')";
         if(!mysqli_query($myconn,$result))
           {
             die('Error : '.mysqli_error($myconn));
           }
         else
          {

          echo"Entry successful:".$file_name;
          }

          mysqli_close($myconn); 

        /////////////////////////////////////////////////////////////
      }else{

         //print_r($errors);
          echo $errorMSG;
      }
   

/* end of  function */
echo "ERR:".$errorMSG;
echo "FL: ".$myfile; 
?>
 
