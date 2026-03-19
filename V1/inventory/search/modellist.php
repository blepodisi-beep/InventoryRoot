<html>
<title> ORI IT Inventory</title>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/list.css">
<script type="text/javascript" src="javascripts/jQuery v1.11.1.js"></script>
</head>

<body>


<h2><u> List of Models </u></h2>
<!--end of main wrapper -->

<div class="search">

<hr>
<?php
//ini_set('display_errors',1);
include ("js_functions.php");
echo "<table class='listall zebra'>";
echo"<tr>
<th>Model</th>
<th>Make</th>
<th>Device</th>
<th>Category</th>
<th>Desscription</th>
</tr>";
require('login/dblink.php');
$result=mysqli_query($myconn,"SELECT * FROM model ORDER BY device_type ASC, sub_category ASC, make ASC");
while ($row = mysqli_fetch_array($result))


{ 
echo "<tr>";
echo "<td>".$row['model']."</td>";
echo "<td>".$row['make']."</td>";
echo "<td>".$row['device_type']."</td>";
echo "<td>".$row['sub_category']."</td>";
echo "<td>".$row['description']."</td>";
echo "<tr>";
}
echo "</table>";

?>

<hr>
</div>
</body>
</html>

