<?php
session_start(); //starting the session for user profile page
include "../php/dbConnection.php"; // connection with the DB
function addHoldings(){
	$addHoldingsNameErr = $addHoldingsDateErr = $addHoldingsNoSharesErr = $addHoldingsPriceErr = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){ //to check the form has been submitted
		if(empty($_POST["addHoldingsName"])){ // is the field name is empty alert a message
			$addHoldingsNameErr = "You must select a company in Symbol/Name field";
		} else{ // if it is not empty  save it after been tested
		$addHoldingsName = $_POST["addHoldingsName"]; 	
		}
		if(empty($_POST["addHoldingsDate"])){ // is the field name is empty alert a message
			$addHoldingsDateErr = "You must select the trading date";
		} else{ // if it is not empty  save it after been tested
		$addHoldingsDate = $_POST["addHoldingsDate"]; 	
		}
		if(empty($_POST["addHoldingsNoShares"])){ // is the field name is empty alert a message
			$addHoldingsNoSharesErr = "Numer of shares field must be filled out";
		} else{ // if it is not empty  save it after been tested
		$addHoldingsNoShares = $_POST["addHoldingsNoShares"]; 	
		}
		if(empty($_POST["addHoldingsPrice"])){ // is the field name is empty alert a message
			$addHoldingsPriceErr = "Price field must be filled out";
		} else{ // if it is not empty  save it after been tested
		$addHoldingsPrice = $_POST["addHoldingsPrice"]; 	
		}
	}
	if($addHoldingsNoShares <= 0){
		$addHoldingsNoSharesErr = "Number of shares must be a positive integer number";
	}
	if($addHoldingsPrice <= 0){
		$addHoldingsPriceErr = "Price must be a positive number";
	}
	$insertHolding = "INSERT INTO stock (stockName,numberOfShares,price,purchaseDate) 
						VALUES ('$addHoldingsName','$addHoldingsNoShares','$addHoldingsPrice','$addHoldingsDate')";
	//INSERT INTO `ipm`.`stock` (`stockId`, `portfolioId`, `stockName`, `numberOfShares`, `price`, `purchaseDate`) VALUES ('1', '1', 'Apple', '100', '100', '2016-09-15');
	global $connection;
	//mysqli_query($connection, $insertPortfolioName);
	if($connection->query($insertHolding) === TRUE){
		header("Location: ../portfolio/portfolioUserRegister.php");
	} else{
		echo "Error: " . $insertHolding . "<br>" . $connection->error;
	}
}
if(isset($_POST["addHoldingsButton"])){ // when create portfolio button is clicked
	addHoldings();
}

?>