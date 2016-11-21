<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Major currencies</title>
	<!--JQuery AJAX library-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script src="../js/smallChart.js"></script> 	<!--to load smallChart-->
	<script src="../js/rightContentInMarket.js"></script>`
	<script src="../js/validateRegisterForm.js"></script> <!-- validate sign up form with js-->
	<script src="../js/validateLogInForm.js"></script> <!-- validate log in form with js-->
	<script src="../js/searchTextField.js"></script> <!-- function to live search field-->
	<link rel="stylesheet"  type="text/css" href="../css/marketMenu.css">
	<link rel="stylesheet"  type="text/css" href="../css/header.css">
	<link rel="stylesheet"  type="text/css" href="../css/logIn.css">
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
				<ul class="navbar">
					<li class="dropdown"><a class="active" href="djia.php">MARKET</a>
						<!--<div class="dropdown-content">
							<a href="market.html">EQUITIES</a>
							<a href="">INDICES</a>
							<a href="../currencies/currencies.html">CURRENCIES</a>
						</div>-->
					</li>
					<li><a href="../watchlist/watchlist.php">WATCHLIST</a></li>
					<li><a href="../calculator/calculator.php">CALCULATOR</a></li>
					<li><a href="../portfolio/portfolio.php">PORTFOLIO MANAGER</a></li>
					<li><a href="../contact/contact.php">CONTACT</a></li>
				</ul>
	</div>
	<div class="titlePage">	
		<span class="mainTitle">MAJOR CURRENCIES</span>
		<span class="subTitle">EUROPE, USA, UK, AUSTRALIA, JAPAN AND SWITZERLAND</span>
	</div>
	<hr class="titleLine">
	<br>
  	<div class="mainContent">
		<div class="buttonsLine">
			<a href="djia.php"><button class="stocksButtons" id="djiaButton" type="button">DOW 30</button></a>
			<a href="dax.php"><button class="stocksButtons" id="daxButton" type="button">DAX</button></a>
			<a href="ftse100.php"><button class="stocksButtons" id="ftse100Button"type="button">FTSE 100</button></a>
			<button class="disabledButton"id="currenciesButton"type="button">MAJOR CURRENCIES</button>
		</div>
		<table id="stockTable">
		<tr>
			<th>Name</th>
			<th>Rate</th>
			<th>Time</th>
			<th>Date</th>
		</tr>
		</table>
	</div>
	<div class="rightContent">
		<div class="chart">
		<p>Market overview<p>
		<a href="../quotes/dow30/apple.php"><img id="imgChart_0" src="stock_chart_yahoo_finance/aapl.png" border="1" style="width:280px;height:200px;"/></a><br />
			<a id="link1" class="linkText" href='javascript:changeChart(0,0,%20&quot;y/aapl&quot;,%20&quot;AAPL&quot;);'><span id="div1d_0">1d</span></a>&nbsp;&nbsp;
			<a class="linkText" href='javascript:changeChart(1,0,%20&quot;y/aapl&quot;,%20&quot;AAPL&quot;);'><span id="div5d_0">1w</span></a>&nbsp;&nbsp;
			<a class="linkText" href='javascript:changeChart(2,0,%20&quot;y/aapl&quot;,%20&quot;AAPL&quot;);'><span id="div3m_0">3m</span></a>&nbsp;&nbsp;
			<a class="linkText" href='javascript:changeChart(3,0,%20&quot;y/aapl&quot;,%20&quot;AAPL&quot;);'><span id="div6m_0">6m</span></a>&nbsp;&nbsp;
			<a class="linkText" href='javascript:changeChart(4,0,%20&quot;y/aapl&quot;,%20&quot;AAPL&quot;);'><span id="div1y_0">1y</span></a>&nbsp;&nbsp;
			<a class="linkText" href='javascript:changeChart(5,0,%20&quot;y/aapl&quot;,%20&quot;AAPL&quot;);'><span id="div2y_0">2y</span></a>&nbsp;&nbsp;
			<a class="linkText" href='javascript:changeChart(6,0,%20&quot;y/aapl&quot;,%20&quot;AAPL&quot;);'><span id="div5y_0">5y</span></a>&nbsp;&nbsp;
			<a class="linkText" href='javascript:changeChart(7,0,%20&quot;y/aapl&quot;,%20&quot;AAPL&quot;);'><span id="divMax_0"><b>msx</b></span></a>
		</div>
		<table id="rightData">
			<caption>* Quotes delayed</caption>
			<tr>
				<th>Name</th>
				<th>Last Price</th>
				<th>% Change</th>	
			</tr>
		</table>
	</div>
<!-- The  Log in Modal -->
<div id="signInModal" class="modal">
	<span onclick="document.getElementById('signInModal').style.display='none'" class="close" title="Close Modal">&times;</span>
	<!-- Modal Content -->
	<form class="modal-content animate" action="../php/logIn.php" name="formLogIn" onsubmit="return validateLogInForm()" method="post"> 
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
			<p class="footerLogIn">Don't you have an account? <a href="../home/signUp.html">Register now here</a></p>
			<p class="footerLogIn">By proceeding, you agree to the IPM's Terms of service & Privacy policy</p>
		</div>
	</form>
</div>
<br><br><br><br><br>
<hr class="titleLine">
<div><?php require("../php/footer.php"); ?></div>
<script>
var BASE_URL = 'https://query.yahooapis.com/v1/public/yql?q=';
var yql_query = 'select * from yahoo.finance.xchange where pair in ("EURUSD","EURGBP","EURJPY","EURAUD","EURCHF","GBPUSD","GBPJPY","GBPCHF","GBPAUD","AUDUSD","USDJPY","USDCHF","AUDJPY")';
var yql_query_str = encodeURI(BASE_URL + yql_query);
var query_str_final = yql_query_str + "&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
$(document).ready(function(){
	$.getJSON(query_str_final, function(data){
		var currency = data.query.results.rate;
		for(var i = 0; i < currency.length; i++){
			var currencyData = currency[i];
			switch(i){
				case 0:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/eurusd.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 1:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/eurgbp.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 2:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/eurjpy.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 3:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/euraud.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 4:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/eurchf.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;				
				case 5:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/gbpusd.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 6:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/gbpjpy.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 7:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/gbpchf.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 8:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/gbpaud.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 9:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/audusd.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 10:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/usdjpy.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 11:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/usdchf.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 12:
				$("#stockTable").append("<tr><td><b><a href='../quotes/currencies/audjpy.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;	
			};
		};
	});
});
document.getElementById('link1').click();// to print the right chart
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