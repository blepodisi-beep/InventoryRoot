<?php @session_start(); 
if ($_SESSION['pageID'] == "home")
{
include_once("include/common.php");
}
else { include_once("../../include/common.php"); }

?>

<!DOCTYPE html>
<html>
<head>
<hr>
<link rel="stylesheet" type="text/css" href="<?php echo $path; ?>stylesheets/equipstyle.css">
<script type="text/javascript" src="add/custodian/cvalidate.js"></script>
</head>

<body>

<div class="custodian" id="custodian">
<table>
<tr>
<td><p>Username </p></td><td><input type ="text" name="custodian_id" id = "custodian_id" size="7"/></td>
</tr>
<tr>
<td><p>Title </p></td>

<td><select name ="title" id = "title">
     <option name="select"></option>
	 <option name="Mr">Mr</option>
	 <option name="Mrs">Ms</option>
	 <option name="Dr">Dr</option>
	 <option name="Prof">Prof</option>
          <option name="N/A">N/A</option>
</select>
</td>
</tr>
<tr>
<td><p>Firstname </p></td><td><input type ="text" name="fname" id = "fname" size="7"/></td>
</tr>
<tr>
<td><p>Surname</p></td><td><input type ="text" name="surname" id = "surname" size="7"/></td>
</tr>

<td><p>Type </p></td>

<td><select name ="type" id = "type">
     <option name="staff">Staff</option>
	 <option name="student">Student</option>
         <option name="N/A">N/A</option>
</td>

<tr>
<td><p>Department</p></td>
<!--Fetch Departments -->

<td>
<?php
//ini_set('display_errors',1);
//header ('Location:equipment.html');
require($path.'login/dblink.php');

$result=mysqli_query($myconn,"SELECT depart_id FROM department");
     echo "<select name='depart_id' id='depart_id'>";
while ($row = mysqli_fetch_array($result))

{ 
    echo "<option value =".$row['depart_id'].">".$row['depart_id']."</option>"; 
 }
 echo "</select>";
?>
</td>

</tr>

</table>
</div>

<!--draw line at the bottom of the form -->
<p><hr></p>


<div class="commands">
<table>
<tr>
<td><input type="submit" value="submit" id="csubmit"/></td><td> <input type="reset" id = "reset" value="clear"/></td><td></td>
</tr>
</table>
</div>

</body>
</html>
