function start(){
    getData();
}
function getData(){
/*var BASE_URL = 'https://query.yahooapis.com/v1/public/yql?q=';
var yql_query = 'select * from yahoo.finance.quotes where symbol in ("ADS.DE")';*/
var yql_query_str = encodeURI(BASE_URL+yql_query);
var query_str_final = yql_query_str + "&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
// header data
var symbol, name, lastTradePriceOnly, change, percentChange, lastTradeDate, lastTradeTime;
// statistics table
var volume, bid, ask, yearRange, daysRange, marketCapitalization, previousClose, dividendYield, dividendPayDate, exDividendDate, open, percentChangeFromYearLow, percentChangeFromYearHigh, oneyrTargetPrice;
// ratios table
var bookValue, earningsShare, ebitda, priceBook, shortRatio, peRatio, priceSales;
// technical table 
var fiftydayMovingAverage, twoHundreddayMovingAverage, changeFromTwoHundreddayMovingAverage, percentChangeFromTwoHundreddayMovingAverage, changeFromFiftydayMovingAverage, percentChangeFromFiftydayMovingAverage;
$(document).ready(function(){
	$.getJSON(query_str_final, function(data){
		var stockQuotes = data.query.results.quote;
		symbol = stockQuotes.Symbol;
		volume = stockQuotes.Volume;
		bookValue = stockQuotes.BookValue;
		change = stockQuotes.Change;
		bid = stockQuotes.Bid;
		ask = stockQuotes.Ask;
		lastTradeDate = stockQuotes.LastTradeDate;
		earningsShare = stockQuotes.EarningsShare;
		yearRange = stockQuotes.YearRange;
		daysRange = stockQuotes.DaysRange;
		marketCapitalization = stockQuotes.MarketCapitalization;
		ebitda = stockQuotes.EBITDA;
		lastTradePriceOnly = stockQuotes.LastTradePriceOnly;
		name = stockQuotes.Name;
		percentChange = stockQuotes.PercentChange;
		previousClose = stockQuotes.PreviousClose;
		priceBook = stockQuotes.PriceBook;
		shortRatio = stockQuotes.ShortRatio;
		lastTradeTime = stockQuotes.LastTradeTime;
		dividendYield = stockQuotes.DividendYield;
		peRatio = stockQuotes.PERatio;
		dividendPayDate = stockQuotes.DividendPayDate;
		exDividendDate = stockQuotes.ExDividendDate;
		priceSales = stockQuotes.PriceSales;
		open = stockQuotes.Open;
		percentChangeFromYearLow = stockQuotes.PercentChangeFromYearLow;
		percentChangeFromYearHigh = stockQuotes.PercebtChangeFromYearHigh;
		fiftydayMovingAverage = stockQuotes.FiftydayMovingAverage;
		twoHundreddayMovingAverage = stockQuotes.TwoHundreddayMovingAverage;
		changeFromTwoHundreddayMovingAverage = stockQuotes.ChangeFromTwoHundreddayMovingAverage;
		percentChangeFromTwoHundreddayMovingAverage = stockQuotes.PercentChangeFromTwoHundreddayMovingAverage;
		changeFromFiftydayMovingAverage = stockQuotes.ChangeFromFiftydayMovingAverage;
		percentChangeFromFiftydayMovingAverage = stockQuotes.PercentChangeFromFiftydayMovingAverage;
		oneyrTargetPrice = stockQuotes.OneyrTargetPrice;
// display data in the header
		$("#stockTable").append("<tr><th>" + symbol + "</th><th>€ " + lastTradePriceOnly + "</th><th id='percentChange'>" + 
		percentChange + "</th><th id='change'>€ " + change + "</th><td>" + lastTradeTime + "</td><td>" + lastTradeDate + "</td></tr>");
// statistics column
		$("#statisticsTable").append("<tr><th></th></tr><tr><td>Previous Close:</td><th>" + previousClose + "</th></tr><tr><td>Days Range:</td><th>" + daysRange + "</th></tr><tr><td>Open Price:</td><th>" +
		open + "</th></tr><tr><td>Year Range:</td><th>" + yearRange + "</th></tr><tr><td>Bid:</td><th>" + bid + "</th></tr><tr><td>% Change from Year Low:</td><th>" + percentChangeFromYearLow + "</th></tr><tr><td>Ask:</td><th>" +
		ask + "</th></tr><tr><td>% Change from Year High:</td><th>" + percentChangeFromYearHigh + "</th></tr><tr><td>Volume:</td><th>" + volume + "</th></tr><tr><td>Ex-Dividend Date:</td><th>" + exDividendDate + "</th></tr><tr><td>Market Capitalization:</td><th>" +
		marketCapitalization + "</th></tr><tr><td>Dividend Yield:</td><th>" + dividendYield + "</th></tr><tr><td>Target Price in One Year:</td><th>" + oneyrTargetPrice + "</th></tr><tr><td>Dividend Pay Date:</td><th>" + dividendPayDate + "</th></tr>");
// ratios column
		$("#ratiosTable").append("<tr><th></th></tr><tr><td>PERatio:</td><th>" + peRatio + "</th><td>Book Value:</td><th>" + bookValue + "</th></tr><tr><td>Price Book:</td><th>" +
		priceBook + "</th><td>Short Ratio:</td><th>" + shortRatio + "</th></tr><tr><td>Price Sales:</td><th>" + priceSales + "</th><td>Earnings Shares:</td><th>" + earningsShare + "</th></tr><tr><td>EBITDA:</td><th>" +
		ebitda + "</th><td></td><th></th></tr>");
// technical column
		$("#technicalTable").append("<tr><th></th></tr><tr><td>Price of 50 Moving Average:</td><th>" + fiftydayMovingAverage + "</th><td> Price of 200 Moving Average:</td><th>" + twoHundreddayMovingAverage + "</th></tr><tr><td>Percent Change from 50 MA:</td><th>" +
		percentChangeFromFiftydayMovingAverage + "</th><td>Percent Change from 200 MA:</td><th>" + percentChangeFromTwoHundreddayMovingAverage+ "</th></tr><tr><td>Units Change from 50 MA:</td><th>" + changeFromFiftydayMovingAverage + "</th><td>Units Change from 200 MA:</td><th>" + changeFromTwoHundreddayMovingAverage+ "</th></tr>");
// display name of the stock in the header as title		
		document.getElementById("stockName").innerHTML = name;
// set green, red or blue color according the change			
		var changeColor = document.getElementById("change");
			changeColor.innerHTML = change;
			if(change > 0){
			changeColor.style.color = "green";
			}
			if(change < 0){
			changeColor.style.color = "red";
			}
			if(change == 0){
			changeColor.style.color = "blue";
			}
			var percentChangeColor = document.getElementById("percentChange");
			percentChangeColor.innerHTML = percentChange;
			if(parseInt(percentChange) > 0){
			percentChangeColor.style.color = "green";
			}
			if(parseInt(percentChange) < 0){
			percentChangeColor.style.color = "red";
			}
			if(parseInt(percentChange) == 0){
			percentChangeColor.style.color = "blue";
			}
	});
});
};