var BASE_URL = 'https://query.yahooapis.com/v1/public/yql?q=';
var yql_queryRight = 'select * from yahoo.finance.quotes where symbol in ("ULVR.L","BARC.L","LLOY.L","RBS.L","ADS.DE","BAYN.DE","BMW.DE","SIE.DE","BA","AAPL","CSCO","MSFT")';
var yql_query_strRight = encodeURI(BASE_URL + yql_queryRight);
var query_str_finalRight = yql_query_strRight + "&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
$(document).ready(function(){
	$.getJSON(query_str_finalRight, function(data){
		var stockQuotesRight = data.query.results.quote;
		for(var i = 0; i < stockQuotesRight.length; i++){
			var stockDataRight = stockQuotesRight[i];
			switch(i){
				case 0:
				$("#rightData").append("<tr><td><b><a href='../quotes/ftse100/ulvr.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td id='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;
				case 1:
				$("#rightData").append("<tr><td><b><a href='../quotes/ftse100/barc.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;
				case 2:
				$("#rightData").append("<tr><td><b><a href='../quotes/ftse100/lloy.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;				
				case 3:
				$("#rightData").append("<tr><td><b><a href='../quotes/ftse100/rbs.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;
				case 4:
				$("#rightData").append("<tr><td><b><a href='../quotes/dax/ads.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;
				case 5:
				$("#rightData").append("<tr><td><b><a href='../quotes/dax/bayn.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;
				case 6:
				$("#rightData").append("<tr><td><b><a href='../quotes/dax/bmw.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;
				case 7:
				$("#rightData").append("<tr><td><b><a href='../quotes/dax/sie.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;
				case 8:
				$("#rightData").append("<tr><td><b><a href='../quotes/dow30/ba.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;
				case 9:
				$("#rightData").append("<tr><td><b><a href='../quotes/dow30/appl.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;
				case 10:
				$("#rightData").append("<tr><td><b><a href='../quotes/dow30/csco.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;
				case 11:
				$("#rightData").append("<tr><td><b><a href='../quotes/dow30/msft.php'</a>" + stockDataRight.Name + "</b></td><td>" + stockDataRight.LastTradePriceOnly + "</td><td class='percentChange'>" + stockDataRight.PercentChange + "</td></tr>");	
				break;				
			};
			var percentChangeColor = document.getElementById("percentChange");
			percentChangeColor.innerHTML = stockDataRight.PercentChange;
			if(parseInt(percentChangeColor) > 0){
			percentChangeColor.style.color = "green";
			}
			if(parseInt(percentChangeColor) < 0){
			percentChangeColor.style.color = "red";
			}
		};
	});
});
