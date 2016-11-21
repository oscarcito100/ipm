<?php
session_start(); //starting the session for user profile page
include "dbConnection.php";
function getLogIn(){
	if($_SERVER["REQUEST_METHOD"] == "POST"){ //to check the form has been submitted
		$userRegisterName = test_input($_POST["username"]); 
		$password = test_input($_POST["password"]); 
		//$passwordEncypted = hash('sha256', $password); // password encrypted using SHA256()
		global $connection;
		if(!empty($_POST["username"])){
			$query = "SELECT * FROM users WHERE username = '$userRegisterName' AND password = '$password'";	// md5($password)
			$result = mysqli_query($connection, $query);
			$countRows = mysqli_fetch_array($result); 
			if(!empty($countRows["username"]) AND !empty($countRows["password"])){ 
				$_SESSION["username"] = $countRows['username']; // =$userRegisterName
				$_SESSION["userid"] = $countRows['userId'];
				header("location: ../portfolio/portfolioUserRegister.php");			
			/*$numRows = mysqli_num_rows($result);
			if($numRows == 1){
				$row = mysqli_fetch_assoc($result);	
				session_register("USERNAME");
				session_register("USERID");				
				$_SESSION['USERNAME'] = $row['username'];
				$_SESSION["USERID"] = $row['userId'];		
				header("location: ../portfolio/portfolioUserRegister.php");	*/							
			} else{
				echo "Sorry! You have entered a wrong Username or Password. Please try again!";
			} //    to show log in here echo '<form action="login.php" method="post"><input type="hidden" name="ac" value="log"> '; 
		} else {
			echo "You must type your username";
		}
	}	
}
function test_input($data){ // to check if the data written for the user is correct
	$data = trim($data); // strip unnecessary characteres like extra space , tab , nes lines from the user input data
	$data = stripslashes($data); //remove backslashes feom the user input
	$data = htmlspecialchars($data); // to escape code
	return $data;	
}
if(isset($_POST['submit'])){ // when create account button is clicked
	getLogIn();
}
$connection->close();
?>