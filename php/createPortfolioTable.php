<?php
session_start(); //starting the session for user profile page
include "dbConnection.php";
// sql to create table
$portfolioTable = "CREATE TABLE portfolio (
portfolioId INT(10) UNSIGNED AUTO_INCREMENT, 
userId INT (6) UNSIGNED NOT NULL,
portfolioName VARCHAR(30) NOT NULL,
PRIMARY KEY (portfolioId),
CONSTRAINT portfolio_ibfk_1 FOREIGN KEY (userId) REFERENCES users (userId) ON DELETE CASCADE ON UPDATE CASCADE
)";
if ($connection->query($portfolioTable) === TRUE) {
    echo "Table PORTFOLIO created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}
$connection->close();
?>