<?php 
@session_start(); 

if ($_SESSION['pageID'] =="home")
{
include_once("include/common.php");
}
else {include_once("../../include/common.php"); }

?> 
<?php include ("add/model/js_functions.php"); ?> 

<!DOCTYPE html>
<html>
<head>
<hr>
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>stylesheets/equipstyle.css">
<script type="text/javascript" src="<?php echo $path; ?>javascripts/jQuery v1.11.1.js"></script>
</head>

<body>

<table>
<tr>
<td><p>Model </p></td><td><input type ="text" name="modelname" id = "modelname" size="7"/></td>
</tr>

<tr>
<td><p>Make</p></td>
<td>
<?php
require($path.'login/dblink.php');
$result=mysqli_query($myconn,"SELECT make FROM make");
     echo "<select name='make' id='mmake'>";
while ($row = mysqli_fetch_array($result))
{ 
    echo "<option value =".$row['make'].">".$row['make']."</option>"; 
 }
 echo "</select>";
?>
</td>
</tr>

<tr>
<td><p>Device </p></td>
<td>
<?php
require($path.'login/dblink.php');
$result=mysqli_query($myconn,"SELECT device FROM device");
     echo "<select name='equiptype' id='mequiptype'>";
while ($row = mysqli_fetch_array($result))

{ 
    echo "<option value =".$row['device'].">".$row['device']."</option>"; 
 }
 echo "</select>";
?>
</td>
</tr>

<tr>

<td>
<p>Category</p></td><td><select name ="category" id = "mcategory" onfocus = 'subcategory()'>
<option value="selected">-select-</option>
</select> 
</td>

</tr>

<tr>
<td><p>Description </p></td><td><input type ="text" name="description" id = "description" size="7"/></td>
</tr>

</table>


<p><hr></p>


<div class="commands">
<table>
<tr>
<td><input type="submit" value="submit" id="msubmit" onclick="model_submit()"/></td><td> <input type="reset"  value="clear" id ="clear" onclick="model_clear()"/></td><td></td>
</tr>
</table>
</div>

</body>
</html>
