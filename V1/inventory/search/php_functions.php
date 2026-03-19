<?php

function count_computers(){
require('login/dblink.php');
$result=mysqli_query($myconn,"SELECT * FROM inventory where equip_type='Computer'");
$num_rows = mysqli_num_rows($result);

return $num_rows;
}

function count_monitors(){
require('login/dblink.php');
$result=mysqli_query($myconn,"SELECT * FROM inventory where equip_type='Monitor'");
$num_rows = mysqli_num_rows($result);

return $num_rows;
}

function count_printers(){
require('login/dblink.php');
$result=mysqli_query($myconn,"SELECT * FROM inventory where equip_type='Printer'");
$num_rows = mysqli_num_rows($result);

return $num_rows;
}

function count_others(){
require('login/dblink.php');
$result=mysqli_query($myconn,"SELECT * FROM inventory where equip_type<>'Computer' AND equip_type<>'Monitor' AND equip_type<>'Printer'");
$num_rows = mysqli_num_rows($result);

return $num_rows;
}

?>