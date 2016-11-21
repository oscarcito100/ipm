function start(){
    getData();
}
function getData(){
var yql_query_str = encodeURI(BASE_URL + yql_query);
var query_str_final = yql_query_str + "&format=json&diagnostics=true&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";
// header data
var name, rate, date, time;
$(document).ready(function(){
	$.getJSON(query_str_final, function(data){
		var rateQuotes = data.query.results.rate;
		name = rateQuotes.Name;
		rate = rateQuotes.Rate;
		date = rateQuotes.Date;
		time = rateQuotes.Time;
		
		// display data in the header
		$("#stockTable").append("<tr><th>" + name + "</th><td>" + rate + "</td><td>" + 
		time + "</td><td>" + date + "</td></tr>");
		// display name of the stock in the header as title		
		document.getElementById("currencyName").innerHTML = name;
		document.getElementById("currencyTitleName").innerHTML = name;
	});
});
};