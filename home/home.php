<?php
session_start();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INTERNATIONAL PORTFOLIO MANAGER</title>
	<!--JQuery AJAX library-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script src="../js/smallChart.js"></script> 	<!--to load smallChart-->
	<script src="../js/rightContentInMarket.js"></script>
	<script src="../js/validateRegisterForm.js"></script> <!-- validate sign up form with js-->
	<script src="../js/validateLogInForm.js"></script> <!-- validate log in form with js-->
	<script src="../js/searchTextField.js"></script> <!-- function to live search field-->
	<link rel="stylesheet"  type="text/css" href="../css/home.css">
	<link rel="stylesheet"  type="text/css" href="../css/header.css">
	<link rel="stylesheet"  type="text/css" href="../css/logIn.css">
	<link rel="stylesheet"  type="text/css" href="../css/headerTitle.css">
	<link rel="stylesheet"  type="text/css" href="../css/slideshow.css">
</head>
<body>
	<div class="header">
		<span class="home">
			<a  href="home.php" title="Clik here to return to the home page"><img id="logo" style="border: 3px solid #4CAF50;" src="../images/logo.gif" alt="International Portfolio Manager" height="70px" width="130px"/></a>
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
					<li class="dropdown"><a href="../market/djia.php">MARKET</a>
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
	<div class="mainContent">
		<div class="slideshowContainer">
			<div class="homeSlides fade">
				<div class="numberSlides">1 / 3</div>
				<a href="../market/djia.php"><img src="../images/marketOverview.png" style="width:90%;height:300px;border: 2px solid #bbb;opacity:0.8"/></a>
				<a href="../market/djia.php"><div class="textSlides">Market overview: DOW 30</div></a>
			</div>
			<div class="homeSlides fade">
				<div class="numberSlides">2 / 3</div>
				<a href="../calculator/calculator.php"><img src="../images/calculatorSlideshow.png" style="width:90%;height:300px;	border: 2px solid #bbb;opacity:0.8"/></a>
				<a href="../calculator/calculator.php"><div class="textSlides">Financial calculator</div></a>
			</div>
			<div class="homeSlides fade">
				<div class="numberSlides">3 / 3</div>
				<a href="../portfolio/portfolio.php"><img src="../images/portfolioSlideshow.png" style="width:90%;height:300px;	border: 2px solid #bbb;opacity:0.8"/></a>
				<a href="../portfolio/portfolio.php"><div class="textSlides">Portfolio</div></a>
			</div>
			<a class="previousSlide" onclick="plusSlides(-1)">&#10094;</a>
			<a class="nextSlide" onclick="plusSlides(1)">&#10095;</a>
		</div>
		<br><br><br><br><br>
		<div id="dots">
			<span class="dotSlides" onclick="currentSlide(1)"></span> 
			<span class="dotSlides" onclick="currentSlide(2)"></span> 
			<span class="dotSlides" onclick="currentSlide(3)"></span>  
		</div>
		<br>
		<div class="homeTitles">	
			<a href="../market/djia.php" class="homeMainTitle" title="Go to DOW 30">DOW 30</a>
			<span class="homeSubTitle">AMERICAN STOCKS</span>
		</div>
		<hr class="titleLine"/>
		<br>
		<table class="stockTable" id="dowStockTable">
			<caption>* Quotes delayed. Currency in USD</caption>
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
		<br>
		<div class="homeTitles">	
			<a href="../market/dax.php" class="homeMainTitle" title="Go to DAX">DAX</a>
			<span class="homeSubTitle">GERMAN STOCKS</span>
		</div>
		<hr class="titleLine">
		<br>
		<table class="stockTable" id="daxStockTable">
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
		<br>
		<div class="homeTitles">	
			<a href="../market/ftse100.php" class="homeMainTitle" title="Go to FTSE 100">FTSE 100</a>
			<span class="homeSubTitle">UK STOCKS</span>
		</div>
		<hr class="titleLine">
		<br>
		<table class="stockTable" id="ftseStockTable">
			<caption>* Quotes delayed. Currency in GBP</caption>
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
		<br>
		<div class="homeTitles">	
			<a href="../market/currencies.php" class="homeMainTitle" title="Go to Currencies">MAJOR CURRENCIES</a>
			<span class="homeSubTitle">EUROPA, USA, UK, JAPAN</span>
		</div>
		<hr class="titleLine">
		<br>
		<table class="stockTable" id="currenciesStockTable">
			<caption>* Quotes delayed</caption>
		<tr>
			<th>Name</th>
			<th>Rate</th>
			<th>Time</th>
			<th>Date</th>
		</tr>
		</table>
		<br>
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
<br>
<div><?php require("../php/footer.php"); ?></div>
<script>
var BASE_URL = 'https://query.yahooapis.com/v1/public/yql?q=';
var yql_query = 'select * from yahoo.finance.quotes where symbol in ("AAPL","AXP","BA","CAT")';
var yql_query_str = encodeURI(BASE_URL + yql_query);
var query_str_final = yql_query_str + "&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
$(document).ready(function(){
	$.getJSON(query_str_final, function(data){
		var stockQuotes = data.query.results.quote;
		for(var i = 0; i < stockQuotes.length; i++){
			var stockData = stockQuotes[i];
			switch(i){
				case 0:
				$("#dowStockTable").append("<tr><td><b><a href='../quotes/dow30/apple.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
				stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;	
				case 1:
				$("#dowStockTable").append("<tr><td><b><a href='../quotes/dow30/axp.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
				stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 2:
				$("#dowStockTable").append("<tr><td><b><a href='../quotes/dow30/ba.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
				stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 3:
				$("#dowStockTable").append("<tr><td><b><a href='../quotes/dow30/cat.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
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
var BASE_URL = 'https://query.yahooapis.com/v1/public/yql?q=';
var yql_query = 'select * from yahoo.finance.quotes where symbol in ("ADS.DE","BAYN.DE","BMW.DE","RWE.DE")';
var yql_query_str = encodeURI(BASE_URL + yql_query);
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
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/bayn.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;	
				case 2:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/bmw.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;	
				case 3:
					$("#stockTable").append("<tr><td><b><a href='../quotes/dax/rwe.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
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
</script>
<script>
var BASE_URL = 'https://query.yahooapis.com/v1/public/yql?q=';
var yql_query = 'select * from yahoo.finance.quotes where symbol in ("HSBA.L","IAG.L","SKY.L","TSCO.L")';
var yql_query_str = encodeURI(BASE_URL + yql_query);
var query_str_final = yql_query_str + "&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
$(document).ready(function(){
	$.getJSON(query_str_final, function(data){
		var stockQuotes = data.query.results.quote;
		for(var i = 0; i < stockQuotes.length; i++){
			var stockData = stockQuotes[i];
			switch(i){
				case 0:
					$("#ftseStockTable").append("<tr><td><b><a href='../quotes/ftse100/hsba.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 1:
					$("#ftseStockTable").append("<tr><td><b><a href='../quotes/ftse100/iag.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 2:
					$("#ftseStockTable").append("<tr><td><b><a href='../quotes/ftse100/sky.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 3:
					$("#ftseStockTable").append("<tr><td><b><a href='../quotes/ftse100/tsco.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
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
</script>
<script>
var BASE_URL = 'https://query.yahooapis.com/v1/public/yql?q=';
var yql_query = 'select * from yahoo.finance.xchange where pair in ("EURUSD","EURGBP","GBPUSD","USDJPY")';
var yql_query_str = encodeURI(BASE_URL + yql_query);
var query_str_final = yql_query_str + "&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
$(document).ready(function(){
	$.getJSON(query_str_final, function(data){
		var currency = data.query.results.rate;
		for(var i = 0; i < currency.length; i++){
			var currencyData = currency[i];
			switch(i){
				case 0:
					$("#currenciesStockTable").append("<tr><td><b><a href='../quotes/currencies/eurusd.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 1:
					$("#currenciesStockTable").append("<tr><td><b><a href='../quotes/currencies/eurgbp.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 2:
					$("#currenciesStockTable").append("<tr><td><b><a href='../quotes/currencies/gbpusd.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;
				case 3:
					$("#currenciesStockTable").append("<tr><td><b><a href='../quotes/currencies/usdjpy.php'</a>" + currencyData.Name + "</b></td><td>" + currencyData.Rate + "</td><td>" + currencyData.Time + "</td><td>" + currencyData.Date + "</td></tr>");
				break;				
			};
		};
	});
});
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
<!-- slideshow-->
<script>
var slideIndex = 1;
showSlides(slideIndex);
function plusSlides(n){
	showSlides(slideIndex += n);
}
function currentSlide(n) {
  showSlides(slideIndex = n);
}
function showSlides(n){
	var i;
	var slides = document.getElementsByClassName("homeSlides");
	var dots = document.getElementsByClassName("dotSlides");
	if(n > slides.length){
		slideIndex = 1
	}    
	if(n < 1){
		slideIndex = slides.length
	}
	for(i = 0; i < slides.length; i++){
      slides[i].style.display = "none";  
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" activeDotSlide", "");
	}
	slides[slideIndex-1].style.display = "block";  
	dots[slideIndex-1].className += " activeDotSlide";
}
</script>


<!--<script>
var slideIndex = 0;
showSlides();
function showSlides() {
    var i;
    var slides = document.getElementsByClassName("homeSlides");
	var dots = document.getElementsByClassName("dotSlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > slides.length) {
		slideIndex = 1
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" activeDotSlide", "");
	}
    slides[slideIndex-1].style.display = "block";
	dots[slideIndex-1].className += " activeDotSlide";
    setTimeout(showSlides, 3000); // Change image every 4 seconds
}
</script>-->
</body>
</html>