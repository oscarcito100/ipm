function validateLogInForm(){
	var usernameLogIn = document.forms["formLogIn"]["username"].value;
		if( usernameLogIn == null || usernameLogIn == ""){
			alert("Username must be filled out");
			return false;
		}
	var pass = document.forms["formLogIn"]["password"].value;
		if(pass == null || pass == ""){
			alert("Password must be filled out");
			return false;
		}
		if(pass.length < 10 || pass.length > 20){
			alert("Password must be between 10 and 20 characters");
			return false;
		}
}
