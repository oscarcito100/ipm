<?php
session_start(); //starting the session for user profile page
include "dbConnection.php";
// sql to create table
$stockTable = "CREATE TABLE stock (
stockId INT(100) UNSIGNED AUTO_INCREMENT,
portfolioId INT(10) UNSIGNED NOT NULL,
stockName VARCHAR(30) NOT NULL,
numberOfShares INT(10) NOT NULL,
price FLOAT(2) NOT NULL,
purchaseDate DATE NOT NULL,
PRIMARY KEY (stockId),
CONSTRAINT stock_ibfk_1 FOREIGN KEY (portfolioId) REFERENCES portfolio (portfolioId) ON DELETE CASCADE ON UPDATE CASCADE
)"; 
if ($connection->query($stockTable) === TRUE) {
    echo "Table STOCK created successfully";
} else {
    echo "Error creating table: " . $connection->error;
}
$connection->close();
?>