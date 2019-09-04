<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>search</title>
		<link rel="stylesheet" href="css/search.css">
	</head>
	
<body>
	<a href="outmaterials.php"><button>BACK</button></a>
	
	<button  class="doprint">PRINT</button>
		<div>
			<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand" href="#">
					<img src="images/logo.png"  alt="logo">
				</a>
			</nav>
		</div>
		
	<div id='printTable'>	
<?php

//session_start();
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
$search_value=$_POST["search"];
if($con->connect_error){
    echo 'Connection Faild: '.$con->connect_error;
    }else{
        $sql="select * from out_materials where Materials_name like '%$search_value%'";

        $res=$con->query($sql);

		echo "<table border='1'>
									<tr>
									  <th>Date</th>
									  <th>Materials Code</th>
									  <th>Materials Name</th>
									  <th>Parts Code</th>
									  <th>Unit</th>
									  <th>Qty</th>
									  <th>Provider Name & ID</th>
									  <th>Receiver Name & ID</th>
									  <th>Remark</th>
									</tr>";
							
								while($row=$res->fetch_assoc())
									  {
									  echo "<tr>";
									  echo "<td>" . $row['Date'] . "</td>";
									  echo "<td>" . $row['Materials_code'] . "</td>";
									  echo "<td>" . $row['Materials_name'] . "</td>";
									  echo "<td>" . $row['Parts_code'] . "</td>";
									  echo "<td>" . $row['Unit'] . "</td>";
									  echo "<td>" . $row['Out_qty'] . "</td>";
									  echo "<td>" . $row['Provider_name_and_id'] . "</td>";
									  echo "<td>" . $row['Receiver_name_and_id'] . "</td>";
									  echo "<td>" . $row['Remark'] . "</td>";
									  echo "</tr>";
									  }

								echo "</table>";
              

        }
?>

</div>
	
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script>
			$('.doprint').click(function(){
				var printme = document.getElementById('printTable');
				var wme = window.open("","","width=900, height=700");
				wme.document.write(printme.outerHTML);
				wme.focus();
				wme.print();
				wme.close();
			})
		</script>

</body>
</html>