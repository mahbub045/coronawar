<?php
session_start();
if (isset($_SESSION['auth3'])) {
  if ($_SESSION['auth3']!=1) {
    header("location:login.php");
  }
}else{
  if (isset($_COOKIE['auth4'])) {
    if ($_COOKIE['auth4']!=true) {
      header("location:login.php"); 
    }
    
  }else {
    header("location:login.php");
  }
  
}
?> 

<?php 
include ("dataconfig.php");
$ntfy=null;

if (isset($_POST['add_info'])) {
  $ID=$_POST['ID'];
  $name   = $_POST['InputName'];
  $email  = $_POST['InputEmail'];  
  $rse1=mysqli_query($conn,"SELECT * FROM doctors WHERE email = '$email' ");
  $rse2=mysqli_query($conn,"SELECT * FROM patients WHERE email = '$email' ");
  $num1 = mysqli_num_rows($rse1);
  $num2 = mysqli_num_rows($rse2);
  if ($num1==1 && $num2==1) {
    $ntfy="The E-mail you have chosen is already taken!";
  }

  else{
    $insertSql=" UPDATE patients SET NAME='$name', EMAIL='$email' WHERE ID='$ID' ";
    $upSql_P_name=" UPDATE visit SET P_NAME='$name' WHERE P_NAME='$name' ";

    if ($conn-> query($insertSql) && ($conn->query($upSql_P_name))) {
      header("location:logout.php");
    }else {
      die($conn-> error);
    }
  }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- fonts link -->
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/patientEditProfile.css">
	<link rel="stylesheet" href="css/media.css">


	<!-- favicon link -->
	<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16"> 

	<title>Corona War|Edit Profile</title>
</head>
<body>
	<section class="container">
		<div class="row">
			<div class="col-md-5 offset-2 mt-5 card bg-countom centered">
				<div class="col-md-12  text-center mt-3">
					<a href="index.php" type="submit" class="btn btn_color">Home</a>
					<a href="patient.php" type="submit" class="btn btn_color">Back Profile</a>
					<a href="patient.php" type="submit" class="btn btn_color"><?php echo isset($_SESSION['username'])?$_SESSION['username']:"" ?></a>
				</div>
				<form action=" <?php echo $_SERVER['PHP_SELF'];?> " method="post">
					<?php
						// include ("dataconfig.php");
						$currentUser=isset($_SESSION['username'])?$_SESSION['username']:"";
						$edit_result="SELECT * FROM patients WHERE NAME='$currentUser'";
						$gotInput=mysqli_query($conn,$edit_result);
						if($gotInput){
							if (mysqli_num_rows($gotInput)>0) {
								while ($row=mysqli_fetch_array($gotInput)) {
									?>
									<input type="hidden" name=ID value='<?php echo $row['ID']; ?>'>
									<div class="form-group c_font">
										<label for="InputName">Update Name:</label>
										<input type="name" class="form-control radious" id="InputName" name="InputName" placeholder="Update Your Full Name" value="<?php echo $row['NAME']; ?> " required>
									</div>
									<div class="form-group c_font">
										<label for="InputEmail">Update Email address:</label>
										<input type="email" class="form-control col-md-10 radious" id="InputEmail" name="InputEmail" placeholder="Update Valid Email Address" value="<?php echo $row['EMAIL']; ?> " required>
									</div>
									<div class="text-center">
										<button type="submit" name="add_info" class="btn btn-warning radious">Update</button>
									</div>
									<div class="h6 mt-3 rounded bg-warning text-danger font-weight-bold col-md-10">
										<?php echo $ntfy;?> 
									</div>
									<?php
								}
								
							}
						}
					 ?>
					
				</form>
			</div>
		</div>
	</section>
	

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>