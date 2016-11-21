<?php
session_start(); //starting the session for user profile page
include "dbConnection.php"; // connection with the DB
function editHoldings(){
	$editHoldingsNameErr = $editHoldingsDateErr = $editHoldingsNoSharesErr = $editHoldingsPriceErr = "";
	if($_SERVER["REQUEST_METHOD"] == "POST"){ //to check the form has been submitted
		//if(empty($_POST["addHoldingsName"])){ // is the field name is empty alert a message
			//$addHoldingsNameErr = "You must select a company in Symbol/Name field";
		//} else{ // if it is not empty  save it after been tested
		//$addHoldingsName = $_POST["addHoldingsName"]; 	
		//}
		if(empty($_POST["editHoldingsDate"])){ // is the field name is empty alert a message
			$editHoldingsDateErr = "You must select the trading date";
		} else{ // if it is not empty  save it after been tested
		$editHoldingsDate = $_POST["editHoldingsDate"]; 	
		}
		if(empty($_POST["editHoldingsNoShares"])){ // is the field name is empty alert a message
			$editHoldingsNoSharesErr = "Numer of shares field must be filled out";
		} else{ // if it is not empty  save it after been tested
		$editHoldingsNoShares = $_POST["editHoldingsNoShares"]; 	
		}
		if(empty($_POST["editHoldingsPrice"])){ // is the field name is empty alert a message
			$editHoldingsPriceErr = "Price field must be filled out";
		} else{ // if it is not empty  save it after been tested
		$editHoldingsPrice = $_POST["editHoldingsPrice"]; 	
		}
	}
	if($editHoldingsNoShares <= 0){
		$editHoldingsNoSharesErr = "Number of shares must be a positive integer number";
	}
	if($editHoldingsPrice <= 0){
		$editHoldingsPriceErr = "Price must be a positive number";
	}
	$updateHolding = "UPDATE stock 
					SET numberOfShares = '$addHoldingsNoShares', price = '$addHoldingsPrice', purchaseDate = '$addHoldingsDate'
					WHERE stockId=$row['stockId']"; 
	//mysqli_query($connection, $insertPortfolioName);
	if($connection->query($updateHolding) === TRUE){
		header("Location: ../portfolio/portfolioUserRegister.php");
	} else{
		echo "Error: " . $updateHolding . "<br>" . $connection->error;
	}
}
if(isset($_POST["editHoldingsButton"])){ // when create portfolio button is clicked
	editHoldings();
}

?>