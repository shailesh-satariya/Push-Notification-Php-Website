<?php
	session_start();
	require_once 'config.php';
	if(isSet($_POST['su_submit']))
	{
		$first_name = trim($_POST['su_first_name']);
		$last_name = trim($_POST['su_last_name']);
		$email = trim($_POST['su_email']);
		$password = trim($_POST['su_password']);
		$comfirm_password = trim($_POST['su_confirm_password']);
		$display_name = trim($_POST['su_display_name']);
		
		$i = 0;
		$error [] = array();
		
		if(empty($first_name))
			$error[$i++] = "First Name cannot be empty.";
		
		if(empty($last_name))
			$error[$i++] = "Last Name cannot be empty.";
			
		if(empty($email))
			$error[$i++] = "Email cannot be empty.";
		else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
   			 $error[$i++] = "Invalid Email Id.";

			
		if(empty($password))
			$error[$i++] = "Password cannot be empty.";
		else if(!eregi('^[A-Za-z0-9!@#$%^&*()_]{6,20}$',$password) )
			$error[$i++] = "Invalid characters in password.";
		
		if(empty($comfirm_password))
			$error[$i++] = "Confirm Password cannot be empty.";
		else if($comfirm_password <> $password)
			$error[$i++] = "Password mismatch.";
			
		if(empty($display_name))
			$error[$i++] = "Display Name cannot be empty.";
		else if(!eregi('^[A-Za-z0-9 ]{3,20}$',$display_name))
			$error[$i++] = "Display Name must be 3 to 20 character long.";
			
		
			
		
		include_once './db_connect.php';
		
		$db = new DB_Connect();
        $db->connect();

		
		$sql_check = mysql_query("SELECT * FROM clients WHERE email='$email' ");
						
		if(mysql_num_rows($sql_check) != 0)
		{
			$error[$i++] = "Email Id is already in use.";
		}
		
		$sql_check = mysql_query("SELECT * FROM clients WHERE display_name='$display_name' ");
						
		if(mysql_num_rows($sql_check) != 0)
		{
			$error[$i++] = "Display Name is already in use.";
		}
		
		if($i <> 0)
		{
			$_SESSION['error'] = $error;
			$_SESSION['su_values'] = $_POST;
			header("location:" . SITE_URL);
		} else {
		
			$password = md5($password);
			$first_name = mysql_real_escape_string($first_name);
			$last_name = mysql_real_escape_string($last_name);
			$email = mysql_real_escape_string($email);
			$display_name = trim($display_name);
			mysql_query("INSERT INTO clients(first_name,last_name,email,password,display_name) VALUES('$first_name','$last_name','$email','$password','$display_name')") or die("Could not execute the query");
		}
	}
	else
		header("location:" . SITE_URL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Regestration Succesful | Push Notification Demo</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<?php include("header.php");?>
    
    <div id="main-container">
    	<div id="main-container">
    	<h2>Regestration Succesful</h2>
        <div id="container-text">
        	You have successfully completed registration. Now you can login.
        	<a href="index.php">Log In</a>
        </div>
    </div>
        
    </div>
    
    <?php include("footer.php");?>
</body>
</html>