<?php
session_start(); //starting the session for user profile page
include "dbConnection.php";
// sql to create table
$commentTable = "CREATE TABLE comment (
commentId INT(10) UNSIGNED AUTO_INCREMENT, 
contactName VARCHAR(30) NOT NULL,
contactEmail VARCHAR(50) NOT NULL,
comment TEXT NOT NULL,
PRIMARY KEY (commentId)
)";
if ($connection->query($commentTable) === TRUE) {
    echo "Table COMMENT created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}
$connection->close();
?>