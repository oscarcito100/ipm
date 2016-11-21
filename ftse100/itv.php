<?php
session_start(); // start session
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title id="stockTitleName"></title> <!-- title in the tab -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>	<!--JQuery AJAX library-->
	<script src="../../js/ukStockData.js"></script> <!-- File to get all the data of a german company, i can use it for all stock in euros-->
	<script src="../../js/validateRegisterForm.js"></script> <!-- validate sign up form with js-->
	<script src="../../js/validateLogInFormForm.js"></script> <!-- validate log in form with js-->
	<script type="text/javascript" src="https://d33t3vvu2t2yu5.cloudfront.net/tv.js"></script>	<!-- TradingView  -->
	<link rel="stylesheet"  type="text/css" href="../../css/header.css">  <!-- style of the navbar -->
	<link rel="stylesheet"  type="text/css" href="../../css/stocks.css">  <!-- style of all stock pages -->
	<link rel="stylesheet"  type="text/css" href="../../css/logIn.css">  <!-- style of the log in modal -->
	<link rel="stylesheet"  type="text/css" href="../../css/headerTitle.css">  <!-- style for the content title after navbar -->
</head>
<body onload="start()">
	<div class="header">
		<span class="home">
			<a href="../../home/home.php" title="Clik here to return to the home page"><img src="../../images/logo.gif" alt="International Portfolio Manager" height="70px" width="130px"/></a>
		</span>
			<form action="" class="search">
				<input type="text" placeholder="AAPL or apple..." size="50"/>
				<button class="searchButton" type="search">SEARCH</button>
			</form>
			<span class="date"><?php echo date(" l d/m/Y h:i:sa"); ?><br></span> <!-- display the date -->
			<?php // check if a user is connected or not
			if(isset($_SESSION["username"]) == TRUE){
				echo "<span class='sign'>Hi, " .$_SESSION["username"]. "<a href='../../php/logOut.php'> Log Out?</a></span>";
			} else{
				echo "<span class='sign'><a href='../../home/signUp.html'>Sign up</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href='#signInModal' onclick=\"document.getElementById('signInModal').style.display='block'\">Sign in</a></span>"; // escape double quotes
			}
			?>
			<ul class="navbar"> <!-- navbar--> 
					<li class="dropdown"><a class="active" href="../../market/djia.php">MARKET</a>
						<!--<div class="dropdown-content">
							<a href="market.html">EQUITIES</a>
							<a href="">INDICES</a>
							<a href="../currencies/currencies.html">CURRENCIES</a>
						</div>-->
					</li>
					<li><a href="../../watchlist/watchlist.php">WATCHLIST</a></li>
					<li><a href="../../calculator/calculator.php">CALCULATOR</a></li>
					<li><a href="../../portfolio/portfolio.php">PORTFOLIO MANAGER</a></li>
					<li><a href="../../contact/contact.php">CONTACT</a></li>
				</ul>
	</div>
	<div class="titlePage">	<!-- title of the content of the page-->
		<span class="mainTitle" id="stockName"></span>
		<span class="subTitle">UK STOCKS</span>
	</div>
	<hr class="titleLine">
	<div class="mainContent">
		<table id="stockTable"> <!-- line with the stock data to identify it -->
			<tr><th></th><th></th><th></th><th></th><td></td><td></td></tr>
		</table>
		<br>
		<div class="buttonsLine"> <!-- buttons to quick access-->
			<a href="../../market/djia.php"><button class="stocksButtons" id="djiaButton" type="button">DOW 30</button></a>
			<a href="../../market/dax.php"><button class="stocksButtons" id="daxButton" type="button">DAX</button></a>
			<a href="../../market/ftse100.php"><button class="stocksButtons" id="ftse100Button"type="button">FTSE 100</button></a>
			<a href="../../market/currencies.php"><button class="stocksButtons" id="currenciesButton"type="button">MAJOR CURRENCIES</button></a>
		</div>
		<br>
<script> <!-- get the chart from tradinview-->
new TradingView.widget({
  "width": 1000,
  "height": 500,
  "symbol": "LSE:ITV",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "White",
  "style": "1",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "hide_side_toolbar":false,
  "allow_symbol_change": true,
  "hideideas": true,
  "show_popup_button": true,
  "popup_width": "1000",
  "popup_height": "650"
});
</script>
		<br>
		<table id="statisticsTable"> <!-- statistical data-->
			<tr><th colspan="2" style="text-decoration: underline;">STATISTICS</th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>	
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>
			<tr><td></td><th></th></tr>		
		</table>	
		<table id="ratiosTable"> <!-- financial data-->
			<tr><th colspan="4" style="text-decoration: underline;">FINANCIAL RATIOS</th></tr>
			<tr><td></td><th></th><td></td><th></th></tr>
			<tr><td></td><th></th><td></td><th></th></tr>
			<tr><td></td><th></th><td></td><th></th></tr>
			<tr><td></td><th></th><td></td><th></th></tr>
		</table>
		<table id="technicalTable"> <!-- technical data-->
			<tr><th colspan="4" style="text-decoration: underline;">TECHNICAL DATA</th></tr>
			<tr><td></td><th></th><td></td><th></th></tr>
			<tr><td></td><th></th><td></td><th></th></tr>
			<tr><td></td><th></th><td></td><th></th></tr>
		</table>
	</div>
<!-- The  Log in Modal -->
<div id="signInModal" class="modal">
	<span onclick="document.getElementById('signInModal').style.display='none'" class="close" title="Close Modal">&times;</span>
	<!-- Modal Content -->
	<form class="modal-content animate" action="../../php/logIn.php" name="formLogIn" onsubmit="return validateLogInForm()" method="post"> 
		<div class="container">
			<label class="formTitles">Username:</label><br/>
			<input class="logInFields" type="text" name="username" size="50" placeholder="Enter Username" minlength="6" required/> 			
			<label class="formTitles">Password:</label><br/>
			<input class="logInFields" type="password" name="password" size="50" placeholder="Enter Password" minlength="10" maxlength="20" required/>
			<input type="checkbox" name="checkRemember" checked="checked"/> Remember me 
			<span class="rightSide"><a href="lostPassword.html">Retrieve Password</a></span>
			<button type="submit" class="logInButton" title="register" name="submit">LOG IN</button><br/>
		</div>
		<div class="containerBottom">
			<button type="button" class="cancelButton" onclick="document.getElementById('signInModal').style.display='none'" title="Cancel Log in">CANCEL</button><br/>
			<p class="footerLogIn">Don't you have an account? <a href="../../home/signUp.html">Register now here</a></p>
			<p class="footerLogIn">By proceeding, you agree to the IPM's Terms of service & Privacy policy</p>
		</div>
	</form>
</div>
<hr id="footerLine">
<div id="footer"><?php require("../../php/footer.php"); ?></div> <!-- footer -->
<script>
var BASE_URL = 'https://query.yahooapis.com/v1/public/yql?q=';
var yql_query = 'select * from yahoo.finance.quotes where symbol in ("ITV.L")';
</script>
<script>
// Get the modal for sign in
var signInModal = document.getElementById('signInModal');
// When the user clicks anywhere outside of the modal, close it
 window.onclick = function(event) {
    if (event.target == signInModal) {
        signInModal.style.display = "none";
    }
}
</script>
</body>
</html>