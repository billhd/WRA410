<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Entry Form</title>
</head>

<body>


<h1>Add a Human</h1>


<form action="process.php" method="post">

	<input type="hidden" name="action" value="addhuman" />
	
	
    <p>First Name: <input type="text" name="firstname" id="firstname" /></p>

	
    <p>Last Name: <input type="text" name="lastname" /></p>
	
    <p>Email Address: <input type="text" name="email" /></p>
	
    <p>Street: <input type="text" name="address_street" /></p>
	
    <p>City: <input type="text" name="address_city" /></p>
    
    <p>State: <input type="text" name="address_state" /></p>
    
    <p>ZIP: <input type="text" name="address_zip" /></p>
	

	<input type="submit" value="Add Human" />




</form>



</body>
</html>
