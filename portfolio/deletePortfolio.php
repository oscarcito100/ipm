<?php
session_start(); //starting the session for user profile page
?>
<!-- if everything is ok then the user wiil see the HTML code below the php if not we send him to "header"-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Create Portfolio</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script src="../js/validateCreatePortfolioForm.js"></script>
	<link rel="stylesheet"  type="text/css" href="../css/createPortfolio.css">
	<link rel="stylesheet"  type="text/css" href="../css/header.css">
</head>
<body>
	<div class="header">
		<span class="home">
			<a href="../home/home.html" title="Clik here to return to the home page"><img src="../images/logo.gif" alt="International Portfolio Manager" height="70px" width="130px"/></a>
		</span>
			<form action="" class="search">
				<input type="text" placeholder="AAPL or apple..." size="50"/>
				<button class="searchButton" type="search">SEARCH</button>
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
	<div class="createPortfolioForm">
		<form name="createPortfolioForm" action="../php/createPortfolioForm.php" method="post" onsubmit="return validateCreatePortfolioForm()">
			<label id="labelCreatePortfolio">Give a name to your Portfolio:</label>
			<br>
			<input type="text" id="inputPortfolioName" name="portfolioName" placeholder="Portfolio name" size="50"/>
			<br>
			<button type="submit" id="createPortfolioButton" name="createPortfolioButton">CREATE PORTFOLIO</button>
			<a href="portfolioUserRegister.php"><button type="button" id="cancelPortfolioButton" name="cancelPortfolioButton">CANCEL</button></a>	
		</form>
	</div>
</body>
</html>