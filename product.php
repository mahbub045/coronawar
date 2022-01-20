<?php
	
	include("dataconfig.php");
	
	$selectsql="SELECT * FROM products";

	$conn->query($selectsql);
	$result_doc=$conn->query($selectsql);
	
	echo "<table>";
	echo "<tr> <th> Product ID </th> <th> Product </th> <th> Price </th> <th>  </th></tr>";
	while($row = $result_doc->fetch_assoc()){
		$id = $row["Product_ID"]; $name = $row["Product_Name"];
		echo $name;
		echo '<tr><td>' . $id . '</td><td>' . $row["Product_Name"] . '</td><td>' . $row["Product_Cost"] . '</td><td>';
		echo  '<form method="post" action="product_checkout.php"> <input type="hidden" name = "P_ID" id="ID" value = '.$id.' > > <br> <input type= "submit" value = "Buy"> </form> </td></tr>';
		#echo $id."<br>";
	}

	echo "</table>";
	$conn->close();
?>