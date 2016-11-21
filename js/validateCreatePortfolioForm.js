function validateCreatePortfolioForm(){
	var portfolioName = document.forms["createPortfolioForm"]["portfolioName"].value;
	if( portfolioName == null || portfolioName == ""){
		alert("Portfolio name must be filled out");
        return false;
	}
	if(portfolioName.length > 30){
		alert("Username must be 30 characters maximum");
	    return false;
	}
}