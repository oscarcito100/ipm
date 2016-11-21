<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Germany DAX stocks data</title>
	<!--JQuery AJAX library-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script src="../js/smallChart.js"></script> 	<!--to load smallChart-->
	<script src="../js/rightContentInMarket.js"></script>
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
		<span class="mainTitle">DAX</span>
		<span class="subTitle">GERMANY STOCKS</span>
	</div>
	<hr class="titleLine">
	<br>
  	<div class="mainContent">
		<div class="buttonsLine">
			<a href="djia.php"><button class="stocksButtons" id="djiaButton" type="button">DOW 30</button></a>
			<button class="disabledButton" id="daxButton" type="button" disabled>DAX</button>
			<a href="ftse100.php"><button class="stocksButtons" id="ftse100Button"type="button">FTSE 100</button></a>
			<a href="currencies.php"><button class="stocksButtons" id="currenciesButton"type="button">MAJOR CURRENCIES</button></a>
		</div>
		<table id="stockTable">
			<caption>* Quotes delayed. Currency in EUR</caption>
			<tr>
				<th>Symbol</th>
				<th>Name</th>
				<th>Last Price</th>
				<th>Change</th>
				<th>% Change</th>
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
<hr class="titleLine">
<div><?php require("../php/footer.php"); ?></div>
<script>
var BASE_URL = 'https://query.yahooapis.com/v1/public/yql?q=';
var yql_query = 'select * from yahoo.finance.quotes where symbol in ("ADS.DE","ALV.DE","BAS.DE","BAYN.DE","BEI.DE","BMW.DE","CBK.DE","CON.DE","DAI.DE","DB1.DE","DBK.DE","DPW.DE","DTE.DE","EOAN.DE","FME.DE","FRE.DE","HEI.DE","HEN3.DE","IFX.DE","LHA.DE","LIN.DE","MRK.DE","MUV2.DE","PSM.DE","RWE.DE","SAP.DE","SIE.DE","TKA.DE","VNA.DE","VOW3.DE")';
var yql_query_str = encodeURI(BASE_URL+yql_query);
var query_str_final = yql_query_str + "&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
$(document).ready(function(){
	$.getJSON(query_str_final, function(data){
		var stockQuotes = data.query.results.quote;
		for(var i = 0; i < stockQuotes.length; i++){
			var stockData = stockQuotes[i];
			switch(i){ 
				case 0:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/ads.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 1:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/alv.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;	
				case 2:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/bas.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;	
				case 3:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/bayn.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;	
				case 4:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/bei.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;	
				case 5:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/bmw.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 6:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/cbk.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 7:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/continental.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 8:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/dai.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 9:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/db1.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 10:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/dbk.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 11:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/dpw.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 12:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/dte.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 13:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/eoan.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 14:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/fme.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 15:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/fre.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 16:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/hei.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 17:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/hen3.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;				
				case 18:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/ifx.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 19:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/lha.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 20:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/lin.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;				
				case 21:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/mrk.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 22:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/muv2.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 23:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/psm.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 24:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/rwe.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 25:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/sap.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;				
				case 26:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/sie.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;				
				case 27:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/tka.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 28:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/vna.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
				case 29:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/vow3.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;					
			};				
			var changeColor = document.getElementById("change");
			changeColor.innerHTML = stockData.Change;
			if(stockData.Change > 0){
			changeColor.style.color = "green";
			}
			if(stockData.Change < 0){
			changeColor.style.color = "red";
			}
			if(stockData.Change == 0){
			changeColor.style.color = "blue";
			}
			var percentChangeColor = document.getElementById("percentChange");
			percentChangeColor.innerHTML = stockData.PercentChange;
			if(parseInt(stockData.PercentChange) > 0){
			percentChangeColor.style.color = "green";
			}
			if(parseInt(stockData.PercentChange) < 0){
			percentChangeColor.style.color = "red";
			}
			if(parseInt(stockData.PercentChange) == 0){
			percentChangeColor.style.color = "blue";
			}
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