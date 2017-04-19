<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profile View</title>
</head>

<body>



	<?php
	
		//OPEN THE CONNECTION TO MySQL
		$connection = mysql_connect('localhost','wra410','MonkeyBread517');
		if(!$connection){ die('Not connected to MySQL:'.mysql_error()); }
		
		//CONNECT TO A SPECIFIC DATABASE - CUSTOMIZE!!!!!
		$database=mysql_select_db('wra410',$connection);
		if(!$database){ die('Not connected to a database:'.mysql_error()); }
	
	
		//USE 'GET' TO GET THE ID NUMBER OF THE HUMAN TO VIEW
		$id = $_GET['id'];
		
		//QUERY THE HUMANS TABLE FOR THE SPECIFIC HUMAN
		$human = mysql_query("SELECT * FROM humans WHERE id='$id'");
		
		//PLACE ALL OF THE RESULTS FROM MySQL INTO A VARIABLE
		$row = mysql_fetch_array($human);
		
		//EXPLODE THE RESULT ROW INTO INDIVIDUAL VARIABLES
		extract($row);
	
	?>
	
	
	<h1>Human Profile: <?php echo $firstname; ?> <?php echo $lastname; ?></h1>
	
	<p><a href="edit.php?id=<?php echo $id; ?>" style="color:green;">Edit <?php echo $firstname; ?>'s Profile</a></p>
	
	<p><a href="delete.php?id=<?php echo $id; ?>" style="color:red;">Delete <?php echo $firstname; ?>'s Profile</a></p>
	
	<ul>
	
		<li>email: <?php echo $email; ?></li>
		<li>city: <?php echo $address_city; ?></li>
		<li>state: <?php echo $address_state; ?></li>
		<li>zip: <?php echo $address_zip; ?></li>
	
	</ul>
	
	
	<p><?php echo $firstname; ?> <?php echo $lastname; ?></p>
	<p><?php echo $address_street; ?></p>
	<p><?php echo $address_city; ?>, <?php echo $address_state; ?></p>
	<p><?php echo $address_zip; ?></p>


	
	<p><a href="index.php" style="font-weight:bold;color:red;">Browse Humans</a></p>

</body>
</html>