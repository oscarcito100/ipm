<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Calculator | IPM</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script src="../js/validateRegisterForm.js"></script> <!-- validate sign up form with js-->
	<script src="../js/validateLogInForm.js"></script> <!-- validate log in form with js-->
	<script src="../js/searchTextField.js"></script> <!-- function to live search field-->
	<link rel="stylesheet"  type="text/css" href="../css/calculator.css">
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
					<li><a class="active" href="calculator.php">CALCULATOR</a></li>
					<li><a href="../portfolio/portfolio.php">PORTFOLIO MANAGER</a></li>
					<li><a href="../contact/contact.php">CONTACT</a></li>
				</ul>	
	</div>
	<div class="titlePage">	
		<span class="mainTitle">CALCULATE</span>
		<span class="subTitle">FOREIGN INVESTMENT AND NUMBER OF SHARES</span>
	</div>
	<hr class="titleLine">
		<table id="foreignInvestmentTable">
			<tr>
				<td><label for="ChooseLocalCurrency">Choose your local currency: </label></td>
				<form>
				<td><select id="selLocalCurrency" onchange="exchangeRate()">
					<option id="localGBP" selected value="localGBP">Pound: GBP</option>
					<option id="localUSD" value="localUSD">Dollar: USD</option>
					<option id="localEUR" value="localEUR">Euro: EUR</option>
				</select></td>
				</form>
			</tr>
			<br />
			<tr>
				<td><label for="ChooseForeignCurrency">Choose your foreign currency: </label></td>
				<form>
				<td><select id="selForeignCurrency" onchange="exchangeRate()">
						<option id="foreignGBP" value="foreignGBP">Pound: GBP</option>
						<option id="foreignUSD" selected value="foreignUSD">Dollar: USD</option>
						<option id="foreignEUR" value="foreignEUR">Euro: EUR</option>
				</select></td>
				</form>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>			
			<tr>
				<td><label id="amountLabel">Amount to invest in local currency:</label> </td>
				<td><input type="text" class="inputCalculator" id="amountToInvest" placeholder="Pounds to invest" onfocus="focusInputText(this)"/></td>
			</tr>
			<tr>
				<td><label for="ExchangeRate">Exchange rate:</label></td>
				<td><input type="number" id="exchangeRate" disabled="disabled"/></td>
			</tr>
			<tr>
				<td><label id="pricePerShareLabel">Price per share in foreign currency:</label></td>
				<td><input type="text" class="inputCalculator" id="pricePerShare" placeholder="Price" onfocus="focusInputText(this)"/></td>
			</tr>
			<tr>
				<td></td>
				<td><button type="button" class="investmentButton" onclick="calculateInvestment()">CALCULATE</button>
					<button type="reset" class="investmentButton" onclick="clearInvestmentFields()">RESET</button></td>
			</tr>
			<tr>
				<td><label id="investmentForeignLabel">Investment in foreign currency:</label></td>
				<td><input type="text" id="valueToInvestInForeignCurrency" disabled="on"/></td>
			</tr>	
			<tr>
				<td><label for="NumberSharesToBuy">Number of shares you can buy:</label></td>
				<td><input type="text" id="numberOfShares" disabled="on"/></td>
			</tr>
		</table>
		<br>
	<div class="titlePage2">	
		<span class="mainTitle">CALCULATE</span>
		<span class="subTitle">INTERNATIONAL RETURN PREDICTER</span>
	</div>
	<hr class="titleLine">
		<table id="formPredicter">
			<tr>
				<td><label>Initial Investment in Local Curreny: </label></td>
				<td><input type="text" class="inputCalculator" id="initialInvestmentLocal" placeholder="Amount invested" onfocus="focusInputText(this)"/>
				<td><select id="selLocalCurrencyPredictor">
					<option id="localGBPPredictor" selected value="localGBP">Pound: GBP</option>
					<option id="localUSDPredictor" value="localUSD">Dollar: USD</option>
					<option id="localEURPredictor" value="localEUR">Euro: EUR</option>
				</select></td>
			</tr>
			<tr>
				<td><label>Number of shares: </label></td>
				<td><input type="text" class="inputCalculator" id="numberOfSharesBought" placeholder="Shares bought" onfocus="focusInputText(this)"/></td>
				<td></td>
			</tr>
			<tr>
				<td><label>Purchase price: </label></td>
				<td><input type="text" class="inputCalculator" id="purchasePrice" placeholder="Average purchase price" onfocus="focusInputText(this)"/></td>
				<td></td>			
			</tr>
			<tr>
				<td><label>Sale price: </label></td>
				<td><input type="text" class="inputCalculator" id="salePrice" placeholder="Average sale price"/ onfocus="focusInputText(this)"></td>
				<td></td>			
			</tr>
			<tr>
				<td></td>
				<td><button type="button" class="investmentButton" id="calculateInvestment" onclick="calculateReturnPredictor()">CALCULATE</button></td>
				<td><button type="reset" class="investmentButton" id="resetButoon" onclick="resetInvestment()">RESET</button></td>				
			</tr>		
			<tr>
				<td><label>Initial Investment in Foreign Currency: </label></td>
				<td><input type="text" id="initialInvestmentForeign" disabled="disabled"/></td>
				<td><select id="selForeignCurrencyPredictor">
						<option id="foreignGBPPredictor" value="foreignGBP">Pound: GBP</option>
						<option id="foreignUSDPredictor" selected value="foreignUSD">Dollar: USD</option>
						<option id="foreignEURPredictor" value="foreignEUR">Euro: EUR</option>
				</select></td>			
			</tr>
			<tr>
				<td><label>Initial Exchange Rate: </label></td>
				<td><input type="text" id="initialExchangeRate" disabled="disabled"/></td>
				<td></td>			
			</tr>
		</table>
		<br>
		<table id="predicterTable">
			<thead>
				<tr>
					<th id="firstCell" rowspan="2"></th>
					<th rowspan="2">Results in Foreign Currency</th>
					<th>Results in Local Currency</th>
				</tr>
				<tr>
					<th><label>Future Exchange: </label><input type="text" class="inputCalculator" id="futureExchangeRatePrice" onfocus="focusInputText(this)"maxlength="6"/ size="10" placeholder="Rate">
					<button type="button" class="investmentButton" id="calculateFutureExchangeRate" onclick="calculateReturnPredictor()">CALCULATE</button>
					<button type="reset" class="investmentButton" id="resetButtonFutureExchangeRate" onclick="resetFutureExchangeRate()">RESET</button>
					</th>
				</tr>
			</thead>
			<!--<tfoot>
				<tr>
					<td></td>
					<td><button class="investmentButton" type="button" id="foreignButton"/>Show Chart</td>
					<td><button class="investmentButton" type="button" id="localButton"/>Show Chart</td>
				</tr>
			</tfoot>-->
			<tbody>
				<tr>
					<th>Final Investment Value</th>
					<td id="valueForeign"></td>			
					<td id="valueLocal"></td>
				</tr>			
				<tr>
					<th>Profit or Loss</th>
					<td id="profitForeign"></td>
					<td id="profitLocal"></td>				
				</tr>
				<tr>
					<th>Return in %</th>
					<td id="returnForeign"></td>
					<td id="returnLocal"></td>
			</tr>
			</tbody>
		</table>	
		<hr class="titleLine">
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
<div><?php require("../php/footer.php"); ?></div>
<script>
// to get the three exchange rates from yahoo
var BASE_URL = 'https://query.yahooapis.com/v1/public/yql?q=';
var yql_query = 'select * from yahoo.finance.xchange where pair in ("EURUSD","GBPUSD","EURGBP")';
var yql_query_str = encodeURI(BASE_URL+yql_query);
var query_str_final = yql_query_str + "&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
// values of the rates
var gbpusdRate;
var eurgbpRate;
var eurusdRate;
$(document).ready(function(){ // to get data from the query
	$.getJSON(query_str_final, function(data){
		var currency = data.query.results.rate;
		for(var i = 0; i < currency.length; i++){
			var currencyData = currency[i];
			switch (i){ // to get the individual exchange rates
				case 0:
					eurusdRate = currencyData.Rate;
					break;
				case 1:
					gbpusdRate = currencyData.Rate;
					break;
				case 2:
					eurgbpRate = currencyData.Rate;
					break;
			};	
		};
		exchangeRate();
	});
});
// to get the specific rate in the field depending on the selected currencies
var localGBP = document.getElementById("localGBP");
var localUSD = document.getElementById("localUSD");
var localEUR = document.getElementById("localEUR");
var foreignGBP = document.getElementById("foreignGBP");
var foreignUSD = document.getElementById("foreignUSD");
var foreignEUR = document.getElementById("foreignEUR");
document.getElementById("exchangeRate").value = gbpusdRate; // by default this is the exchangeRate
function exchangeRate(){
	// oposite values
	var usdgbpRate = (1/gbpusdRate).toFixed(4);
	var gbpeurRate = (1/eurgbpRate).toFixed(4);
	var usdeurRate = (1/eurusdRate).toFixed(4);
	// if statements to display the correct exchange rate according to the user's selection
	var newPlaceholderGBP = document.getElementById("amountToInvest");	
	var newPlaceholderUSD = document.getElementById("amountToInvest");
	var newPlaceholderEUR = document.getElementById("amountToInvest");
		if(localGBP.selected == true && foreignUSD.selected == true){
			document.getElementById("exchangeRate").value = gbpusdRate;
			newPlaceholderGBP.placeholder = "Pounds to invest";		
			document.getElementById("amountLabel").innerHTML = "Amount to invest in Pounds is:";
			document.getElementById("investmentForeignLabel").innerHTML = "Your investment in Dollars is:";
			document.getElementById("pricePerShareLabel").innerHTML = "Price per share in Dollars is:";				
		}
		if(localUSD.selected == true && foreignGBP.selected == true){
			document.getElementById("exchangeRate").value = usdgbpRate;
			newPlaceholderUSD.placeholder = "Dolars to invest";
			document.getElementById("amountLabel").innerHTML = "Amount to invest in Dollars is:";			
			document.getElementById("investmentForeignLabel").innerHTML = "Your investment in Pounds is:";
			document.getElementById("pricePerShareLabel").innerHTML = "Price per share in Pounds is:";						
		}
		if(localEUR.selected == true && foreignGBP.selected == true){
			document.getElementById("exchangeRate").value = eurgbpRate;
			newPlaceholderEUR.placeholder = "Euros to invest";			
			document.getElementById("amountLabel").innerHTML = "Amount to invest in Euros is:";			
			document.getElementById("investmentForeignLabel").innerHTML = "Your investment in Pounds is:";
			document.getElementById("pricePerShareLabel").innerHTML = "Price per share in Pounds is:";						
		}
		if(localGBP.selected == true && foreignEUR.selected == true){
			document.getElementById("exchangeRate").value = gbpeurRate;
			newPlaceholderGBP.placeholder = "Pounds to invest";			
			document.getElementById("amountLabel").innerHTML = "Amount to invest in Pounds is:";			
			document.getElementById("investmentForeignLabel").innerHTML = "Your investment in Euros is:";
			document.getElementById("pricePerShareLabel").innerHTML = "Price per share in Euros is:";						
		}
		if(localEUR.selected == true && foreignUSD.selected == true){
			document.getElementById("exchangeRate").value = eurusdRate;
			newPlaceholderEUR.placeholder = "Euros to invest";	
			document.getElementById("amountLabel").innerHTML = "Amount to invest in Euros is:";				
			document.getElementById("investmentForeignLabel").innerHTML = "Your investment in Dollars is:";
			document.getElementById("pricePerShareLabel").innerHTML = "Price per share in Dollars is:";				
		}
		if(localUSD.selected == true && foreignEUR.selected == true){
			document.getElementById("exchangeRate").value = usdeurRate;	
			newPlaceholderUSD.placeholder = "Dolars to invest";
			document.getElementById("amountLabel").innerHTML = "Amount to invest in Dollars is:";				
			document.getElementById("investmentForeignLabel").innerHTML = "Your investment in Euros is:";
			document.getElementById("pricePerShareLabel").innerHTML = "Price per share in Euros is:";				
		}
		if(localGBP.selected == true && foreignGBP.selected == true){
			document.getElementById("exchangeRate").value = "1.00";
			newPlaceholderGBP.placeholder = "Pounds to invest";				
			document.getElementById("amountLabel").innerHTML = "Amount to invest in Pounds is:";
			document.getElementById("investmentForeignLabel").innerHTML = "Your investment in Pounds is:";
			document.getElementById("pricePerShareLabel").innerHTML = "Price per share in Pounds is:";							
		}
		if(localUSD.selected == true && foreignUSD.selected == true){
			document.getElementById("exchangeRate").value = "1.00";
			newPlaceholderUSD.placeholder = "Dolars to invest";
			document.getElementById("amountLabel").innerHTML = "Amount to invest in Dollars is:";				
			document.getElementById("investmentForeignLabel").innerHTML = "Your investment in Dollars is:";
			document.getElementById("pricePerShareLabel").innerHTML = "Price per share in Dollars is:";				
		}
		if(localEUR.selected == true && foreignEUR.selected == true){
			document.getElementById("exchangeRate").value = "1.00";
			newPlaceholderEUR.placeholder = "Euros to invest";	
			document.getElementById("amountLabel").innerHTML = "Amount to invest in Euros is:";					
			document.getElementById("investmentForeignLabel").innerHTML = "Your investment in Euros is:";
			document.getElementById("pricePerShareLabel").innerHTML = "Price per share in Euros is:";				
		}
};
// to calculate international investment section
function calculateInvestment(){
	var amountToInvest = document.getElementById("amountToInvest").value;
	var exchangeRate = document.getElementById("exchangeRate").value;
	var investment = (amountToInvest * exchangeRate);
	document.getElementById("valueToInvestInForeignCurrency").value = investment.toFixed(2);
	var pricePerShare = document.getElementById("pricePerShare").value;
	var numberOfShares = (investment / pricePerShare);
	document.getElementById("numberOfShares").value = numberOfShares.toFixed(2);
    try{ // to manage the errors 
		if(amountToInvest == "") throw "You need to type the amount to invest in local currency";
		if(pricePerShare == "") throw "You need to type the price of a share";
		if(isNaN(amountToInvest)) throw "Amount to invest is not a number. Please type a positive number";
		if(isNaN(pricePerShare)) throw "Price per share is not a number. Please type a positive number";
		amountToInvest = Number(amountToInvest);
		pricePerShare = Number(pricePerShare);
		if(amountToInvest <= 0) throw "You have typed a negative amount or zero to invest. Please type a positive number";
		if(pricePerShare <= 0) throw "You have typed a negative price or zero. Please type a positive number";		
		if(amountToInvest < pricePerShare) throw "Amount to invest must be greater than the price per share"
	}
	catch(err){
		alert(err);
	}
};
// to highlight the input fields
function focusInputText(field){
	field.style.background = "#e6ffe6";
};
// to reset inputs in predictor
function resetInvestment(){
	document.getElementById("formPredicter").reset();
	document.getElementById("formPredicterTable").reset();
};
// to reset Future Exchange Rate
function resetFutureExchangeRate(){
	document.getElementById("resetButtonFutureExchangeRate").reset();
};
// calculate initial investment in foreign currency and exchange rate
var localGBPPredictor = document.getElementById("localGBPPredictor");
var localUSDPredictor = document.getElementById("localUSDPredictor");
var localEURPredictor = document.getElementById("localEURPredictor");
var foreignGBPPredictor = document.getElementById("foreignGBPPredictor");
var foreignUSDPredictor = document.getElementById("foreignUSDPredictor");
var foreignEURPredictor = document.getElementById("foreignEURPredictor");
function calculateReturnPredictor(){
	var numberOfShares = document.getElementById("numberOfSharesBought").value;
	var purchasePrice = document.getElementById("purchasePrice").value;
	var initialInvestmentForeign = (numberOfShares * purchasePrice);
	document.getElementById("initialInvestmentForeign").value = initialInvestmentForeign;
	var initialInvestmentLocal = document.getElementById("initialInvestmentLocal").value;
	var	initialExchangeRate = (initialInvestmentForeign / initialInvestmentLocal);
		document.getElementById("initialExchangeRate").value = initialExchangeRate.toFixed(4);	
	var salePrice = document.getElementById("salePrice").value;
// to get final investment value
	var finalValueForeign = (salePrice * numberOfShares);
//to get  foreign profit
	var inicialValueForeign =document.getElementById("initialInvestmentForeign").value;	
	var profitForeign = (finalValueForeign - inicialValueForeign);
//to get  foreign return
	var returnForeign = ((finalValueForeign - inicialValueForeign) / inicialValueForeign) * 100;
	document.getElementById("returnForeign").innerHTML = returnForeign + " %";
// final investment value in local currency
	var initialValueLocal = document.getElementById("initialInvestmentLocal").value;
	var initialExchangeRate = document.getElementById("initialExchangeRate").value;
	var futureExchangeRate = document.getElementById("futureExchangeRatePrice").value;
	var finalValueLocal = (finalValueForeign * (1 / futureExchangeRate));
//to get  local profit
	var profitLocal = (finalValueLocal - initialValueLocal);
//to get local return
	var returnLocal = (profitLocal / initialValueLocal) * 100;
	document.getElementById("returnLocal").innerHTML = returnLocal.toFixed(2) + " %";		
	if(localGBPPredictor.selected == true && foreignUSDPredictor.selected == true){
		document.getElementById("valueLocal").innerHTML = finalValueLocal.toFixed(2) + " £";
		document.getElementById("valueForeign").innerHTML = finalValueForeign + " $";
		document.getElementById("profitForeign").innerHTML = profitForeign + " $";
		document.getElementById("profitLocal").innerHTML = profitLocal.toFixed(2) + " £";
	}
	if(localUSDPredictor.selected == true && foreignGBPPredictor.selected == true){
		document.getElementById("valueLocal").innerHTML = finalValueLocal.toFixed(2) + " $";
		document.getElementById("valueForeign").innerHTML = finalValueForeign + " £";
		document.getElementById("profitForeign").innerHTML = profitForeign + " £";
		document.getElementById("profitLocal").innerHTML = profitLocal.toFixed(2) + " $";
	}
	if(localEURPredictor.selected == true && foreignGBPPredictor.selected == true){
		document.getElementById("valueLocal").innerHTML = finalValueLocal.toFixed(2) + " €";
		document.getElementById("valueForeign").innerHTML = finalValueForeign + " £";
		document.getElementById("profitForeign").innerHTML = profitForeign + " £";
		document.getElementById("profitLocal").innerHTML = profitLocal.toFixed(2) + " €";
	}
	if(localGBPPredictor.selected == true && foreignEURPredictor.selected == true){
		document.getElementById("valueLocal").innerHTML = finalValueLocal.toFixed(2) + " £";
		document.getElementById("valueForeign").innerHTML = finalValueForeign + " €";
		document.getElementById("profitForeign").innerHTML = profitForeign + " €";	
		document.getElementById("profitLocal").innerHTML = profitLocal.toFixed(2) + " £";		
	}
	if(localEURPredictor.selected == true && foreignUSDPredictor.selected == true){	
		document.getElementById("valueLocal").innerHTML = finalValueLocal.toFixed(2) + " €";
		document.getElementById("valueForeign").innerHTML = finalValueForeign + " $";
		document.getElementById("profitForeign").innerHTML = profitForeign + " $";	
		document.getElementById("profitLocal").innerHTML = profitLocal.toFixed(2) + " €";		
	}
	if(localUSDPredictor.selected == true && foreignEURPredictor.selected == true){
		document.getElementById("valueLocal").innerHTML = finalValueLocal.toFixed(2) + " $";
		document.getElementById("valueForeign").innerHTML = finalValueForeign + " €";	
		document.getElementById("profitForeign").innerHTML = profitForeign + " €";
		document.getElementById("profitLocal").innerHTML = profitLocal.toFixed(2) + " $";		
	}
	if(localGBPPredictor.selected == true  && foreignGBPPredictor.selected == true){
		alert("Select a different foreign currency. Foreign currency can not be the same as the local one");	
	}
	if(localUSDPredictor.selected == true && foreignUSDPredictor.selected == true){
		alert("Select a different foreign currency. Foreign currency can not be the same as the local one");			
	}
	if(localEURPredictor.selected == true && foreignEURPredictor.selected == true){
		alert("Select a different foreign currency. Foreign currency can not be the same as the local one");			
	}
// to manage the errors
	try{ 
		if(initialInvestmentLocal == "") throw "You need to type the amount of your initial investment in local currency";
		if(numberOfShares == "") throw "You need to type how many shares you bought";
		if(purchasePrice == "") throw "You need to type the average price you bought your shares";		
		if(salePrice == "") throw "You need to type the average price you sold your shares";	
		if(futureExchangeRate == "") throw "You need to type the Future Exchange Rate Price in the next table. You need it to close out your trade";		
		if(isNaN(initialInvestmentLocal)) throw "Initial investment is not a number. Please type a positive number";
		if(isNaN(numberOfShares)) throw "Number of shares is not a number. Please type a positive number";
		if(isNaN(purchasePrice)) throw "Price you bought your stock is not a number. Please type a positive number";		
		if(isNaN(salePrice)) throw "Price you sold your stock is not a number. Please type a positive number";	
		if(isNaN(futureExchangeRate)) throw "Future exchange rate is not a number. Please type a correct number";			
		initialInvestmentLocal = Number(initialInvestmentLocal);
		numberOfShares = Number(numberOfShares);
		purchasePrice = Number(purchasePrice);
		salePrice = Number(salePrice);
		futureExchangeRate = Number(futureExchangeRate);
		if(initialInvestmentLocal < 0) throw "You have typed a negative initial investment. Please type a positive number";
		if(numberOfShares < 0) throw "You have typed a negative number of shares. Please type a positive number";		
		if(purchasePrice < 0) throw "You have typed a negative purchase price. Please type a positive number";
		if(salePrice < 0) throw "You have typed a negative sale price. Please type a positive number";	
		if(futureExchangeRate < 0) throw "You have typed a negative future exchange rate. Please type a positive number";		
	}
	catch(err){
		alert(err);
	}
};
function clearInvestmentFields(){
	document.getElementById("amountToInvest").value = "";
	document.getElementById("pricePerShare").value = "";
};
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