<?php 
 include "dataconfig.php";
 if(isset($_GET['ID'])){
 	$delete_id=$_GET['ID'];

 	$deletesql="DELETE FROM visit WHERE ID=$delete_id";
 	if($conn->query($deletesql)){
 		header("location:patient.php");
 	}
 	else{
 		die($conn -> error);

 	}

 }
 else{
 	header("location:patient.php");
 }

 ?>

 <?php 
 include "dataconfig.php";
 if(isset($_GET['Product_ID'])){
 	$delete_id=$_GET['Product_ID'];
 	$deletesql="DELETE FROM products WHERE Product_ID ='$delete_id' ";
 	if($conn->query($deletesql)){
 		header("location:admin.php");
 	}
 	else{
 		die($conn -> error);

 	}
 	$conn->close();

 }
 else{
 	header("location:patient.php");
 }


 ?>