<?php
@session_start();
$_SESSION['pageID'] ="home";
@$tab_id = $_GET['tab_id'];
?>

<!DOCType html>
<html>
<head>
<title> ORI IT Inventory</title>
<link rel="stylesheet" type="text/css" href="stylesheets/tab_home.css">
<script type="text/javascript" src="javascripts/jQuery v1.11.1.js"></script>
<script type="text/javascript" src="javascripts/tab_home.js"></script>
</head>

<body>

<div class="tabs-home" >

<ul class="tabshome">
    <li class="tab-link currenthome" data-tabhome="home"><b>Home</b></li>
    <li class="tab-link" data-tabhome="inventory"><b>Inventory</b></li>

</ul>

<?php
@$tab_id = $_GET['tab_id'];
if ($tab_id <> "inventory")

{
echo"
<div id='home'  class='tab-contenthome currenthome'>";
include('mainmenu/leftbar.php');
echo "</div>";

echo"
<div id='inventory'  class='tab-contenthome'>";
include('tab_menu.php');
echo "</div>";
}

else

{
echo"
<div id='home'  class='tab-contenthome'>";
include('mainmenu/leftbar.php');
echo "</div>";

echo"
<div id='inventory'  class='tab-contenthome currenthome'>";
include('tab_menu.php');
echo "</div>";
}
?>

</div>

</body>
</html>
