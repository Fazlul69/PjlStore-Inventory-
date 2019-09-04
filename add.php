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

if(isset($_POST['Submit'])) {  
	$myDate = $_POST['date'];
    $m_code = $_POST['m_code'];
    $m_name = $_POST['m_name'];
    $parts_code = $_POST['parts_code'];
    $unit = $_POST['unit'];
    $qty = $_POST['qty'];
    $r_name = $_POST['r_name_id'];
    $p_name = $_POST['p_name_id'];
	
	 
        
    // checking empty fields
       if(empty($m_code) || empty($m_name) || empty($unit) || empty($qty) || empty($r_name) || empty($p_name)) {                
          if(empty($m_code)) {
               echo "<font color='red'>Material code field is empty.</font><br/>";
           }
        
           if(empty($m_name)) {
               echo "<font color='red'>Material name field is empty.</font><br/>";
           }
        
		
		   if(empty($unit)) {
               echo "<font color='red'>Unit field is empty.</font><br/>";
           }
		
		   if(empty($qty)) {
               echo "<font color='red'>Qty field is empty.</font><br/>";
           }
		
		   if(empty($r_name)) {
              echo "<font color='red'>Field is empty.</font><br/>";
          }
		
		   if(empty($p_name)) {
               echo "<font color='red'>Field is empty.</font><br/>";
           }
        
        
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database 
			
        $result = mysqli_query($con, "INSERT INTO input(Date,Materials_code, Materials_name, Parts_code, Unit, Input_qty, RcvNameId, PrvNameId)VALUES('$myDate','$m_code', '$m_name', '$parts_code', '$unit', '$qty', '$r_name', '$p_name')");
        
        //display success message
        //echo "<font color='green'>Data added successfully.";
       // echo "<br/><a href='home.php'>View Result</a>";
	   header('Location: input.php');
    }
}
  ?>