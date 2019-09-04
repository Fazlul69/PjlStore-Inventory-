<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	
	</head>
	<body>
		<?php
		 
		 
		// Change this to your connection info.
		$DATABASE_HOST = 'localhost';
		$DATABASE_USER = 'root';
		$DATABASE_PASS = '';
		$DATABASE_NAME = 'storemgmnt';
		// Try and connect using the info above.
		$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
		if ( mysqli_connect_errno() ) {
			// If there is an error with the connection, stop the script and display the error.
			die ('Failed to connect to MySQL: ' . mysqli_connect_error());
		}
		 
			if( isset($_GET['edit']) )
			{
				$date = $_GET['edit'];
				$res= mysqli_query($con, "SELECT * FROM input WHERE Date='$date'");
				$row= mysqli_fetch_array($res);
			}
			
			if( isset($_GET['edit']) )
			{
				$m_name = $_GET['edit'];
				$res= mysqli_query($con, "SELECT * FROM input WHERE Materials_name='$m_name'");
				$row= mysqli_fetch_array($res);
			}
		 
			if( isset($_POST['Qty']) )
			{
				$Qty = $_POST['Qty'];
				$date  	 = $_POST['Date'];
				$m_name  	 = $_POST['Materials_name'];
				$sql     = "UPDATE input SET input_qty='$Qty' WHERE Materials_name='$m_name' AND Date='$date' ";
				$res 	 = mysqli_query($con,$sql) 
						   or die("Could not update".mysqli_error());
						  echo "<script>window.open('input.php','_self')</script>";
						 // exit(header('Location: home.php'));
						
			}
		?>
	</body>
</html>
