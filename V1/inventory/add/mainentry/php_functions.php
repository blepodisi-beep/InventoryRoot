<?php

$category="";
$acode=0000000;$sno="";$make="";$model="";$omodel="";$issued=2014-01-01;
$ram="";$processor="";$cpuspeed=0.00;
$project="";$custodian="";$office="";
$device_name="";$status="";$comments="";

if(@$_REQUEST['f']){  $function= $_REQUEST['f'];}
//declare variables
if(@$_REQUEST['equipment']){ $equipment= $_REQUEST['equipment'];}

if(@$_REQUEST['devicetype']){ $devicetype= $_REQUEST['devicetype'];} 

if(@$_REQUEST['category']){ $category= $_REQUEST['category'];}

if(@$_REQUEST['make']){ $make= $_REQUEST['make'];}

//submit variables
if(@$_REQUEST['acode']){  $acode= $_REQUEST['acode'];}

if(@$_REQUEST['sno']){  $sno= $_REQUEST['sno'];}

if(@$_REQUEST['model']){  $model= $_REQUEST['model'];}

if(@$_REQUEST['omodel']){  $omodel= $_REQUEST['omodel'];}

if(@$_REQUEST['issued']){  $issued= $_REQUEST['issued'];}

if(@$_REQUEST['ram']){  $ram= $_REQUEST['ram']; }

if(@$_REQUEST['processor']){  $processor= $_REQUEST['processor'];}

if(@$_REQUEST['cpuspeed']){  $cpuspeed= $_REQUEST['cpuspeed'];}

if(@$_REQUEST['project']){  $project= $_REQUEST['project'];}

if(@$_REQUEST['custodian']){  $custodian= $_REQUEST['custodian'];}

if(@$_REQUEST['office']){  $office= $_REQUEST['office'];}

if(@$_REQUEST['device_name']){  $device_name= $_REQUEST['device_name'];}

if(@$_REQUEST['status']){  $status= $_REQUEST['status'];}

if(@$_REQUEST['comments']){  $comments= $_REQUEST['comments'];}
//id variable
if(@$_REQUEST['deviceid']){  $deviceid= $_REQUEST['deviceid'];}
//if(@$_REQUEST['lacode']){  $linkcode= $_REQUEST['lacode'];}
//$linkcode = $_POST['lacode'];
//check function
switch($function){
 
case "populate_all":
        populate_all($deviceid);
           break;

 case "populate_subcategory":
	  populate_subcategory($equipment);
		  break;

 case "populate_model":
	populate_model($devicetype,$category,$make);
		  break;
 case "submit":
       submit($equipment,$category,$acode,$sno,$make,$model,$omodel,$issued,$ram,$processor,$cpuspeed,$project,$custodian,$office,$device_name,$status,$comments);
             break;

 case "update":
       update($deviceid,$equipment,$category,$acode,$sno,$make,$model,$omodel,$issued,$ram,$processor,$cpuspeed,$project,$custodian,$office,$device_name,$status,$comments);
             break;

 case "del":
       del($deviceid);
             break;

case "logs":
       logs($deviceid);
             break;

case "populate_links":
       populate_links($acode);
                     break;

}


function populate_subcategory($equipment){ 
require('../../login/dblink.php');
$option="";
$sqlcmd ="SELECT sub_category FROM sub_category where device_type ='$equipment'";
$result=mysqli_query($myconn,$sqlcmd);
//echo "<select name='category' id='category'>";
while ($row = mysqli_fetch_array($result))

{ 
    echo "<option value =".$row['sub_category'].">".$row['sub_category']."</option>"; 
	//$option.="<option value =".$row['sub_category'].">".$row['sub_category']."</option>"; 
 }
 //echo "</select>"; 
//echo $option; 
}

//-----------------------------------------------------------
function populate_model($devicetype,$category,$make){
//ini_set('display_errors',1);
require('../../login/dblink.php');
//$device = $_POST['equiptype'];
$option="";
$sqlcmd="SELECT model FROM model where (device_type='$devicetype' and sub_category='$category' and make='$make') || model='other'";
$result=mysqli_query($myconn,$sqlcmd);
     //echo "<select name='category' id='category'>";
while ($row = mysqli_fetch_array($result))

{ 
    //echo "<option value =".$row['sub_category'].">".$row['sub_category']."</option>"; 
	$option.="<option value =".$row['model'].">".$row['model']."</option>"; 
 }
 //echo "</select>"; 
echo $option;
}
//-----------------------------------------------------------
function populate_all($deviceid)
{
require('../../login/dblink.php');
$sqlcmd="SELECT * FROM inventory where id='$deviceid'";
$result=mysqli_query($myconn,$sqlcmd);

while ($row = mysqli_fetch_array($result))

{ 
    echo json_encode(array("equipment_type" => $row['equip_type'],
                                "scategory" => $row['sub_category'],
                               "asset_code" => $row['assetcode'],
			        "serial_no" => $row['serialno'],
                                    "mmake" => $row['make'],
			           "mmodel" => $row['model'],
                                  "oomodel" => $row['omodel'],
                                  "dissued" => $row['date_issued'],
                                     "rram" => $row['memory_size'],
                               "pprocessor" => $row['processor'],
                                "ccpuspeed" => $row['processor_speed'],                              
 	                         "pproject" => $row['project_id'],
                               "ccustodian" => $row['custodian_id'],
                                   "oofice" => $row['office_id'],
                                    "dname" => $row['device_name'],
                                  "sstatus" => $row['status'],
                                "ccomments" => $row['comments'],

));  
    
 }
   // echo "<p><u>".$row['sub_category']."</p></u>"; 
}

//-----------------------------------------------------------
function submit($equipment,$category,$acode,$sno,$make,$model,$omodel,$issued,$ram,$processor,$cpuspeed,$project,$custodian,$office,$device_name,$status,$comments)
{
 
include('../../login/dblink.php');
//error_reporting(0);

$result="INSERT INTO inventory
       (equip_type,sub_category,assetcode,serialno,make,model,omodel,date_issued,processor,processor_speed,memory_size,project_id,custodian_id,office_id,device_name,status,comments)
            VALUES
                  ('$equipment','$category','$acode','$sno','$make','$model','$omodel','$issued','$processor','$cpuspeed','$ram','$project','$custodian','$office','$device_name','$status','$comments')";


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

//UPDATE
function update($deviceid,$equipment,$category,$acode,$sno,$make,$model,$omodel,$issued,$ram,$processor,$cpuspeed,$project,$custodian,$office,$device_name,$status,$comments)
{
 
include('../../login/dblink.php');

$result="UPDATE inventory SET equip_type ='$equipment',sub_category='$category',assetcode='$acode',serialno='$sno',make='$make',model='$model',omodel='$omodel',date_issued='$issued',processor='$processor',	processor_speed='$cpuspeed',memory_size='$ram',project_id='$project',custodian_id='$custodian',office_id='$office',device_name='$device_name',status='$status',comments='$comments' where ID='$deviceid'";

          
if(!mysqli_query($myconn,$result))
          {
             die('Error : '.mysqli_error($myconn));
          }
else
          {

          echo"update successful";
          }

mysqli_close($myconn);
}

//delete record 
function del($deviceid)
{
include('../../login/dblink.php');
$result="DELETE FROM inventory where ID='$deviceid'";
          
if(!mysqli_query($myconn,$result))
          {
             die('Error : '.mysqli_error($myconn));
          }
else
          {

          echo"Record deleted successfully!";
          }

mysqli_close($myconn);
}

//-----------------------------------------------------------
function logs($deviceid){


require('../../login/dblink.php');

$option="";
$sqlcmd="SELECT * FROM inventory_audit where ID = '$deviceid'";
$result=mysqli_query($myconn,$sqlcmd);
   
while ($row = mysqli_fetch_array($result))

{ 
$option.="<option value ="."-------------------------".">"."-------------------------"."</option>";
$option.="<option value =".$row['ID'].">".$row['ID']."</option>"; 
$option.="<option value =".$row['changed_date'].">".$row['changed_date']."</option>";
$option.="<option value =".$row['type_of_change'].">".$row['type_of_change']."</option>";
$option.="<option value =".$row['memory_size'].">".$row['memory_size']."</option>";
$option.="<option value =".$row['custodian_id'].">".$row['custodian_id']."</option>";
$option.="<option value =".$row['office_id'].">".$row['office_id']."</option>";

 }
 
echo $option;
echo "<br>";
}
//-----------------------------------------------------------
//-----------------------------------------------------------
//////////////////////////////////////////////////////////////////////
function populate_links($acode){
$reftag1="<a href=";
$retag2=">";
require('../../login/dblink.php');
$option="";
$sqlcmd="SELECT * FROM  docs where records ='$acode'";
$result=mysqli_query($myconn,$sqlcmd);
//$result=mysqli_query($myconn,"SELECT * FROM  documents");
while ($row = mysqli_fetch_array($result))

   {

    $option.="<option value =".$row['filepath'].">".$row['filepath']."</option>";  
   }

//echo $reftag1;
echo $option;
//echo $reftag2;
/////////////////////////////////////////////////////////////////////
 }
?>
