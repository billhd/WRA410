<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Records</title>
</head>

<body>




<?php


	//OPEN THE CONNECTION TO MySQL
	$connection = mysql_connect('localhost','wra410','MonkeyBread517');
	if(!$connection){ die('Not connected to MySQL:'.mysql_error()); }
	
	//CONNECT TO A SPECIFIC DATABASE - CUSTOMIZE!!!!!
	$database=mysql_select_db('wra410',$connection);
	if(!$database){ die('Not connected to a database:'.mysql_error()); }


	//RETRIEVE THE ID OF THE RECORD WE'RE EDITING FROM THE GET ARRAY
	
	if (!$_GET['id']) {
		echo "<p>No record specified for editing.</p>";	
		die();
	} else {
		$id = $_GET['id'];	
	}
	
	//NOW CHECK TO SEE IF THE RECORD INDICATED MATCHES A RECORD IN THE DATABASE
	$query = mysql_query("SELECT * FROM humans WHERE id='$id'");
	$count = mysql_num_rows($query);
	
	//IF NO RECORD FOUND, WARN AND DIE; OTHERWISE, RETRIEVE THE RECORD FROM THE ARRAY AND EXTRACT
	
	if ($count == 0) {
		echo "<p>Record not found.</p>";
		die();
	} else {
		$row = mysql_fetch_array($query);
		extract($row);	
	}
	

?>


<?php if($count != 0): ?>

<h1>Edit Record: <?php echo $firstname . " " . $lastname; ?></h1>


<form action="process.php" method="post">

	<input type="hidden" name="action" value="edithuman" />
	<input type="hidden" name="id" value="<?php echo $id; ?>" />
	
	
    <p>First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>" /></p>

	
    <p>Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>" /></p>
	
    <p>Email Address: <input type="text" name="email" value="<?php echo $email; ?>" /></p>
	
    <p>Street: <input type="text" name="address_street" value="<?php echo $address_street; ?>" /></p>
	
    <p>City: <input type="text" name="address_city" value="<?php echo $address_city; ?>" /></p>
    
    <p>State: <input type="text" name="address_state" value="<?php echo $address_state; ?>" /></p>
    
    <p>ZIP: <input type="text" name="address_zip" value="<?php echo $address_zip; ?>" /></p>
	

	<input type="submit" value="Submit Edits" />




</form>


<?php endif; ?>



</body>
</html>
