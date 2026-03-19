<?php
if (!isset($_SESSION))
{
session_start();
//$_SESSION['pageID']= "home";

}
else
{
session_destroy();
session_start();
//$_SESSION['pageID']= "home";
}
//echo $_SESSION['pageID'];
?>
<!DOCType html>
<html>
<head>
<title> ORI IT Inventory</title>
<link rel="stylesheet" type="text/css" href="stylesheets/main.css">
<link rel="stylesheet" type="text/css" href="stylesheets/equipstyle.css">
<script type="text/javascript" src="javascripts/jQuery v1.11.1.js"></script>
</head>

<body>
<div class="topbar">
<h3><u>Okavango Research Institute - IT Inventory</u></h3>
</div>


<div class="maincontainer" id ="maincontainer">

       <?php include('include/home.php'); ?>
 
</div>
<!--end of main wrapper -->
<!--Footer -->
<div class="footer">
<h5>| Okavango Research Institute 2014 |</h5>
</div>

</body>
</html>
