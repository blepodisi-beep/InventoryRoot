<?php
@session_start();
$_SESSION['pageID'] ="home";
//$_SESSION['pageID'] ="tabs";
?>

<!DOCType html>
<html>
<head>
<title> ORI IT Inventory</title>
<link rel="stylesheet" type="text/css" href="stylesheets/tab_menu.css">
<script type="text/javascript" src="javascripts/jQuery v1.11.1.js"></script>
<script type="text/javascript" src="javascripts/tab_menu.js"></script>
</head>

<body>

<div class="tabs-container" >

<ul class="tabs">
    <li class="tab-link current" data-tab="main-tab">Main Form</li>
    <li class="tab-link" data-tab="custodian-tab">Custodian</li>
    <li class="tab-link" data-tab="model-tab">Model</li>
    <li class="tab-link" data-tab="search-tab">List</li>
    <li class="tab-link" data-tab="modellist-tab">Model List</li>
</ul>

<div id="main-tab"  class="tab-content current">
<?php include("add/mainentry/index.php"); ?>
</div>

<div id="custodian-tab"  class="tab-content">
<?php include("add/custodian/index.php"); ?>
</div>

<div id="model-tab"  class="tab-content">
<?php include("add/model/index.php"); ?>
</div>

<div id="search-tab"  class="tab-content">
<?php include("search/index.php"); ?>
</div>

<div id="modellist-tab"  class="tab-content">
<?php include("search/modellist.php"); ?>
</div>

<!--main container close -->
</div>

</body>
</html>
