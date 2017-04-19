<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Browse View</title>
</head>

<body>
	
	<h1>Browse View :: All Humans</h1>


	<p><a href="add.php" style="font-weight:bold;color:red;">Add a New Human</a></p>


	<?php
	
		//OPEN OUR MySQL CONNECTION
		$connection = mysql_connect('localhost','wra410','MonkeyBread517');
		if(!$connection){ die('Not connected to MySQL:'.mysql_error()); }
		
		//CONNECT TO A SPECIFIC DATABASE - CUSTOMIZE!!!!!
		$database=mysql_select_db('wra410',$connection);
		if(!$database){ die('Not connected to a database:'.mysql_error()); }
	
	
	
		//DO A QUERY FROM OUR HUMANS TABLE AND COUNT THE RESULTS
	
		$query = mysql_query("SELECT * FROM humans ORDER BY lastname");	
		$count = mysql_num_rows($query);
		
		//IF WE GOT NO RESULTS, RETURN AN ERROR MESSAGE; OTHERWISE, DISPLAY THE RESULTS	
		
		if ($count < 1) {
		
			echo "<p>WTF, nothing came back from MySQL!</p>";
		
		} else {			
			
			//LOOP THROUGH THE RESULTS AND PRINT A PARAGRAPH FOR EACH
			
			while ($row = mysql_fetch_array($query)) {		
				extract($row);		
				echo "<p><a href='profile.php?id=$id'>$lastname, $firstname</a></p>";		
			}		
			
		
		}
	
	
	?>


</body>
</html>