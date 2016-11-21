<?php
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$connection = new mysqli($servername, $username, $password);
// Check connection
if (!$connection) {
    die("Connection failed: " .mysqli_connect_error());
} 
echo "Connected successfully";
// create a database
$database = "CREATE DATABASE ipm";
if ($connection->query($database) === TRUE){
	echo "Database created successfully";
}else{
	echo "Error creating database: " .$connection->error;
}
$connection->close();
?>