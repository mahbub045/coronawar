<?php
	
	include("dataconfig.php");
	
	$selectsql="SELECT * FROM products WHERE Quantity_Available > 0";

	$conn->query($selectsql);
	$result_doc=$conn->query($selectsql);
	
	echo "<table>";
	echo "<tr> <th> Product ID </th> <th> Product </th> <th> Price </th> <th> Quantity Available </th> <th>  </th></tr>";
	while($row = $result_doc->fetch_assoc()){
		echo '<tr><td>' . $row["Product_ID"] . '</td><td>' . $row["Product_Name"] . '</td><td>' . $row["Product_Cost"] . '</td><td>' . $row["Quantity_Available"] . '</td><td>';
		echo  "<a href = 'product_checkout.php'>Buy</a> </td></tr>";
	}

	echo "</table>";
	$conn->close();
?>