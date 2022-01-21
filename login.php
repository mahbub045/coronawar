<?php

session_start();

if (isset($_SESSION['auth'])) {
	if ($_SESSION['auth']==1) {
		header("location:doctor.php");
	}
}
else if (isset($_SESSION['auth3'])) {
	if ($_SESSION['auth3']==1) {
		header("location:patient.php");
	}
}
else if (isset($_SESSION['auth5'])) {
	if ($_SESSION['auth5']==1) {
		header("location:admin.php");
	}
}

else if (isset($_COOKIE['auth2'])) {
	if ($_COOKIE['auth2']==true) {
		header("location:doctor.php");
	}
}
else if (isset($_COOKIE['auth4'])) {
	if ($_COOKIE['auth4']==true) {
		header("location:patient.php");
	}
}
else if (isset($_COOKIE['auth6'])) {
	if ($_COOKIE['auth6']==true) {
		header("location:admin.php");
	}
}



include "dataconfig.php";

$notify="";
if (isset($_POST['login_btn'])) {
 	$email=$_POST['up_email'];
 	$pass=md5($_POST['up_pass']);
 	$loggdin=isset($_POST['keep_login'])?1:0;

 	$loginQuery_d="SELECT * FROM doctors WHERE email='$email' AND pass='$pass' ";
 	$loginQuery_p="SELECT * FROM patients WHERE email='$email' AND pass='$pass' ";
 	$loginQuery_ad="SELECT * FROM admins WHERE email='$email' AND pass='$pass' ";
	

 	$resultLogin_d=$conn-> query($loginQuery_d);
 	$resultLogin_p=$conn-> query($loginQuery_p);
 	$resultLogin_ad=$conn-> query($loginQuery_ad);
	

 	if  ($resultLogin_d-> num_rows>0) {

 		while ($result=$resultLogin_d->fetch_assoc()) {
 		    $username=$result['NAME'];
 		}

 		$_SESSION['username']=$username;

 		$_SESSION['auth']=1;
 		if ($loggdin==1) {
 			setcookie('auth2', true, time()+(60*60*24*15),'/');
 		}
 		header("location:doctor.php");
 	}
 	else if ($resultLogin_p-> num_rows>0) {

 		while ($result=$resultLogin_p->fetch_assoc()) {
 		    $username=$result['NAME'];
 		}
 		$_SESSION['username']=$username;

 		$_SESSION['auth3']=1;
 		if ($loggdin==1) {
 			setcookie('auth4', true, time()+(60*60*24*15),'/');
 		}
 		header("location:patient.php");
 	}
 	else if ($resultLogin_ad-> num_rows>0) {

 		while ($result=$resultLogin_ad->fetch_assoc()) {
 		    $username=$result['NAME'];
 		}
 		$_SESSION['username']=$username;

 		$_SESSION['auth5']=1;
 		if ($loggdin==1) {
 			setcookie('auth6', true, time()+(60*60*24*15),'/');
 		}
 		header("location:admin.php");
 	}

 	else{
 		$notify="Invalid Email or Password. IF You are new User. Please! Register.";

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
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/media.css">


	<!-- favicon link -->
	<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">

	<title>Corona War|Login</title>
</head>
<body>
	<!-- header start -->
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
					</ul>
				</div>
			</nav>
			<!-- navbar end -->
		</div>
	</header>
	<!-- header end -->
	<!-- login start -->
	<section class="container">
		<div class="row offset-4 col-md-4 pb-3 card bg-countom centered">
		<div class="row col-md-3 pl-4 mt-2 offset-4   text-center c_h6">
					<h6>Login</h3>
				</div>
			<div class="col-md-12 ">
				<form class="mt-3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<label class="row r_color1 c_font pl-1" for="up_email">Email:</label>
					<input class="row col-md-11 pl-2 radious" type="email" name="up_email" id="up_email" placeholder="Enter valid Email Address" required>

					<label class="row r_color1 mt-3 c_font pl-1" for="up_pass">Password:</label>
					<input class="row col-md-10 pl-2 radious" type="password" name="up_pass" id="up_pass" placeholder="Enter Your Password" required>

					<label class="row r_color1 mt-3 c_font" for="keep_login">
						<input class="mt-1 " type="checkbox" name="keep_login" id="keep_login">Keep Me Logged in
					</label>

					<input class=" btn_color offset-5 mt-0 radious text-center" type="submit" name="login_btn" value="Login">	
				</form>
				<a href="register.php" class="offset-4"><input class="btn_color ml-4 radious mt-2 text-center" type="submit" name="register" value="Register"></a>
			</div>
 			<div class="ml-5 c_font">
				<?php echo $notify; ?>
			</div>
		</div>
	</section>
	<!-- login end -->
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