<?php

if(@$_REQUEST['f']){  $function= $_REQUEST['f'];}

//declare variables
if(@$_REQUEST['assetid']){ $assetid = $_REQUEST['assetid'];}



//check function 
switch($function){
 
case "search":
        search($assetid);
           break;
}

function search($assetid)

{ 
require('../login/dblink.php');
$row_id ="";
$result=mysqli_query($myconn,"SELECT ID FROM inventory where assetcode ='$assetid' OR serialno='$assetid'");


while ($row = mysqli_fetch_array($result))

{ 
  $row_id = $row['ID']; 
 echo $row_id;
}

}

?>
