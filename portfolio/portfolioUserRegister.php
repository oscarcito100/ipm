<?php
session_start();
include "../php/dbConnection.php"; // connection with the DB
/*if(isset($_GET['deletePortfolioButton'])){ 
	$deleteQuery = "DELETE FROM portfolio WHERE portfolioName='.$row['portfoilioName'].'";
	mysqli_query($deleteQuery);
	header("Location: portfolioUserRegister.php");
}*/
?>
<!-- if everything is ok then the user will see the HTML code below the php if not we send him to "header"-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<title>Portfolio Manager | IPM</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	<script src="../js/searchTextField.js"></script> <!-- function to live search field-->
	<link rel="stylesheet"  type="text/css" href="../css/portfolio.css">
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
				echo "<span class='sign'>Hi, " .$_SESSION["username"]. "<a href='../php/logOut.php'> Log Out?</a></span>";
			} else{
				echo "<span class='sign'><a href='../home/signUp.html'>Sign up</a>&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href='#signInModal' onclick=\"document.getElementById('signInModal').style.display=block'\">Sign in</a></span>"; // escape the quotes
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
		<span class="subTitle">PORTFOLIO COMPOSITION IN THE CURRENCY OF THE SECURITY</span>
	</div>
	<hr class="titleLine">
	<br><br>
	<div class="portfolioNavbar">
		<!--<form class="portfolioInSecurityCurrency" action="../php/users.php" method="get">-->	<!-- problem is the action attribute-->
		<form>
			<label for="ChoosePortfolio">Select your portfolio: </label>	
			<select name="selectPortfolio" onchange="foreignPortfolioTable">
			<?php
				//if(isset($_SESSION["username"]) == TRUE){
					//$_SESSION["userid"] = $countRows['userId'];
					//$selectPortfolio = "SELECT users.userId, portfolio.portfolioName FROM users, portfolio WHERE users.userId = portfolio.userId AND users.userId = " .$_SESSION['userid'] . ";";
					$selectPortfolio = "SELECT portfolio.* FROM users, portfolio WHERE users.userId = portfolio.userId";
					$result = mysqli_query($selectPortfolio);
					$row = mysqli_fetch_array($result);
					while($row){
					echo "<option value='" . $row['portfolioId']. "'>" . $row['portfolioName'] . "</option>";
					}
				//}
				/*$query = "SELECT * FROM users";
				$result= mysqli_query($query);
				$row = mysqli_fetch_array($result);
				while($row){
				echo "<option value='" . $row['userId']. "'>" . $row['username'] . "</option>";	
				}*/
			?>
			</select>
		</form>
		<br>
			<a href="createPortfolio.php"><button class="portfolioButtons" type="button" name="createPortfolioButton">CREATE PORTFOLIO</button></a>
			<a href="javascript:deletePortfolioId(<?php echo $row['portfolioName']; ?>)"><button class="portfolioButtons" type="button" name="deletePortfolioButton">DELETE PORTFOLIO</button></a>
			<a href="addHoldingsToPortfolio.php"><button class="portfolioButtons" type="button" name="addPortfolioButton">ADD HOLDINGS</button></a>	
			<a href="editHoldings.php"><button class="portfolioButtons" type="button" name="editPortfolioButton">EDIT HOLDINGS</button></a>	
	</div>
	<!--<div class="third">
<input type="button" value="Remove" class="remve" name="<?php echo $row['choice_id']; ?>" onClick="deleteImage(<?php echo $row['choice_id']; ?>)"style="cursor:pointer;">
</div>
<script type="text/javascript">
function deleteImage(x){
var conf = confirm("Are you sure you want to delete this choice?");
if(conf == true){
window.location = "addnewentry/choiceRemove.php?id="+x;
}
}
</script>-->
	<br>
	<br>
	<div id="foreignPortfolioTable"></div>
	<table id="portfolioForeignTable">
			<thead>
				<tr>
					<th>Stock</th>
					<th>Price</th>
					<th>No shares</th>
					<th>Investment</th>
					<th>Current price</th>
					<th>Current value</th>
					<th>Profit/Lost</th>
					<th>Foreign Return</th>
					<th>Portfolio %</th>			
				</tr>
			</thead>
			<tfoot>
				<td colspan="6"></td>
				<th>Total</th>
				<th>5.26 %</th>
				<th>100 %</th>
			</tfoot>
			<tbody>
				<tr>
					<td>ADIDAS N</td>
					<td>139.75</td>
					<td>10</td>
					<td>1397.50</td>
					<td>146.75</td>
					<td>1467.50</td>
					<td>70</td>
					<th>5.01 %</th>
					<td>25%</td>
				</tr>	
				<tr>
					<td>APPLE INC.</td>
					<td>98,56</td>
					<td>10</td>
					<td>985.60</td>
					<td>104.21</td>
					<td>1042.10</td>
					<td>56.50</td>
					<th>5.73 %</th>
					<td>25%</td>
				</tr>	
				<tr>
					<td>VISA INC.</td>
					<td>72.50</td>
					<td>15</td>
					<td>1087.50</td>
					<td>78.05</td>
					<td>1170.75</td>
					<td>83.25</td>
					<th>7.66 %</th>
					<td>25%</td>
				</tr>	
				<tr>
					<td>BMW</td>
					<td>75.05</td>
					<td>10</td>
					<td>750.50</td>
					<td>77.05</td>
					<td>770.50</td>
					<td>20</td>
					<th>2.64 %</th>
					<td>25%</td>
				</tr>				
			</tbody>
	</table>
	<br>
	<div class="titlePage2">	
		<span class="mainTitle">PORTFOLIO MANAGER</span>
		<span class="subTitle">PORTFOLIO VALUE IN LOCAL CURRENCY</span>
	</div>
		<hr class="titleLine">	
	<br>
	<table id="portfolioLocalTable">
			<thead>
				<tr>
					<th>Stock</th>
					<th>Investment in Foreign</th>
					<th>Initial exchange rate</th>
					<th>Investment in Local</th>
					<th>Final value in Foreign</th>
					<th>Final exchange rate</th>
					<th>Final value in Local</th>
					<th>Profit/Lost</th>
					<th>Local Return</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>TOTAL</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>			
				</tr>
			</tfoot>
			<tbody>
				<tr>
					<th>ADIDAS</th>
					<td>1397.50</td>
					<td>0.76</td>
					<td>1062.10</td>
					<td>1467.50</td>
					<td>0.83</td>
					<td>1222.91</td>
					<td>160.81</td>
					<td>15.14 %</td>			
				</tr>
				<tr>
					<th>APPLE</th>
					<td>985.60</td>
					<td>0.67</td>
					<td>660.35</td>
					<td>1042.10</td>
					<td>0.76</td>
					<td>791.99</td>
					<td>131.65</td>
					<td>19.94 %</td>			
				</tr>					
			</tbody>
	</table>
	<hr class="titleLine">	
	<div><?php require("../php/footer.php"); ?></div>
<script>
function deletePortfolioId(name){
    if(confirm("Are you sure to remove this portfolio ?")){
        window.location.href="portfolioUserRegister.php?deletePortfolioId="+name; // creates the Query string index.php?deleteId=any_value
    }
}
</script>
<script>
function foreignPortfolioTable(str) {
    if (str == "") { //First, check if no person is selected (str == ""). If no person is selected, clear the content of the txtHint placeholder and exit the function.
        document.getElementById("foreignPortfolioTable").innerHTML = "";
        return;
    } else { //If a person is selected
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("foreignPortfolioTable").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getStocks.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</body>
</html>