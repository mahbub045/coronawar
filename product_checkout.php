<?php
	echo "<html> <body>";
	$P_ID = $_POST['P_ID'];
	
	#$P_NAME = $_POST['P_Name'];
	#$P_COST = $_POST['P_COST'];
	
	
	include("dataconfig.php");
	
	$selectsql= "SELECT * FROM products WHERE Product_ID = '$P_ID'";

	$conn->query($selectsql);
	$result_doc=$conn->query($selectsql);
	$row = $result_doc->fetch_assoc();
	
	$P_ID = $row["Product_ID"];
	$P_Name = $row["Product_Name"];
	$P_Cost = $row["Product_Cost"];
	
	$conn->close();	
	
	
	echo '<br>Your Order of '. $P_Name .' is ready. Total Price is:  Tk' . $P_Cost . ' Please fill out the details below </br>';
	
	
?>
	
	<br>
		<form action="product_checkout_confirmation.php" method="post">
			Name: <input type="text" name="name"><br>
			E-mail: <input type="text" name="email"><br>
			Address: <input type="text" name="address"><br>
		<input type="submit">
</form>

	</body>
</html>