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
    $p_name = $_POST['p_name_id'];
    $r_name = $_POST['r_name_id'];
    $remark = $_POST['remark'];
	
        
    // checking empty fields
    if(empty($m_code) || empty($m_name) || empty($unit) || empty($qty) || empty($p_name) || empty($r_name) || empty($remark)) {                
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
		
		if(empty($p_name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
		
		if(empty($r_name)) {
            echo "<font color='red'>ID field is empty.</font><br/>";
        }
		if(empty($remark)) {
            echo "<font color='red'>Remark field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database    
        $result = mysqli_query($con, "INSERT INTO out_materials(Date,Materials_code, Materials_name, Parts_code, Unit, Out_qty, Provider_name_and_id, Receiver_name_and_id, Remark)VALUES('$myDate','$m_code', '$m_name', '$parts_code', '$unit', '$qty', '$p_name', '$r_name', '$remark')");
        
        //display success message
        //echo "<font color='green'>Data added successfully.";
       // echo "<br/><a href='home.php'>View Result</a>";
	   header('Location: outmaterials.php');
    }
}
  ?>

  
 