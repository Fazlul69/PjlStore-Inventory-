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
		<LINK REL="stylesheet" TYPE="text/css" MEDIA="(max-width: 1024px)" HREF="input.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/out.css">
		<!--<link href="style.css" rel="stylesheet" type="text/css">-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	
	<body class="loggedin">
		
		<nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="image" width="158" height="56"></a>
            </div>
        </div><!-- /.container -->
    </nav>
    <!--navbar ends-->
		  
		
		<section id="main">
			<div class="container">
				<div class="row">
					<div class="col-sm-3 col-md-3 hidden-xs">
						
						<ul>
						  <!-- Trigger the modal with a button -->
						 <li><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i>Add Out Product</button></li>

						  <!-- Modal -->
						  <div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
							
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Added new out product from PJL store.</h4>
								</div>
								<div class="modal-body">
								 
										<form action="outproduct.php" method="post" name="form2">
											<table width="25%" border="0">
												<tr> 
													<td>Date</td>
													<td><input type="date" name="date" ></td>
												</tr>
												<tr> 
													<td>Materials Code</td>
													<td><input type="text" name="m_code"></td>
												</tr>
												<tr> 
													<td>Materials Name</td>
													<td><input type="text" name="m_name"></td>
												</tr>
												<tr> 
													<td>Parts Code</td>
													<td><input type="text" name="parts_code"></td>
												</tr>
												<tr> 
													<td>Unit</td>
													<td><input type="text" name="unit"></td>
												</tr>
												<tr> 
													<td>Qty</td>
													<td><input type="number" name="qty"></td>
												</tr>
												<tr> 
													<td>Provider Name & ID</td>
													<td><input type="text" name="p_name_id"></td>
												</tr>
												<tr> 
													<td>Receiver Name & ID</td>
													<td><input type="text" name="r_name_id"></td>
												</tr>
												<tr> 
													<td>Remark</td>
													<td><input type="text" name="remark"></td>
												</tr>
												<tr> 
													<td></td>
													<td><input type="submit" name="Submit" value="Add"></td>
												</tr>
											</table>																	
										</form>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							  
							</div>
						  </div>
						 <li><button type="button" class="btn btn-info btn-lg doprint"><i class="fas fa-print"></i>PRINT</button></li>
						 <li><a href="home.php" class="forback"><i class="fas fa-backward"></i>Back</a></li>
						</ul>
					</div>
					<div class="col-sm-9 col-md-9">
						<div class="searchbyname">
									<!--search by name start-->
									<div class=" visible-xs tano">
									<a href="home.php" class="forback"><i class="fas fa-backward"></i></a>
									</div>
									<div class="search-container">
										<form action="searchNamefromOut.php" method="post">
											<input type="text" name="search" placeholder="Search by Material Name"/>
											<button type="submit"><i class="fa fa-search"></i></button>
										</form>
									</div>
									<!--search end-->
						</div>
						<!--show data from database-->
							<div id='printTable'>		
								<?php
							
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
								
								$page=$_GET["page"];
								if($page=="" | $page=="1")
								{
									$page1=0;
								}
								else{
									$page1=($page*15)-15;
								}
								
								$result = mysqli_query($con, "SELECT * FROM out_materials limit $page1,10");
								echo "<table border='1'>
									<tr>
									  <th>Serial No</th>
									  <th>Date</th>
									  <th>Materials Code</th>
									  <th>Materials Name</th>
									  <th>Parts Code</th>
									  <th>Unit</th>
									  <th>Qty</th>
									  <th>Provider Name & ID</th>
									  <th>Receiver Name & ID</th>
									  <th>Remark</th>
									  <th>Delete</th>
									</tr>";
								$counter=1;
								while($row = mysqli_fetch_array($result))
									  {
									  echo "<tr>";
									  echo "<td>" . $counter . "</td>";
									  echo "<td>" . $row['Date'] . "</td>";
									  echo "<td>" . $row['Materials_code'] . "</td>";
									  echo "<td>" . $row['Materials_name'] . "</td>";
									  echo "<td>" . $row['Parts_code'] . "</td>";
									  echo "<td>" . $row['Unit'] . "</td>";
									  echo "<td>" . $row['Out_qty'] . "</td>";
									  echo "<td>" . $row['Provider_name_and_id'] . "</td>";
									  echo "<td>" . $row['Receiver_name_and_id'] . "</td>";
									  echo "<td>" . $row['Remark'] . "</td>";
									  echo "<td><a href=\"deletefromout.php?Serial_No=".$row['Serial_No']."\">Delete</a></td>";
									  echo "</tr>";
									  $counter++;
									  }

									echo "</table>";
									
									//counting no of page
							$result = mysqli_query($con, "SELECT * FROM out_materials");
							$cou=mysqli_num_rows($result);
							$a=$cou/15;
							$a=ceil($a);
							for($b=1;$b<=$a;$b++)
							{
								?>
								<div class="page">
									<a class="pagination" href="outmaterials.php?page=<?php echo $b;?>"><?php echo$b."  ";?></a> 
								</div>
								<?php
							}
							
									mysqli_close($con);
								?>	<!--end showing data from database-->
							</div>
					</div>
							
						<!-- out materials end-->
					
					
						
				</div>
			</div>
		</section>	
		
		
		
		
		
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
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
		
		
	</body>
</html>