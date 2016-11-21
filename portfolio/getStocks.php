<?php
$q = intval($_GET['q']);
include "../php/dbConnection.php"; // connection with the DB
$sql="SELECT * FROM stock WHERE portfolio.portfolioId = stock.portfolioId AND stockId = '".$q."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
echo "<table>
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
	</tr>";
while($row){
    echo "<tr>";
    echo "<td>" . $row['stockName'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['numberOfShares'] . "</td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
	echo "<td></td>";
    echo "</tr>";
}
 echo "</table>";
 mysqli_close($con);
 ?>
<!DOCTYPE html>
<html>
<head>
</head>
 <body>

</body>
</html>