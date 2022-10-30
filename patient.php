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

include("dataconfig.php");

$selectsql="SELECT * FROM doctors";

$conn->query($selectsql);
$result_doc=$conn->query($selectsql);

$p_name=isset($_SESSION['username'])?$_SESSION['username']:"";

if (isset($_POST['add_info'])) {
  $d_name=$_POST['dd_name'];
  $s_type=$_POST['test_type'];

  if ($s_type==true) {
    $insertSql=" INSERT INTO visit(D_NAME,P_NAME,S_TYPE) VALUES ('$d_name','$p_name','$s_type') ";

    if ($conn-> query($insertSql)) {
      header("location:patient.php");
    }else {
      die($conn-> error);
    }

  }
  
}
// $selectsql3="SELECT * FROM visit WHERE P_NAME ";
$selectsql2="SELECT * FROM visit";

$conn->query($selectsql2);
$result_info=$conn->query($selectsql2);


//total count start
$c=400;
$a=150;
$v=500;
$sum=0;

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
	<link rel="stylesheet" href="css/patient.css">
	<link rel="stylesheet" href="css/media.css">


	<!-- favicon link -->
	<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">

	<title>Corona War|Patient Page</title>
</head>
<body>

	<header>
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
            <li class="nav-item border rounded-pill border-warning float-left ml-3"> 
              <a class="nav-link" href="patientEditProfile.php" >Edit Profile</a>
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
  <!-- header end -->
  <!-- meet start -->
  <section class="meet" id="experts">
    <div class="container">
      <!-- 1st row start -->
      <div class="row">
        <div class="offset-lg-3 col-lg-6 offset-md-2 col-md-9 col-12 text-center meet_title">
          <h1 class="custom_h1">Choose Your Dector and Service Type</h1>
        </div>
      </div>
      <!-- 1st row end -->
      <!-- 2nd row start -->
      <div class="row">
        <?php while ($doctor=$result_doc->fetch_assoc()) {?>
          <!-- single start -->
          <div class="col-md-4 col-12 text-center c_padding">
            <!-- <div><img class="img-fluid" src="images/robin.png" alt="robin"></div> -->
            <div class="meet_content" >
                <h3><?php echo $doctor['NAME'];?></h3>
                <p><?php echo $doctor['TYPE'];?></p>
              </div>
          </div>
          <?php }?>
          <!-- single end -->
        </div>
        <!-- 2nd row end -->
        <!-- 3rd row start -->
        <div class="row">
          <!-- 1st col start -->
          <div class="col-md-5 col-12 text-center service_content">
            <div class="mt-2">
              <h3>Our service Types</h3>
            </div>
            <div>
              <h6>1. Corona Test(400৳)</h6>
              <h6>2. Antibody Test(150৳)</h6>
              <h6>3. Get Vaccine(500৳)</h6>
            </div>
          </div>
          <!-- 1st col end -->
          <!-- 2nd col start -->
          <div class="offset-md-2 col-md-5 col-12 text-center service_content">
            <div class="mt-2">
              <h3>Enter the Doctor Name & Your Service Type</h3>
            </div>
            <div>
              <form action=" <?php echo $_SERVER['PHP_SELF'];?> " method="post">
                <input type="name" class="offset-3 form-control col-md-6 col-6 mt-2 c_form_control" name="dd_name" id="dd_name" aria-describedby="dd_name" placeholder="Enter Doctor Name" required>
                <!-- <input type="name" class="offset-3 form-control col-md-6 mt-2 mb-1 c_form_control" name="test_type" id="test_type" aria-describedby="test_type" placeholder="Enter Service" required> -->

                <div class="offset-2 col-md-7 col-6 mt-2">
                  <select name="test_type" id="test_type" class="custom-select ml-3 c_form_control">
                    <option selected>Select Service</option>
                    <option value="Corona Test">Corona Test</option>
                    <option value="Antibody Test">Antibody Test</option>
                    <option value="Get Vaccine">Get Vaccine</option>
                  </select>
                </div>
                

                <button type="submit" name="add_info" class="btn btn-warning radious mt-1 mb-2">Submit</button>
              </form>
            </div>
          </div>
          <!-- 2nd col end -->
        </div>
        <!-- 3rd row end -->
      </div>
    </section>
    <!-- meet end -->
    <!-- Information start -->
    <section class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="offset-lg-3 col-lg-6 offset-md-3 col-md-8 text-center meet_title custom_h1">My Information</h1>
        </div>
        <?php while ($info=$result_info->fetch_assoc()) {?>
          <?php if ($p_name==$info['P_NAME']) { ?>
            <div class="col-md-12">
              <hr>
              <h3 class="custom_h3">Doctor Name:</h3>
              <p class="custom_p"><?php echo $info['D_NAME'];?></p>
              <h5 class="custom_h3">My Service Type:</h5>
              <p class="custom_p"><?php 

              echo $info['S_TYPE'];

              $var=$info['S_TYPE'];
              
              if($var=='Corona Test'){
                $re=$c;
              }
              else if($var=='Antibody Test'){
                $re=$a;
              }
              else if($var=='Vaccine Push'){
                $re=$v;
              }
              $sum=$sum+$re;
              ?></p>
              <a href="delete.php?ID=<?php echo $info['ID'];?>" type="submit" class="btn btn-warning radious mt-1 mb-1">Cancel</a>

              </div><?php } ?>
              <?php } ?>
            </div>
            <div class="offset-md-4 mb-3 col-md-5 text-center p_list">
              <h4 class="offset-lg-3 mt-3 col-lg-6 offset-md-3 col-md-8  meet_title custom_h4">Total cost</h4>
              <p class="custom_p"><?php echo $sum; ?>৳</p>
            </div>
          </section>
          <!-- Information end -->

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
                  <h2>Designed by <a href="#" target="_blank">Corona War Team</a></h2>
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