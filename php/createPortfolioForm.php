<?php
session_start(); //starting the session for user profile page
include "dbConnection.php"; // connection with the DB
include "users.php";
function insertPortfolioName(){
	$portfolioErr = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){ //to check the form has been submitted
		if(empty($_POST["portfolioName"])){ // is the field name is empty alert a message
			$portfolioErr = "A name for the portfolio is required";
		} else{ // if it is not empty  save it after been tested
		$portfolioName = $_POST["portfolioName"]; 	
		}
	}
	$portfolioNameLength = strlen($portfolioName);
	if($portfolioNameLength > 30){
		$portfolioErr = "Portfolio Name must be 30 characters maximum";
	}
	$insertPortfolioName = "INSERT INTO portfolio (userId, portfolioName) 
							VALUES (" . $_SESSION["userid"] . ",'$portfolioName')";
	// INSERT INTO `ipm`.`portfolio` (`portfolioId`, `userId`, `portfolioName`) VALUES ('1', '1', 'american stocks');							
	//global $connection;
	mysqli_query($insertPortfolioName);
	//if($connection->query($insertPortfolioName) === TRUE){
		//session_start();
		//$_SESSION['login'] = "1";
		header("Location: ../portfolio/portfolioUserRegister.php");
	/*} else{
		echo "Error: " . $insertPortfolioName . "<br>" . $connection->error;
	}*/
}
if(isset($_POST["createPortfolioButton"])){ // when create portfolio button is clicked
	insertPortfolioName();
}
$connection->close();
?>