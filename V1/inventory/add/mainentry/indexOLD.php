<?php 
@session_start(); 
@$current_id = $_GET['id'];

echo "<p id ='cid'>".$current_id."</p>";


 if ($_SESSION['pageID'] =="home")
{
include_once("include/common.php");
}
else {include_once("../../include/common.php"); }

?> 

<?php include ("add/mainentry/evalidate.php"); ?> 

<html>
<head>
<hr>
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>stylesheets/equipstyle.css">
<!--<script type="text/javascript" src="add/mainentry/evalidate.js"></script> -->

</head>

<body>

<!--equipment type -->
<h4>Equipment type</h4>
<div class="equiptype">
<table>
<tr>
<td><p>Device*</p></td>

<td>
<?php
//ini_set('display_errors',1);
require($path.'login/dblink.php');

$result=mysqli_query($myconn,"SELECT device FROM device where device <>'N/A'");
     echo "<select name='equiptype' id='equipment'  onchange='equiptype_onchange()'>";
while ($row = mysqli_fetch_array($result))

{ 
    echo "<option value =".$row['device'].">".$row['device']."</option>"; 
 }
 echo "</select>";
?>
</td>

<td><p>Category</p></td>

<td>
<select id="category" name ="category" onfocus= "populate_subcategory()"/> 
</td>

<td><p>Logs<p></td>
<td><select name ="logs" id="logs" onfocus="logs()"/>
</td>

</tr>
</table>
</div>

<!-- General Details......-->
<h4>  General Info</h4>
<div class="main">
<table>
<tr>
<td><p>Asset Code*</p></td><td><input type ="text" name="assetcode" id="acode" size="7"/></td><td><p>Serial No.*</p></td><td><input type ="text" name="sno" id="sno" size="7"/></td>

<td><p>Make *</td>

<td>
<?php
require($path.'login/dblink.php');

$result=mysqli_query($myconn,"SELECT make FROM make");
     echo "<select name='make' id='make'>";
while ($row = mysqli_fetch_array($result))

{ 
 echo "<option value=\"".$row['make']."\">".$row['make']."</option>"; 
 }
 echo "</select>";
?>
</td>

</tr>
<tr>
<td><p>Model</p></td>

<td>
<select name='model' id='model' onfocus='populate_model()'>
</td>

<td><p>Other Model</p></td><td><input type ="text" name="omodel" id="omodel" size="7" onfocus='model_change()'/></td><td><p>Date Issued</td><td><input type ="date" name="issued" id="issued" size="7"/></td>

</tr>
</table>
</div>

<!--Details for Computers -->
<h4> PCS / Servers / Laptops...</h4>
<div class="pcs">
<table>
<tr>
<td><p>RAM</p></td>
<td>
<?php
require($path.'login/dblink.php');
$result=mysqli_query($myconn,"SELECT ram FROM ram");
     echo "<select name='ram' id='ram'>";
while ($row = mysqli_fetch_array($result))

{ 
    echo "<option value =".$row['ram'].">".$row['ram']."</option>"; 
 }
 echo "</select>";
?>
</td>

<td><p>CPU Type</p></td>

<td>
<?php
error_reporting(E_ALL ^ E_NOTICE);
require($path.'login/dblink.php');
$result=mysqli_query($myconn,"SELECT processor FROM processor");
     echo "<select name='processor' id='processor'>";
while ($row = mysqli_fetch_array($result))

{  

  //echo "<option value =".$row['processor'].">".$row['processor']."</option>"; 
 echo "<option value=\"".$row['processor']."\">".$row['processor']."</option>"; 
 }
 echo "</select>";
?>
</td>

<td><p>CPU Speed</p></td><td><input type ="text" name="cpuspeed" id ="cpuspeed" size="7"/></td>
</tr>
</table>
</div>

<!--Allocation -->
<h4>Allocation</h4>
<div class="allocation">
<table>
<tr>
<td><p>Project</p></td>

<td>
<?php
require($path.'login/dblink.php');

$result=mysqli_query($myconn,"SELECT project_id FROM project");
     echo "<select name='project' id='project'>";
while ($row = mysqli_fetch_array($result))

{ 
    echo "<option value =".$row['project_id'].">".$row['project_id']."</option>"; 
 }
 echo "</select>";
?>
</td>


<td><p>Custodian</p></td>

<td>
<?php
require($path.'login/dblink.php');

$result=mysqli_query($myconn,"SELECT custodian_id FROM custodian ORDER BY custodian_id ASC");
     echo "<select name='custodian' id='custodian'>";
while ($row = mysqli_fetch_array($result))

{ 
    echo "<option value =".$row['custodian_id'].">".$row['custodian_id']."</option>"; 
 }
 echo "</select>";
?>
</td>
<td><p>Office</td>

<td>
<?php

require($path.'login/dblink.php');

$result=mysqli_query($myconn,"SELECT office_id FROM office ORDER BY office_id ASC");
     echo "<select name='office' id='office'>";
while ($row = mysqli_fetch_array($result))

{ 
    echo "<option value =".$row['office_id'].">".$row['office_id']."</option>"; 
 }
 echo "</select>";
?>
</td>

</tr>
<tr>
<td><p>Device Name</p></td><td><input type ="text" name="device_name" id = "device_name" size="7"/></td>

<td><p>Status*</p>
</td><td><select name="status" id ="status"/>
<option value="Working">Working</option>
<option value="Not Working">Not Working</option>
<option value="N/A">N/A</option>
</select>
</td>

<td><p>Comments</td><td><input type ="text" name="comments" id ="comments" size="7"/></td>
</tr>
</table>
</div>

<!--draw line at the bottom of the form -->
<p><hr></p>
<div class="commands">
<table>
<tr>
<td><input type="submit" value="save" id="submit" onclick="equip_submit()"/></td><td> <input type="reset" value="clear" id="clear" onclick="clear_form()"/></td><td><input type="submit" value="update" id="update" onclick="update()"/></td><td><input type="reset" value="delete" onclick="del()"/></td>
</tr>
</table>
</div>

</body>
</html>
