<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<body>


<?php
$acode; 
if(@$_REQUEST['f']){  $function= $_REQUEST['f'];}
if(@$_REQUEST['acode']){  $acode= $_REQUEST['acode'];}

switch($function){

case "populate_links":
        populate_links($acode);
           break;
}






//echo "<h3>Documentation..</h3>"; 

//populate_links();

function populate_links($acode){
echo "<h3>Documentation..</h3>";
echo "<table>";
echo "<tr>";
echo "<th>Date</th>";
echo "<th>Description</th>";
echo "<th>Path</th>";
echo "</tr>";

require('../../login/dblink.php');
$option="";
//result=mysqli_query($myconn,"SELECT *  FROM docs where records ='$acode'");
$result=mysqli_query($myconn,"SELECT *  FROM docs where records LIKE '%$acode%'");

while ($row = mysqli_fetch_array($result))

 {
   // echo "<option value =".$row['sub_category'].">".$row['sub_category']."</option>";
    $dt = $row['date'];
    $ds = $row['description'];
    $fp = $row['filepath'];

     echo "<tr>";
     echo "<td>";
     echo $dt;
     echo "</td>";
     
     echo "<td>";
     echo $ds;
     echo "</td>";

     echo "<td>";
     echo "<a href=".$fp.">"."link"."</a>";
     
     echo "</td>";
     echo "</tr>";
 }
echo "</table>";
}

?>

</body>
</html>
