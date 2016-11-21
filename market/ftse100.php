<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>UK FTSE 100 stocks data</title>
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
		<span class="mainTitle">FTSE 100</span>
		<span class="subTitle">UK STOCKS</span>
	</div>
	<hr class="titleLine">
	<br>
	<div class="mainContent">
		<div class="buttonsLine">
			<a href="djia.php"><button class="stocksButtons" id="djiaButton" type="button">DOW 30</button></a>
			<a href="dax.php"><button class="stocksButtons" id="daxButton" type="button">DAX</button></a>
			<button class="disabledButton" id="ftse100Button"type="button" disabled>FTSE 100</button>
			<a href="currencies.php"><button class="stocksButtons" id="currenciesButton"type="button">MAJOR CURRENCIES</button></a>
		</div>
		<table id="stockTable">
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
var yql_query = 'select * from yahoo.finance.quotes where symbol in ("ABF.L","ADM.L","AHT.L","ANTO.L","ARM.L","AV.L","AZN.L","BA.L","BAB.L","BARC.L","BATS.L","BDEV.L","BKG.L","BLND.L","BLT.L","BNZL.L","BP.L","BRBY.L","BT-A.L","CCH.L","CCL.L","CNA.L","CPG.L","CPI.L","CRH.L","DC.L","DCC.L","DGE.L","DLG.L","EXPN.L","EZJ.L","FRES.L","GKN.L","GLEN.L","GSK.L","HIK.L","HL.L","HMSO.L","HSBA.L","IAG.L","III.L","IMB.L","INF.L","INTU.L","ITRK.L","ITV.L","JMAT.L","KGF.L","LAND.L","LGEN.L","LLOY.L","LSE.L","MDC.L","MERL.L","MKS.L","MNDI.L","MRW.L","NG.L","NXT.L","OML.L","PFG.L","PPB.L","PRU.L","PSN.L","PSON.L","RB.L","RBS.L","RDSA.L","RDSB.L","REL.L","REX.L","RIO.L","RMG.L","RR.L","RRS.L","RSA.L","SAB.L","SBRY.L","SDR.L","SGE.L","SHP.L","SKY.L","SL.L","SN.L","SN.L","SSE.L","STAN.L","STJ.L","SVT.L","TPK.L","TSCO.L","TUI.L","TW.L","ULVR.L","UU.L","VOD.L","WOS.L","WPG.L","WPP.L")';
var yql_query_str = encodeURI(BASE_URL+yql_query);
var query_str_final = yql_query_str + "&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
$(document).ready(function(){
	$.getJSON(query_str_final, function(data){
		var stockQuotes = data.query.results.quote;
		for(var i = 0; i < stockQuotes.length; i++){
			var stockData = stockQuotes[i];
			switch(i){
				case 0:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/abf.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 1:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/adm.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 2:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/aht.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 3:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/anto.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 4:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/arm.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 5:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/av.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 6:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/azn.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 7:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/ba.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 8:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/bab.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 9:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/barc.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 10:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/bats.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 11:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/bdev.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;				
				case 12:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/bkg.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;		
				case 13:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/blnd.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 14:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/blt.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 15:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/bnzl.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 16:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/bp.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 17:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/brby.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 18:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/bta.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 19:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/cch.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 20:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/ccl.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 21:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/cna.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 22:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/cpg.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 23:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/cpi.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 24:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/crh.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 25:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/dc.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 26:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/dcc.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 27:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/dge.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 28:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/dlg.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 29:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/expn.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 30:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/ezj.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 31:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/fres.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 32:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/gkn.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 33:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/glen.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 34:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/gsk.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 35:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/hik.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 36:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/hl.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 37:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/hmso.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 38:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/hsba.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 39:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/iag.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 40:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/iii.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 41:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/imb.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 42:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/inf.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 43:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/intu.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 44:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/itrk.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 45:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/itv.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 46:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/jmat.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 47:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/kgf.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 48:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/land.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 49:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/lgen.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 50:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/lloy.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 51:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/lse.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 52:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/mdc.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 53:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/merl.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 54:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/mks.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;				
				case 55:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/mndi.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;	
				case 56:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/mrw.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 57:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/ng.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 58:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/nxt.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 59:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/oml.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 60:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/pfg.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 61:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/ppb.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 62:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/pru.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 63:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/psn.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 64:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/pson.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 65:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rb.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 66:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rbs.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 67:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rdsa.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 68:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rdsb.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 69:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rel.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 70:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rex.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 71:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rio.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 72:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rmg.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 73:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rr.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 74:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rrs.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 75:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/rsa.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 76:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/sab.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 77:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/sbry.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 78:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/sdr.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 79:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/sge.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 80:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/shp.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 81:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/sky.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 82:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/sl.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 83:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/sn.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 84:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/sse.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 85:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/stan.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 86:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/stj.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 87:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/svt.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 88:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/tpk.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 89:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/tsco.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 90:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/tui.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 91:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/tw.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 92:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/ulvr.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 93:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/uu.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 94:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/vod.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;	
				case 95:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/wos.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 96:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/wpg.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
					stockData.Change + "</td><td id='percentChange'>" + stockData.PercentChange + "</td><td>" + stockData.LastTradeTime + "</td><td>" + stockData.LastTradeDate + "</td></tr>");
				break;
				case 97:
					$("#stockTable").append("<tr><td><b><a href='../quotes/ftse100/wpp.php'</a>" + stockData.Symbol + "</b></td><td>" + stockData.Name + "</td><td>" + stockData.LastTradePriceOnly + "</td><td id='change'>" + 
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