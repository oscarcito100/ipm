<?php
session_start(); //starting the session for user profile page
include "../php/dbConnection.php"; // connection with the DB
?>
<!-- if everything is ok then the user wiil see the HTML code below the php if not we send him to "header"-->
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Add Holdings | Portfolio Manager</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script src="../js/validateAddHoldingsForm.js"></script>
	<script src="../js/searchTextField.js"></script> <!-- function to live search field-->
	<link rel="stylesheet"  type="text/css" href="../css/addHoldingsToPortfolio.css">
	<link rel="stylesheet"  type="text/css" href="../css/header.css">
	<link rel="stylesheet"  type="text/css" href="../css/headerTitle.css">
</head>
<body>
	<div class="header">
		<span class="home">
			<a href="../home/home.php" title="Clik here to return to the home page"><img src="../images/logo.gif" alt="International Portfolio Manager" height="70px" width="130px"/></a>
		</span>
			<form class="search">
				<input type="text" onkeyup="searchTextField(this.value)" placeholder="AAPL or apple..." size="50"/>
				<div id="searchOutput"></div>
			</form>
			<span class="date"><?php echo date(" l d/m/Y h:i:sa"); ?><br></span>			
			<?php
			if(isset($_SESSION["username"]) == TRUE){
				echo "<span class='sign'>Hi, " .$_SESSION["username"]. "<a href='../php/logOut.php'> Log Out?</a></span>";
			} else{
				echo "<span class='sign'><a href='../home/signUp.html'>Sign up</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href='#signInModal' onclick=\"document.getElementById('signInModal').style.display='block'\">Sign in</a></span>"; // escape double quotes
			}
			?>
				<ul>
					<li class="dropdown"><a href="../market/djia.php">MARKET</a>
						<!--<div class="dropdown-content">
							<a href="djia.html">DJIA</a>
							<a href="dax.html">DAX 30</a>
							<a href="ftse100.html">FTSE 100</a>
							<a href="../currencies/currencies.html">CURRENCIES</a>
						</div>-->
					</li>
					<li><a href="../watchlist/watchlist.php">WATCHLIST</a></li>
					<li><a href="../calculator/calculator.php">CALCULATOR</a></li>
					<li><a class="active" href="portfolio.php">PORTFOLIO MANAGER</a></li>
					<li><a href="../contact/contact.php">CONTACT</a></li>
				</ul>	
	</div>
	<div class="titlePage">	
		<span class="mainTitle">ADD HOLDINGS</span>
		<span class="subTitle">SEARCH STOCK, ADD PRICE AND NUMBER OF SHARES</span>
	</div>
	<hr class="titleLine">
<!--<?php 
	$selectPortfolio = "SELECT * FROM portfolio";
	$result = mysqli_query($connection, $selectPortfolio);
	$row = mysqli_fetch_assoc($result);
?>-->
	<br>
	<div id="portfolioName">Portfolio: <?php echo $row['portfolioName']; ?></div>
	<br>
	<div id="addHoldingsForm">
		<form name="addHoldingsForm" action="../portfolio/addHoldingsForm.php" method="post" onsubmit="return validateAddHoldingsForm()">
			<table>
				<tr>
					<th>Symbol or Name</th>
					<th>Date of purchase</th>
					<th>No of shares</th>
					<th>Price per share</th>
				</tr>
				<tr>
					<td><input type="search" class="addHoldingsFields" name="addHoldingsName" placeholder="AAPL or Apple"></td>
					<td><input type="date" class="addHoldingsFields" name="addHoldingsDate"></td>
					<td><input type="number" class="addHoldingsFields" name="addHoldingsNoShares" min="1" placeholder="125"></td>
					<td><input type="number" class="addHoldingsFields" name="addHoldingsPrice" min="0" placeholder="Price"></td>
				</tr>
			</table>
			<button type="submit" id="addHoldingsButton" name="addHoldingsButton">ADD HOLDINGS</button>
			<a href="portfolioUserRegister.php"><button type="button" id="cancelHoldingsButton" name="cancelHoldingsButton">CANCEL</button></a>	
		</form>
	</div>
	<br>
	<hr class="titleLine">
	<div><?php require("../php/footer.php"); ?></div>
	<!--<div>
		<table>
			<tr>
				<th>Symbol</th>
				<th>Date of purchase</th>
				<th>No of shares</th>
				<th>Price per share</th>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>	
		</table>
	</div>-->
</body>
</html>