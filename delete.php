
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
if(isset($_GET['Serial_No']))
{
// get id value

$Serial_No = $_GET['Serial_No'];


// delete the entry

$result = mysqli_query($con, "DELETE FROM input WHERE Serial_No='{$Serial_No}'")

or die(mysqli_error($con));


echo "<script>window.open('input.php','_self')</script>";
}
?>