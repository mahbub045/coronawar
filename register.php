<?php 
include ("dataconfig.php");
$result=null;
$ntfy=null;

if (isset($_POST['add_info'])) {
  $name   = $_POST['InputName'];
  $email  = $_POST['InputEmail'];
  $type  = $_POST['Inputtype'];
  $pass   = md5($_POST['InputPassword']);
  $c_pass = md5($_POST['InputC_Password']);
  $reg_as_d=isset($_POST['reg_doc'])?1:0;
  $reg_as_p=isset($_POST['reg_pat'])?1:0;

  $rse1=mysqli_query($conn,"SELECT * FROM doctors WHERE email = '$email' ");
  $rse2=mysqli_query($conn,"SELECT * FROM patients WHERE email = '$email' ");
  $num1 = mysqli_num_rows($rse1);
  $num2 = mysqli_num_rows($rse2);
  if ($num1==1 && $num2==1) {
    $ntfy="The E-mail you have chosen is already taken!";
  }

   else if ( ($pass==$c_pass) && ($reg_as_d==1) ) {
    $insertSql=" INSERT INTO doctors(name,email,type,pass) VALUES ('$name','$email','$type','$pass') ";

    if ($conn-> query($insertSql)) {
      header("location:login.php");
    }else {
      die($conn-> error);
    }
  }
  else if ( ($pass==$c_pass) && ($reg_as_p==1) ) {
    $insertSql=" INSERT INTO patients(name,email,pass) VALUES ('$name', '$email','$pass') ";

    if ($conn-> query($insertSql)) {
      header("location:login.php");
    }else {
      die($conn-> error);
    }
  }
  else {
    $result="Password don't Matched";
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
	<link rel="stylesheet" href="css/register.css">
	<link rel="stylesheet" href="css/media.css">


	<!-- favicon link -->
	<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16"> 

	<title>Corona War|Register</title>
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
	<section class="container">
		<div class="row">
			<div class="col-md-4 offset-1 mt-5 card bg-countom centered">
				<div class="row col-md-4 offset-4 pl-4 mt-2  text-center c_h6">
					<h6>Register</h3>
				</div>
				<form class="ml-3 mt-0" action=" <?php echo $_SERVER['PHP_SELF'];?> " method="post">
					<div class="mt-2 c_font">
						<label class="row r_color1 c_font pl-1" for="InputName">Full Name:</label>
						<input type="name" class="row col-md-9 pl-2 radious" id="InputName" name="InputName" placeholder="Enter Your Full Name" required>
					</div>
					<div class="mt-2 c_font">
						<label class="row r_color1 c_font pl-1" for="InputEmail">Email address:</label>
						<input type="email" class="row col-md-9 pl-2 radious" id="InputEmail" name="InputEmail" placeholder="Enter Valid Email Address" required>
					</div>
					<div class="mt-2 c_font">
						<label class="row r_color1 c_font pl-1" for="Inputtype">Experience:</label>
						<input type="name" class="row col-md-8 pl-2 radious" id="Inputtype" name="Inputtype" placeholder="Enter experience if you are a Doctor">
					</div>
					<div class="mt-2 c_font">
						<label class="row r_color1 c_font pl-1" for="InputPassword">Password:</label>
						<input type="password" class="row col-md-5 pl-2 radious" name="InputPassword" id="InputPassword" placeholder="Enter A Strong Password" required>
					</div>
					<div class="mt-2 c_font">
						<label class="row r_color1 c_font pl-1" for="InputC_Password">Confirm Password:</label>
						<input type="password" class="row col-md-5 pl-2 radious" name="InputC_Password" id="InputC_Password" placeholder="Re-type Password" required>
					</div>
					<div class="mt-3 c_font">
						<input class=" mt-2" type="radio" name="reg_doc" id="reg_doc" value="option1">
						<label class="r_color1 c_font pl-0" class="form-check-label" for="reg_doc">
							Register as Doctor
						</label>
					</div>
					<div class=" c_font">
						<input class=" mt-2" type="radio" name="reg_pat" id="reg_pat" value="option2">
						<label class="r_color1 c_font pl-0" class="form-check-label" for="reg_pat">
							Register as Patient
						</label>
					</div>
					<div class="text-center">
						<button type="submit" name="add_info" class=" btn_color radious ">Submit</button>
					</div>
					<div class="h6 mt-3 rounded bg-warning text-danger font-weight-bold col-md-10">
						 <?php echo $ntfy;?> 
					</div>
					<div class="h6 mt-3 rounded bg-warning text-danger font-weight-bold col-md-6">
						 <?php echo $result;?> 
					</div>
				</form>
				<div class="text-center a_btn">
					<h5 class="c_font">Already have an account?<a type="submit" class="ml-1" href="login.php">Login here.</a></h5>
				</div>
			</div>
		</div>
	</section>
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