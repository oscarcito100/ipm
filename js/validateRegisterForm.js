function validateRegisterForm(){
	/*var name = document.forms["registerForm"]["name"].value;
	if( name == null || name == ""){
		alert("Name must be filled out");
        return false;
	}
	var surname = document.forms["registerForm"]["surname"].value;
	if( surname == null || name == ""){
		alert("Surname must be filled out");
        return false;
	}*/
	var username = document.forms["registerForm"]["username"].value;
	if( username == null || username == ""){
		alert("Username must be filled out");
        return false;
	}
	var pssw = document.forms["registerForm"]["password"].value;
		if(pssw == null || pssw == ""){
			alert("Password must be filled out");
			return false;
		}
		if(pssw.length < 10 || pssw.length > 20){
			alert("Password must be between 10 and 20 characters");
			return false;
		}
	var confirmPassword = document.forms["registerForm"]["confirmPassword"].value;
		if(confirmPassword == null || confirmPassword == ""){
			alert("Confirm password must be filled out");
			return false;
		}
		if(confirmPassword.length < 10 || confirmPassword.length > 20){
			alert("Confirmation password field must be between 10 and 20 characters");
	        return false;
		}
	if(confirmPassword !== pssw){
		alert("Your confirmation password must be equal than your password");
        return false;		
	}
}