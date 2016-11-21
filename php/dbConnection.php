<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ipm";
// Create connection
$connection = new mysqli($servername, $username, $password, $database);
// Check connection
if (!$connection) {
    die("Connection failed: " .mysqli_connect_error());
}
?>