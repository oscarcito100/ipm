<?php
include "dbConnection.php";
// create variables to insert the data into the tables
function newUser(){ 
	$nameErr = $surnameErr = $emailErr = $userRegisterNameErr = $passwordErr = ""; // define variables and set to empty values
	if($_SERVER["REQUEST_METHOD"] == "POST"){ //to check the form has been submitted
		//if(empty($_POST["name"])){ // is the field name is empty alert a message
			//$nameErr = "Name is required";
		//} else{ // if it is not empty  save it after been tested
			//$name = test_input($_POST["name"]); 
			//if(!preg_match("/^[a-zA-Z]*$/",$name)){ // check if name only contains letters and whitespace
				//$nameErr = "Only letters and white space allowed"; 
			//}		
		//}
		//if(empty($_POST["surname"])){
			//$surnameErr = "Surname is required";
		//} else{
			//$surname = test_input($_POST["surname"]); 
			//if(!preg_match("/^[a-zA-Z]*$/",$surname)){// check if name only contains letters andwhitespace
				//$surnameErr = "Only letters and white space allowed"; 
			//}
		//}
		if(empty($_POST["email"])){
			$emailErr = "Email is required";
		} else{
			$email = test_input($_POST["email"]);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // check if e-mail address is well-formed
				$emailErr = "Invalid email format"; 
			}		
		}
		if(empty($_POST["username"])){
			$userRegisterNameErr = "Username is required";
		} else{
			$userRegisterName = test_input($_POST["username"]);
			if(!preg_match("/^[a-zA-Z0-9]*$/",$userRegisterName)){// check if name only contains letters, numbers or whitespace
				$userRegisterNameErr = "Only letters, numbers  and white space allowed"; 
			}
		}
		if(empty($_POST["password"])){
			$passwordErr = "Password is required";
		} else{
			$password = test_input($_POST["password"]);
			//$passwordEncypted = hash('sha256', $password); // password encrypted using SHA256()
		}
		//$userId = $_POST["userId"];

	}
	$errorMessage ="";
	$usernameLength = strlen($userRegisterName);
	$passwordLength = strlen($password);
	if($usernameLength < 6){
		$errorMessage = "Username must be 6 characters minimum";
	}
	if($passwordLength < 10 || $passwordLength > 20){
		$errorMessage = "Password must be between 10 and 20 characteres";
	}
	$insertData = "INSERT INTO users (username,email,password) 
					VALUES ('$userRegisterName','$email','$password')"; // insert data in users table
	global $connection;
	if($connection->query($insertData) === TRUE){ // or mysqli_query($insertData)
		session_start();
		$_SESSION['login'] = "1";
		// header("location: ../portfolio/portfolioUserRegister.html");
		// echo "Welcome . $surname . . Thank you for registering! A confirmation email has been sent to . $email . <br><br>. Please click on the Activation Link to Activate your account<br><br>";
		echo "". $userRegisterName . ", your registration form is completed. Welcome to International Portfolio Manager (IPM)<br><br>";
		echo "Clik the image to go back to IPM <a href='../home/home.php' title='Clik here to return to the home page'><img src='../images/logo.gif' alt='International Portfolio Manager' height='70px' width='130px'/></a>";
	} else{
		echo "Error: " . $insertData . "<br>" . $connection->error;
	}
}
function signUp(){ // check that the username that the user type is not taken
	global $userRegisterName;
	global $connection;
	global $email; 
	$queryUserRegisterName = "SELECT username FROM users WHERE username='$userRegisterName'";// the username written is not contain in the column username
	$resultQueryUserRegisterName = mysqli_query($connection, $queryUserRegisterName);
	$rowQueryUserRegisterName = mysqli_fetch_array($resultQueryUserRegisterName); // to check for all the rows
	
	$queryEmail = "SELECT email FROM users WHERE email = '$email'"; // email written is not contain in the column email
	$resultEmail = mysqli_query($connection, $queryEmail);
	$rowQueryEmail = mysqli_fetch_array($resultEmail); // to check all the rows
	if($rowQueryUserRegisterName == 0 || $rowQueryEmail == 0){ // if there are any row
		newUser();
	} else{
		echo "Sorry! ". $userRegisterName . " or " . $email . "already exists. Please select another username or email";
	}
}
function test_input($data){ // to check if the data written for the user is correct
	$data = trim($data); // strip unnecessary characteres like extra space , tab , nes lines from the user input data
	$data = stripslashes($data); //remove backslashes feom the user input
	$data = htmlspecialchars($data); // to escape code
	return $data;	
}
if(isset($_POST['submit'])){ // when create account button is clicked
	signUp();
}
$connection->close();
?>