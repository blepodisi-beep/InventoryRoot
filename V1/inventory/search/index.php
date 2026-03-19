<html>
<title> ORI IT Inventory</title>
<head>
<link rel="stylesheet" type="text/css" href="stylesheets/list.css">
<script type="text/javascript" src="javascripts/jQuery v1.11.1.js"></script>
</head>

<body>


<h2><u> ORI IT Assets </u></h2>
<!--end of main wrapper -->

<div class="search">

<hr>
<?php
//
include ("php_functions.php");

//ini_set('display_errors',1);
include ("js_functions.php");
echo "<table class='listall zebra'>";
echo"<tr>
<th>ID</th>
<th>Device</th>
<th>Type</th>
<th>Asset Code</th>
<th>Serial No.</th>
<th>Make</th>
<th>Model</th>
<th>Custodian</th>
<th>Status</th>
</tr>";
require('login/dblink.php');
$result=mysqli_query($myconn,"SELECT * FROM inventory ORDER BY equip_type ASC, sub_category ASC, custodian_ID ASC");
$num_rows = mysqli_num_rows($result);
echo "Total number of devices: "."<b>".$num_rows."</b>"."  Computers: "."<b>".count_computers()."</b>"."  Monitors: "."<b>".count_monitors()."</b>"."  Printers: "."<b>".count_printers()."</b>"."  Other Devices: "."<b>".count_others()."</b>";
echo "<hr>";
while ($row = mysqli_fetch_array($result))

{
$tab_id="inventory";
echo "<tr>";
//echo "<td><a id='{$row['ID']}' href ='index.php?id={$row['ID']}'>".$row['ID']."</a></td>";
echo "<td><a id='{$row['ID']}' href ='index.php?id={$row['ID']}&tab_id={$tab_id}''>".$row['ID']."</a></td>";
echo "<td>".$row['equip_type']."</td>";
echo "<td>".$row['sub_category']."</td>";
echo "<td>".$row['assetcode']."</td>";
echo "<td>".$row['serialno']."</td>";
echo "<td>".$row['make']."</td>";
echo "<td>".$row['model']."</td>";
echo "<td>".$row['custodian_id']."</td>";
echo "<td>".$row['status']."</td>";
}
echo "</table>";


?>

<hr>
</div>
</body>
</html>

