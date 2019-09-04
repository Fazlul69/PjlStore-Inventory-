<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>search</title>
		<link rel="stylesheet" href="css/search.css">
	</head>
	<body>
		<a href="input.php"><button>BACK</button></a>
		
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
						$date_value=$_POST["date_from"];
						if($con->connect_error){
							echo 'Connection Faild: '.$con->connect_error;
							}else{
								$sql="select * from input where Date like '%$date_value%'";

								$res=$con->query($sql);

						echo "<table border='1'>
								<tr>
									 <th>Date</th>
									 <th>Materials Code</th>
									 <th>Materials Name</th>
									 <th>Parts Code</th>
									 <th>Unit</th>
									 <th>Qty</th>
									 <th>Receiver Name & ID</th>
									 <th>Provider Name & ID</th>
								</tr>";
											
							while($row=$res->fetch_assoc())
								{
									echo "<tr>";
									echo "<td>" . $row['Date'] . "</td>";
									echo "<td>" . $row['Materials_code'] . "</td>";
									echo "<td>" . $row['Materials_name'] . "</td>";
									echo "<td>" . $row['Parts_code'] . "</td>";
									echo "<td>" . $row['Unit'] . "</td>";
									echo "<td>" . $row['Input_qty'] . "</td>";
									echo "<td>" . $row['RcvNameId'] . "</td>";
									echo "<td>" . $row['PrvNameId'] . "</td>";
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