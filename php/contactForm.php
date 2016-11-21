<?php
include "dbConnection.php";
// create variables to insert the data into the tables
function comment(){ 
	$nameErr = $emailErr = $commentErr = ""; // define variables and set to empty values
	if($_SERVER["REQUEST_METHOD"] == "POST"){ //to check the form has been submitted
		if(empty($_POST["contactName"])){ // is the field name is empty alert a message
			$nameErr = "Name is required";
		} else{ // if it is not empty  save it after been tested
			$name = test_input($_POST["contactName"]); 
			if(!preg_match("/^[a-zA-Z]*$/",$name)){ // check if name only contains letters and whitespace
				$nameErr = "Only letters and white space allowed"; 
			}		
		}
		if(empty($_POST["contactEmail"])){
			$emailErr = "Email is required";
		} else{
			$email = test_input($_POST["contactEmail"]);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // check if e-mail address is well-formed
				$emailErr = "Invalid email format"; 
			}		
		}
		if(empty($_POST["comment"])){
			$commentErr = "Comment is required";
		} else{
			$comment = test_input($_POST["comment"]);
			if(!preg_match("/^[a-zA-Z0-9]*$/",$comment)){// check if name only contains letters, numbers or whitespace
				$commentErr = "Only letters, numbers  and white space allowed"; 
			}
		}
	}
	$insertData = "INSERT INTO comment (contactName,contactEmail,comment) 
					VALUES ('$name','$email','$comment')"; // insert data in users table
	global $connection;
	if($connection->query($insertData) === TRUE){ // or mysqli_query($insertData)
		session_start();
		$_SESSION['login'] = "1";
		// header("location: ../portfolio/portfolioUserRegister.html");
		// echo "Welcome . $surname . . Thank you for registering! A confirmation email has been sent to . $email . <br><br>. Please click on the Activation Link to Activate your account<br><br>";
		echo "". $name . ", Thanks for your comment. Your request will be processed inmeadiately.<br><br>";
		echo "Clik the image to go back to IPM <a href='../home/home.php' title='Clik here to return to the home page'><img src='../images/logo.gif' alt='International Portfolio Manager' height='70px' width='130px'/></a>";
	} else{
		echo "Error: " . $insertData . "<br>" . $connection->error;
	}
}

function test_input($data){ // to check if the data written for the user is correct
	$data = trim($data); // strip unnecessary characteres like extra space , tab , nes lines from the user input data
	$data = stripslashes($data); //remove backslashes feom the user input
	$data = htmlspecialchars($data); // to escape code
	return $data;	
}
if(isset($_POST['submitComment'])){ // when create account button is clicked
	comment();
}
$connection->close();
?>