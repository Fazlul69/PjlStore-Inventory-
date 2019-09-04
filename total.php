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
		<link rel="stylesheet" href="css/total.css">
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
					<div class="col-sm-4 col-md-4 hidden-xs">
						<ul>
							<li><button type="button" class="btn btn-info btn-lg doprint"><i class="fas fa-print"></i>PRINT</button></li>
							<li><a href="home.php" class="forback"><i class="fas fa-backward"></i>Back</a></li>
						</ul>	
					</div>	
					<div class="col-sm-8 col-md-8">
						<div class="searchbyname">
									<!--search by name start-->
									<div class=" visible-xs tano">
									<a href="home.php" class="forback"><i class="fas fa-backward"></i></a>
									</div>
									<div class="search-container">
										<form action="searchFromTotal.php" method="post">
											<input type="text" name="search" placeholder="Search by Material Name"/>
											<button type="submit"><i class="fa fa-search"></i></button>
										</form>
									</div>
									<!--search end-->
						</div>
					
				<!-- total balance start-->
							
							
						<div  id='printTable'>
							<?php
							
								session_start();
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
								
								$res=mysqli_query($con, "SELECT i.Materials_code, i.Materials_name, i.Parts_code, i.Unit, i.Input_qty, o.Materials_code, o.Materials_name, o.Parts_code, o.Unit, o.Out_qty
														 FROM input i, out_materials o
														 WHERE i.Materials_name = o.Materials_name");
														 
									
									while($row=mysqli_fetch_array($res))	
									{

									 $inm_code = $row['Materials_code'];
									 $inm_name = $row['Materials_name'];
									 $inp_code = $row['Parts_code'];
									 $inunit = $row['Unit'];
									 $inqty = $row['Input_qty'];
									 $outm_code = $row['Materials_code'];
									 $outm_name = $row['Materials_name'];
									 $outp_code = $row['Parts_code'];
									 $outunit = $row['Unit'];
									 $outqty = $row['Out_qty'];
									
									 $sql=mysqli_query($con, "INSERT INTO total (Materials_code,Materials_name,Parts_code,Unit,Input_qty,Out_qty) 
								VALUES('$inm_code','$inm_name','$inp_code','$inunit','$inqty','$outqty')");
								
									$sql2=mysqli_query($con, "UPDATE total t2
												INNER JOIN (
												  SELECT Materials_name, SUM(Input_qty) as qty_total
												  FROM input
												  GROUP BY Materials_name
												) t1 ON t2.Materials_name = t1.Materials_name
									 SET t2.Input_qty = t1.qty_total");
									}
							
								$page=$_GET["page"];
								if($page=="" | $page=="1")
								{
									$page1=0;
								}
								else{
									$page1=($page*15)-15;
								}
								
								$result = mysqli_query($con, "SELECT * FROM total");
								echo "<table border='1'>
									 <tr>
									   <th>Serial No</th>
									   <th>Materials Code</th>
									   <th>Materials Name</th>
									   <th>Parts Code</th>
									   <th>Unit</th>
									   <th>Input Qty</th>
									   <th>Out Qty</th>
									   <th>Qty</th>
									   <th>Delete</th>
									 </tr>";
								$counter=1;
								while($row = mysqli_fetch_array($result))
									  {
									  echo "<tr>";
									  echo "<td>" . $counter . "</td>";
									  echo "<td>" . $row['Materials_code'] . "</td>";
									  echo "<td>" . $row['Materials_name'] . "</td>";
									  echo "<td>" . $row['Parts_code'] . "</td>";
									  echo "<td>" . $row['Unit'] . "</td>";
									  echo "<td>" . $row['Input_qty'] . "</td>";
									  echo "<td>" . $row['Out_qty'] . "</td>";
									  $row['Qty']=$row['Input_qty']-$row['Out_qty'];
									  echo "<td>" . $row['Qty'] . "</td>";
									  echo "<td><a href=\"deletefromtotal.php?Materials_name=".$row['Materials_name']."\">Delete</a></td>";
									  echo "</tr>";
									  $counter++;
									  }
								echo "</table>";
							
							//counting no of page
							$result = mysqli_query($con, "SELECT * FROM total");
							$cou=mysqli_num_rows($result);
							$a=$cou/15;
							$a=ceil($a);
							for($b=1;$b<=$a;$b++)
							{
								?>
								<div class="page">
									<a class="pagination" href="total.php?page=<?php echo $b;?>"><?php echo$b."  ";?></a>  
								</div>
								<?php
							}
							
								mysqli_close($con);
							?>	<!--end showing data from database-->
						
						</div>
					</div>	
				</div>
					<!-- total balance end-->
						
					
						
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