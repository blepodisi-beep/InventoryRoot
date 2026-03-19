
<?php
$servername = "localhost";
$username = "admin";
$password = "@dm1n01CA";
$db= "inventory";
// Create connection
$myconn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($myconn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
# echo "Connected successfully";
?>
