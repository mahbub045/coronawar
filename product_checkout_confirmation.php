<?php
	$Name = $_POST["name"];
	$Email = $_POST["email"];
	$Address = $_POST["address"];

?>



<html>
	<body>
		Dear <?php echo $Name .","; ?><br>
		Your product is currently being delivered to: <?php echo $Address.","; ?> so please confirm the order at your email, <?php echo $Email; ?>
		
	</body>

</html>