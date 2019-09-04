<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<LINK REL="stylesheet" TYPE="text/css" MEDIA="(max-width: 1024px)" HREF="home.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/home.css">
		<!--<link href="style.css" rel="stylesheet" type="text/css">-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	
	<body class="loggedin">
		
		<!--navbar starts-->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="image" ></a>
            </div>
        </div><!-- /.container -->
    </nav>
    <!--navbar ends-->
		<section id="menu">
			<div class="container">
				<ol>
					<li><a href="input.php"><i class="fas fa-indent"></i>Input Materials</a></li>
					<li><a href="outmaterials.php"> <i class="fas fa-outdent"></i>Out Materials</a></li>
					<li><a href="total.php"><i class="fas fa-balance-scale"></i>Total Balance</a></li>
					<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				</ol>
			</div>
		</section>	
		
		<div class="example1">
			<h3>Developed By Engineeering Department </h3>
		</div>
		
		<div class="dev">
			<a href=developer.html><i class="far fa-dot-circle"></i></a>
		</div>
		
	</body>
</html>