<?php

session_start();

include "db_connect.php";

if($conn===false)
{
	die("connection error");
}


if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="select * from user where email='".$username."' AND password='".$password."' ";

	$result=mysqli_query($conn,$sql);

	$row=mysqli_fetch_array($result);
	

	if($result)
	{	

		$_SESSION["username"]=$username;
		$_SESSION["loggedInUser"]= $row["name"];

		header("location:admin/index.php");
	}


	else
	{
		echo "Username or password incorrect";
	}

}




?>

<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="apple-touch-icon" sizes="76x76" href="assets/img/brand/faviconLogo.png">
<link rel="icon" type="image/png" href="assets/img/brand/faviconLogo.png">
<title>
    Register
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  
  <link href="assets/css/styles.css?v=1.0.3" rel="stylesheet" />
  
</head>
<body class="register-page">

<!----------------------------------------------- Start of Navigation bar---------------------------------------------->


<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg bg-primary navbar-dark position-sticky top-0  py-2">
  <div class="container">
  <a class="navbar-brand mr-lg-5" href="index.html">
    
  <img src="assets/img/brand/logo.png">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse collapse" id="navbar_global">
  <div class="navbar-collapse-header">
  <div class="row">
  <div class="col-6 collapse-brand">
  <a href="index.html">
    <h2>PCS</h2>
  </a>
  </div>
  
  </div>
  </div>
  <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-lg-auto">
  <li>
  <a href="index.html" >
  <i class="ni ni-ui-04 d-lg-none"></i>
  <span class="nav-link-inner--text" style="color: white; margin-right: 15px;">Home</span>
  </a>
  </li>
  
  <li>
  <a href="about-us.html" >
  <i class="ni ni-ui-04 d-lg-none"></i>
  <span class="nav-link-inner--text" style="color: white; margin-right: 15px;">Our Services</span>
  </a>
  
  </li>
  <li >
  <a href="products.php" >
  <i class="ni ni-app d-lg-none"></i>
  <span class="nav-link-inner--text" style="color: white;margin-right: 15px;">Our Projects</span>
  </a>
  
  </li>
  <li>
  <a href="ecosystem.html">
    <i class="ni ni-app d-lg-none"></i>
    <span class="nav-link-inner--text" style="color: white;margin-right: 15px;">Our Ecosystem</span>
    </a>
  
  </li>
  <li>
    <a href="contact-us.html">
      <i class="ni ni-app d-lg-none"></i>
      <span class="nav-link-inner--text" style="color: white;margin-right: 15px;">Customer Support</span>
      </a>
  
  </li>

  </ul>
  </div>
  </div>
  </nav>
<!----------------------------------------------- End of Navigation bar---------------------------------------------->

<div class="wrapper">
<div class="page-header bg-default">
<div class="page-header-image" style="background-image: url('assets/img/loginbg1.jpg');"></div>
<div class="container" id="container">
<div class="form-container sign-up-container">
<form action="javascript:;">
<h2>Create Account</h2>

<span class="text-default mb-4">or use your email for registration</span>
<div class="form-group mb-3">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-building"></i></span>
</div>
<input class="form-control" placeholder="Company Name" type="text">
</div>
</div>
<div class="form-group mb-3">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-tag"></i></span>
</div>
<input class="form-control" placeholder="Account Type" type="text">
</div>
</div>
<div class="form-group mb-3">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-circle-08"></i></span>
</div>
<input class="form-control" placeholder="Full Name" type="text">
</div>
</div>
<div class="form-group mb-3">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-email-83"></i></span>
</div>
<input class="form-control" placeholder="Email" type="email">
</div>
</div>
<div class="form-group">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
</div>
<input class="form-control" placeholder="Password" type="password">
</div>
</div>
<a class="btn btn-primary" href="admin/index.html">Create Account</a>
</form>
</div>


<div class="form-container sign-in-container">
<form method="POST">
<h2>Login</h2>

<span class="text-default mb-4">or use your account</span>
<div class="form-group mb-3">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-email-83"></i></span>
</div>
<input class="form-control" placeholder="Email" type="email" name="username">
</div>
</div>
<div class="form-group">
<div class="input-group input-group-alternative">
<div class="input-group-prepend">
<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
</div>
<input class="form-control" placeholder="Password" type="password" name="password">
</div>
</div>
<button class="btn btn-primary mt-5" type="submit">Login</button>
<a class="mt-2">Forgot your password?</a>
</form>
</div>
<div class="overlay-container">
<div class="overlay">
<div class="overlay-panel overlay-left">
<h1 class="text-white">Welcome Back!</h1>
<p>
To keep connected with us please login with your personal info
</p>
<button class="btn btn-neutral btn-sm" id="signIn">Login</button>
</div>
<div class="overlay-panel overlay-right">
<h1 class="text-white">Hello, Friend!</h1>
<p>Enter your personal details and start journey with us</p>
<button class="btn btn-neutral btn-sm" id="signUp">Create Account</button>
</div>
</div>
</div>
</div>
</div>
<script>
      // The SignUp/SignIn form

      const signUpButton = document.getElementById('signUp');
      const signInButton = document.getElementById('signIn');
      const container = document.getElementById('container');

      signUpButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
      });

      signInButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
      });
    </script>


<!----------------------------------------------- Start of Footer ---------------------------------------------->

<!----------------------------------------------- End of Footer ---------------------------------------------->


</div>

<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

<script src="assets/js/plugins/bootstrap-switch.js"></script>

<script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>

<script src="assets/js/plugins/glide.js" type="text/javascript"></script>

<script src="assets/js/plugins/moment.min.js"></script>

<script src="assets/js/plugins/choices.min.js" type="text/javascript"></script>

<script src="assets/js/plugins/datetimepicker.js" type="text/javascript"></script>

<script src="assets/js/plugins/jasny-bootstrap.min.js"></script>

<script src="assets/js/plugins/headroom.min.js"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>




</body>

</html>