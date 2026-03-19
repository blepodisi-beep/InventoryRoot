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




<?php 


echo "<h2>Assets Documentation</h2>"; 




populate_links();


function populate_links(){
echo "<table>";
echo "<tr>";
echo "<th>Date</th>";
echo "<th>Type</th>";
echo "<th>Description</th>";
echo "<th>Path</th>";
echo "</tr>";






echo "</table>";

}










?>
