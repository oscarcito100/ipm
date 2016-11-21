function validateAddHoldingsForm(){
	var holdingName = document.forms["addHoldingsForm"]["addHoldingsName"].value;
		if(holdingName == null || holdingName == ""){
			alert("Search for a company. Symbol/Name field must be filled out");
			return false;
		}
	var tradingDate = document.forms["addHoldingsForm"]["addHoldingsDate"].value;
		if(tradingDate == null || tradingDate == ""){
			alert("Select the day you purchased your shares");
			return false;
		}
	var numberOfShares = document.forms["addHoldingsForm"]["addHoldingsNoShares"].value;
		if(numberOfShares == null || numberOfShares == ""){
			alert("Number of shares must be filled out");
			return false;
		}
		if(numberOfShares <= 0){
			alert("Number of shares must be a positive integer number");
			return false;
		}
		if(!Number.isInteger(numberOfShares){
			alert("Number of shares must be a positive integer number");
			return false;	
		}
	var price = document.forms["addHoldingsForm"]["addHoldingsPrice"].value;
		if(price == null || price == ""){
			alert("Price field must be filled out");
			return false;
		}
		if(price <= 0){
			alert("Price must be a positive number");
			return false;
		}
}