<?php
session_start();
include "../php/dbConnection.php"; // connection with the DB
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>WATCHLIST</title>
	<!--JQuery AJAX library-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script src="../js/validateRegisterForm.js"></script> <!-- validate sign up form with js-->
	<script src="../js/validateLogInFormForm.js"></script> <!-- validate log in form with js-->
		<script src="../js/searchTextField.js"></script> <!-- function to live search field-->
	<link rel="stylesheet"  type="text/css" href="../css/header.css">
	<link rel="stylesheet"  type="text/css" href="../css/logIn.css">
</head>
<body>
	<div class="header">
		<span class="home">
			<a href="../home/home.php" title="Clik here to return to the home page"><img src="../images/logo.gif" alt="International Portfolio Manager" height="70px" width="130px"/></a>
		</span>
			<form class="search">
				<input type="text" onkeyup="searchTextField(this.value)" placeholder="AAPL or apple..." size="50"/>
				<div id="searchOutput"></div>
			</form>
			<span class="date"><?php echo date(" l d/m/Y h:i:sa"); ?><br></span>
			<?php
			if(isset($_SESSION["username"]) == TRUE){
				echo "<span class='sign'>Hi, " .$_SESSION["username"]. "<a href='../php/logOut.php'> Log Out?</a></span>";
			} else{
				echo "<span class='sign'><a href='../home/signUp.html'>Sign up</a>&nbsp;&nbsp;|&nbsp;&nbsp;
				<a href='#signInModal' onclick=\"document.getElementById('signInModal').style.display='block'\">Sign in</a></span>";// escape double quotes
			}
			?>
				<ul class="navbar">
					<li class="dropdown"><a href="../market/djia.php">MARKET</a>
						<!--<div class="dropdown-content">
							<a href="market.html">EQUITIES</a>
							<a href="">INDICES</a>
							<a href="../currencies/currencies.html">CURRENCIES</a>
						</div>-->
					</li>
					<li><a class="active" href="watchlist.php">WATCHLIST</a></li>
					<li><a href="../calculator/calculator.php">CALCULATOR</a></li>
					<li><a href="../portfolio/portfolio.php">PORTFOLIO MANAGER</a></li>
					<li><a href="../contact/contact.php">CONTACT</a></li>
				</ul>
	</div>
	<form action="http://www.ipm.com/watchlist/search.aspx" method="get">
		<br />
		<br />
		<input type="text" size="50" maxlength="20" name="txtSearchSymbol" placeholder="Search by company name or ticker symbol..." />
		<input type="submit" value="Add asset"/>
	</form>
	<br />
	<br />
	<table border="1">
		<tr>
			<th>Symbol</th>
			<th>Name</th>
			<th>Last Price</th>
			<th>Change</th>
			<th>% Change</th>
			<th>Time</th>
		</tr>
	</table>
	<br />
	<br />
	<button type="submit">Set an Alert</button>
	<button type="button">Delete asset</button>
	
<form id="geosearch">  
<p><label for="query">Enter Location:</label>  
<input id="query" type="text" required/></p>  
<p><input type="submit" value="Make Query"/></p>  
</form>  
<div id="results"></div>  


<!-- The  Log in Modal -->
<div id="signInModal" class="modal">
	<span onclick="document.getElementById('signInModal').style.display='none'" class="close" title="Close Modal">&times;</span>
	<!-- Modal Content -->
	<form class="modal-content animate" action="../php/logIn.php" name="formLogIn" onsubmit="return validateLogInForm()" method="post"> 
		<div class="container">
			<label class="formTitles">Username:</label><br/>
			<input class="logInFields" type="text" name="username" size="50" placeholder="Enter Username" minlength="6" required/> 			
			<label class="formTitles">Password:</label><br/>
			<input class="logInFields" type="password" name="password" size="50" placeholder="Enter Password" minlength="10" maxlength="20" required/>
			<input type="checkbox" name="checkRemember" checked="checked"/> Remember me 
			<span class="rightSide"><a href="lostPassword.html">Retrieve Password</a></span>
			<button type="submit" class="logInButton" title="register" name="submit">LOG IN</button><br/>
		</div>
		<div class="containerBottom">
			<button type="button" class="cancelButton" onclick="document.getElementById('signInModal').style.display='none'" title="Cancel Log in">CANCEL</button><br/>
			<p class="footerLogIn">Don't you have an account? <a href="../home/signUp.html">Register now here</a></p>
			<p class="footerLogIn">By proceeding, you agree to the IPM's Terms of service & Privacy policy</p>
		</div>
	</form>
</div>
<hr class="titleLine">
<div><?php require("../php/footer.php"); ?></div>
<script>
// Get the modal for sign in
var signInModal = document.getElementById('signInModal');
// When the user clicks anywhere outside of the modal, close it
 window.onclick = function(event) {
    if (event.target == signInModal) {
        signInModal.style.display = "none";
    }
}
</script>
</body>
</html>