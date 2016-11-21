<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>IPM | Portfolio Manager</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script src="../js/validateRegisterForm.js"></script> <!-- validate sign up form with js-->
	<script src="../js/validateLogInForm.js"></script> <!-- validate log in form with js-->
	<script src="../js/searchTextField.js"></script> <!-- function to live search field-->
	<link rel="stylesheet"  type="text/css" href="../css/portfolioUnLogIn.css">
	<link rel="stylesheet"  type="text/css" href="../css/header.css">
	<link rel="stylesheet"  type="text/css" href="../css/logIn.css">
	<link rel="stylesheet"  type="text/css" href="../css/headerTitle.css">
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
				header("Location: portfolioUserRegister.php");
				echo "<span class='sign'>Hi, " .$_SESSION["username"]. "<a href='../php/logOut.php'> Log Out?</a></span>";
			} else{
				echo "<span class='sign'><a href='../home/signUp.html'>Sign up</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href='#signInModal' onclick=\"document.getElementById('signInModal').style.display='block'\">Sign in</a></span>";
			}
			?>		
				<ul>
					<li class="dropdown"><a href="../market/djia.php">MARKET</a>
						<!--<div class="dropdown-content">
							<a href="djia.html">DJIA</a>
							<a href="dax.html">DAX 30</a>
							<a href="ftse100.html">FTSE 100</a>
							<a href="../currencies/currencies.html">CURRENCIES</a>
						</div>-->
					</li>
					<li><a href="../watchlist/watchlist.php">WATCHLIST</a></li>
					<li><a href="../calculator/calculator.php">CALCULATOR</a></li>
					<li><a class="active" href="portfolio.php">PORTFOLIO MANAGER</a></li>
					<li><a href="../contact/contact.php">CONTACT</a></li>
				</ul>	
	</div>
	<div class="titlePage">	
		<span class="mainTitle">PORTFOLIO MANAGER</span>
		<span class="subTitle">SIGN UP TO BUILT AND MONITOR YOUR PORTFOLIO</span>
	</div>
	<hr class="titleLine">
		<div class="portfolioLeftContent">
			<p class="portfolioContentTitle">Create a portfolio of Stocks and track its performance</p>
			
			<hr class="portfolioContentLine">
			<p>You now can built a real-life international portfolio and track your investments both in the local curency without the influence of the exchange rate and 
			according to them to see how it affects to your return.</p>
			<a href="../home/signUp.html"><button type="button" id="signUpPortfolioButton">SIGN UP to create a portfolio</button></a><br>
			<a href="#signInModal" onclick="document.getElementById('signInModal').style.display='block'"><button type="button" id="logInPortfolioButton">LOG IN to track your portfolio</button></a>
		</div>
		<div class="portfolioRightContent">
			<p class="portfolioContentTitle">Features<p>
			<hr class="portfolioContentLine">
			<div id="portfolioList">
				<p><img src="../images/tick.gif"> Investor can create many portfolios</p>
				<p><img src="../images/tick.gif"> Choose one of them and add their holdings</p>
				<p><img src="../images/tick.gif"> Edit your portfolios</p>
				<p><img src="../images/tick.gif"> Track the return of your equities in their local currency</p>
				<p><img src="../images/tick.gif"> Track the return of your equities in your local currency</p>			
				<p><img src="../images/tick.gif"> Monitor your portfolo return according to the real exchange rates</p>
				<p><img src="../images/tick.gif"> Include only DJIA, FTSE 100 and DAX XETRA stocks</p>
			</div>
		</div>
	<br>
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
function sendLogInData(){
	var username = document.getElementByName("username").value;
	var password = document.getElementByName("password").value;
}
</script>
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
