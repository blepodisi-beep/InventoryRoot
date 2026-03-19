<?php

if(@$_REQUEST['f']){
$function=$_REQUEST['f'];
}

if(@$_REQUEST['mequiptype']){ $mequiptype = $_REQUEST['mequiptype'];}

//values to submit
if(@$_REQUEST['modelname']){ $modelname = $_REQUEST['modelname'];}
if(@$_REQUEST['mmake']){ $mmake = $_REQUEST['mmake'];}
//if(@$_REQUEST['mequiptype']){ $mequiptype = $_REQUEST['mequiptype'];} already declared above
if(@$_REQUEST['mcategory']){ $mcategory = $_REQUEST['mcategory'];}
if(@$_REQUEST['description']){ $description = $_REQUEST['description'];}

switch ($function){
      case "subcategory":
           subcategory($mequiptype);
      break;
      case "model_submit":
            model_submit($modelname,$mmake,$mequiptype,$mcategory,$description);
      break;
}
     

function subcategory($mequiptype)
{
require('../../login/dblink.php');
//$device = $_POST['equiptype'];
$option="";
$default="N/A";
$result=mysqli_query($myconn,"SELECT sub_category FROM sub_category where device_type = '$mequiptype' OR sub_category ='$default'");
     //echo "<select name='category' id='category'>";
while ($row = mysqli_fetch_array($result))

{ 
    //echo "<option value =".$row['sub_category'].">".$row['sub_category']."</option>"; 
	$option.="<option value =".$row['sub_category'].">".$row['sub_category']."</option>"; 
 }
 //echo "</select>"; 
echo $option;

}

function model_submit($modelname,$mmake,$mequiptype,$mcategory,$description)
{

include('../../login/dblink.php');
//populate values from AJAX

//submit details for model
$result="INSERT INTO Model
       (model,make,device_type,sub_category,description)
            VALUES
                  ('$modelname','$mmake','$mequiptype','$mcategory','$description')";


if(!mysqli_query($myconn,$result))
          {
             die('Error : '.mysqli_error($myconn));
          }
else
          {

          echo"Entry successful";
          }

mysqli_close($myconn);
}


?>



