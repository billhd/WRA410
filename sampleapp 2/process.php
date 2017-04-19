<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Processing Form Data</title>
</head>

<body>

<?php

	//OPEN OUR PHP CONNECTION - CUSTOMIZE!!! 
	$connection = mysql_connect('localhost','wra410','MonkeyBread517');
	if(!$connection){ die('Not connected to MySQL:'.mysql_error()); }
	
	//CONNECT TO A SPECIFIC DATABASE - CUSTOMIZE!!!!!
	$database=mysql_select_db('wra410',$connection);
	if(!$database){ die('Not connected to a database:'.mysql_error()); }


	//GET ALL OF OUR USER-SUBMITTED FORM DATA OUT OF THE POST ARRAY

	extract($_POST);

	
	//IF THE USER IS ADDING A NEW HUMAN (as indicated with the hidden form field 'action')
	if ($action == "addhuman") {	
	
		//EXECUTE AN INSERT QUERY WITH ALL OF THE FIELDS WE GOT FROM THE USER
		$human = mysql_query("INSERT INTO humans SET firstname='$firstname', 
			lastname='$lastname', 
			email='$email', 
			address_street='$address_street', 
			address_city='$address_city', 
			address_state='$address_state', 
			address_zip='$address_zip'");
			
		//IF ERROR, OUTPUT ERROR; OTHERWISE, SUCCESS MESSAGE	
			
		if (mysql_error()) {
			echo "<p>There was an error adding your human: ".myql_error()."</p>";		
		} else {
			
			//GET THE ID NUMBER OF THE NEW RECORD WE JUST CREATED
			$newhumanid = mysql_insert_id();
			
			echo "<p><strong>Human Added!</strong> View <a href='profile.php?id=$newhumanid'>$firstname $lastname</a>'s profile.</p>";
			echo "<p><a href='add.php'>Add Another Human</a></p>";
			echo "<p><a href='index.php'>Browse Humans</a></p>";
			
		}

	}






	//IF THE USER IS EDITING AN EXISTING RECORD
	if ($action == "edithuman") {
	
		//UPDATE OUR RECORD WITH THE NEW VALUES

		$human = mysql_query("UPDATE humans SET firstname='$firstname', 
			lastname='$lastname', 
			email='$email', 
			address_street='$address_street', 
			address_city='$address_city', 
			address_state='$address_state', 
			address_zip='$address_zip' 
			WHERE id='$id'");

		//IF ERROR, OUTPUT ERROR; OTHERWISE, SUCCESS MESSAGE	
			
		if (mysql_error()) {
			echo "<p>There was an error editing record for '$firstname $lastname': ".myql_error()."</p>";		
		} else {
						
			echo "<p><strong>Profile Updated!</strong> View <a href='profile.php?id=$id'>$firstname $lastname</a>'s edited profile.</p>";
			echo "<p><a href='add.php'>Add a Human</a></p>";
			echo "<p><a href='index.php'>Browse Humans</a></p>";
			
			
		}


	}







	//IF THE USER IS DELETING AN EXISTING RECORD
	if ($action == "deletehuman") {
	
		//UPDATE OUR RECORD WITH THE NEW VALUES

		$human = mysql_query("DELETE FROM humans WHERE id='$id'");

		//IF ERROR, OUTPUT ERROR; OTHERWISE, SUCCESS MESSAGE	
			
		if (mysql_error()) {
			echo "<p>There was an error deleting record for '$firstname $lastname': ".myql_error()."</p>";		
		} else {
						
			echo "<p><strong>Record successfully deleted.</strong></p>";
			echo "<p><a href='add.php'>Add a Human</a></p>";
			echo "<p><a href='index.php'>Browse Humans</a></p>";
			
			
		}


	}







?>


</body>
</html>
