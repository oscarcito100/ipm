<?php
include "dbConnection.php";
// sql to create table
// don't make username and email unique becasue i prefer a validation form rather than a message from the database
$userTable = "CREATE TABLE users (
userId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(20) NOT NULL, 
email VARCHAR(50) NOT NULL,
password VARCHAR(20) NOT NULL,
regisDate DATE NOT NULL
)";
if ($connection->query($userTable) === TRUE) {
    echo "Table USERS created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}
$connection->close();
?>