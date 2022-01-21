<?php
session_start();
if (isset($_SESSION['auth5'])) {
	if ($_SESSION['auth5']!=1) {
		header("location:login.php");
	}
}else{
	if (isset($_COOKIE['auth6'])) {
		if ($_COOKIE['auth6']!=true) {
			header("location:login.php"); 
		}

	}else {
		header("location:login.php");
	}

}
?>

<?php
  include('dataconfig.php');

  $sql_w = "SELECT * FROM info_world ORDER BY id DESC LIMIT 1";

  $sql_bd = "SELECT * FROM info_bd ORDER BY id DESC LIMIT 1";

  $sql_prevn = "SELECT * FROM prevents ORDER BY id DESC LIMIT 1";

  $result_w = mysqli_query($conn,$sql_w);

  $result_bd = mysqli_query($conn,$sql_bd);

  if($result_w)
  {
    $data = mysqli_fetch_assoc($result_w);
    $cases_world = $data['cases'];
    $recovered_world = $data['recovered'];
    $deaths_world = $data['deaths'];
  }

  if($result_bd)
  {
    $data = mysqli_fetch_assoc($result_bd);
    $cases_bd = $data['cases'];
    $recovered_bd = $data['recovered'];
    $deaths_bd = $data['deaths'];
  }  
?>

<?php
include('dataconfig.php');
if(isset($_POST['Cases']) && isset($_POST['Recovered']) && isset($_POST['Deaths']))
{
	$cases =  $_POST['Cases'];
	$recovered = $_POST['Recovered'];
	$deaths = $_POST['Deaths'];

	$sql = "INSERT INTO info_world (cases,recovered,deaths) 
	VALUES ('$cases','$recovered','$deaths')";
	mysqli_query($conn,$sql);
}

else if(isset($_POST['Cases_bd']) && isset($_POST['Recovered_bd']) && isset($_POST['Deaths_bd']))
{
	$cases =  $_POST['Cases_bd'];
	$recovered = $_POST['Recovered_bd'];
	$deaths = $_POST['Deaths_bd'];

	$sql = "INSERT INTO info_bd (cases,recovered,deaths) 
	VALUES ('$cases','$recovered','$deaths')";
	mysqli_query($conn,$sql);
}

// else if(isset($_POST['wash_hand']) && isset($_POST['use_mask']) && isset($_POST['use_sanaitizer']) && isset($_POST['avoid_handshake']) && isset($_POST['avoid_touch']) && isset($_POST['doctor_appointment'])){
// 	$wash_hand=$_POST['wash_hand'];
// 	$use_mask=$_POST['use_mask'];
// 	$use_sanaitizer=$_POST['use_sanaitizer'];
// 	$avoid_handshake=$_POST['avoid_handshake'];
// 	$avoid_touch=$_POST['avoid_touch'];
// 	$doctor_appointment=$_POST['doctor_appointment'];

// 	$sql="INSERT INTO prevents (WASH_HAND,USE_MASK,USE_SANITIZER,AVOID_HANDSHAKE,AVOID_TOUCH,D_APPOINTMENT) VALUES ('$wash_hand','$use_mask','$use_sanaitizer','$avoid_handshake','$avoid_touch','$doctor_appointment')";
// 	mysqli_query($conn,$sql);
// }
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
	<link rel="stylesheet" href="css/admin.css">
	<link rel="stylesheet" href="css/media.css">


	<!-- favicon link -->
	<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">

	<title>Corona War|Admin Page</title>
</head>

<body>
	<header class="fixed-top">
		<div class="container">
			<!-- navbar start -->
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand l_img" href="index.php">
					<img class="img-fluid" src="images/logo.png" alt="logo">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse menu" id="navbarNav">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item border rounded-pill border-warning float-left">
							<a class="nav-link" href="logout.php">Logout</a>
						</li>
						<li class="nav-item float-left">
							<a class="nav-link" href="#">
								<?php 
								echo isset($_SESSION['username'])?$_SESSION['username']:"";
								?>  
							</a>
						</li>
					</ul>
				</div>
			</nav>
			<!-- navbar end -->
		</div>
	</header>
	<!-- cases start -->
	<section class="custom_padding">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="row">
						<div class="col-md-12 text-center">
							<h2 class="custom_h2">Enter Whole World Covid Cases</h2>
						</div>
					</div>
					<div class="row c_border">
						<div class="col-md-12 text-center mt-2 mb-2">
							<form action="admin.php" method="POST" onsubmit="myFunctions()">
								<div class="mb-3 col-md-12">
									<label for="" class="t_color">Enter Total Cases:</label>
									<input class="coustom_margin1" type="text" name="Cases" value="<?php echo $cases_world; ?>">		
								</div>
								<div class="mb-3 col-md-12">
									<label for="" class="t_color">Enter Recovered:</label>
									<input class="coustom_margin2" type="text" name="Recovered" value="<?php echo $recovered_world; ?>">
								</div>
								<div class="mb-3 col-md-12">
									<label for="" class="t_color">Enter Total Deaths:</label>
									<input class="coustom_margin3" type="text" name="Deaths" value="<?php echo $deaths_world; ?>">
								</div>
								<div class="text-center">
									<input class="btn btn-warning radious" type="submit" value="submit">
								</div>	
							</form>
						</div>
					</div>	
				</div>
				<div class="col-md-5 offset-2">
					<div class="col-md-12 text-center">
						<h2 class="custom_h2">Enter Bangladesh Covid Cases</h2>
					</div>
					<div class="row c_border">
						<div class="col-md-12 text-center mt-2 mb-2">
							<form action="admin.php" method="POST" onsubmit="myFunctions()">
								<div class="mb-3 col-md-12">
									<label for="" class="t_color">Enter Total Cases:</label>
									<input class="coustom_margin1" type="text" name="Cases_bd" value="<?php echo $cases_bd; ?>">		
								</div>
								<div class="mb-3 col-md-12">
									<label for="" class="t_color">Enter Recovered:</label>
									<input class="coustom_margin2" type="text" name="Recovered_bd" value="<?php echo $recovered_bd; ?>">
								</div>
								<div class="mb-3 col-md-12">
									<label for="" class="t_color">Enter Total Deaths:</label>
									<input class="coustom_margin3" type="text" name="Deaths_bd" value="<?php echo $deaths_bd; ?>">
								</div>
								<div class="text-center">
									<input class="btn btn-warning radious" type="submit" value="submit">
								</div>	
							</form>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- cases end -->
	<!-- footer start -->
	<footer>
		<div class="container">
			<div class="row" style="padding-bottom: 50px;">

				<div class="col-lg-3 col-sm-12 col-12 coronawar">
					<h3>Corona<span>War</span></h3>
					<p>This interactive dashboard/map provides the latest global numbers and numbers by country of COVID-19 cases on a daily basis.</p>
				</div>
				<div class="offset-lg-1 col-lg-1 offset-md-2 col-md-1 offset-sm-2  col-sm-2 offset-1 col-5 f_contact">
					<ul class="list-unstyled">
						<li><a href="#home">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#prenention">Prevention</a></li>
						<li><a href="#blog">Blog</a></li>
						<li><a href="#">Member</a></li>
					</ul>
				</div>

				<div class="offset-md-1 col-md-1 offset-md-1 col-md-1 offset-sm-0 col-sm-2 offset-1 col-4 f_contact">
					<ul class="list-unstyled">
						<li><a href="#faq">Faq</a></li>
						<li><a href="#">Check Symptoms</a></li>
						<li><a href="index.php">Experts</a></li>
					</ul>
				</div>

				<div class="offset-lg-1 col-lg-2 offset-md-1 col-md-3 offset-sm-0  col-sm-3 offset-1 col-5 f_contact">
					<ul class="list-unstyled">
						<li><a href="index.php">Live Report</a></li>
						<li><a href="index.php">Todays Death</a></li>
						<li><a href="index.php">Total Recovered</a></li>
						<li><a href="index.php">Todays Effected</a></li>
					</ul>
				</div>

				<div class="offset-lg-0 col-lg-1 offset-md-0 col-md-2 offset-sm-0  col-sm-2 offset-1  col-4 f_contact">
					<ul class="list-unstyled">
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Youtube</a></li>
						<li><a href="#">Linked In</a></li>
						<li><a href="#">Instagram</a></li>
					</ul>
				</div>

			</div>
			<div class="row designed">
				<div class="col-12">
					<h2>Designed by <a href="#" target="_blank">CoronaWar Team</a></h2>
				</div>
			</div>
		</div>
	</footer>
	<!-- footer end -->

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>