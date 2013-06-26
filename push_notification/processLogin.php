<?php
	require_once 'config.php';
	$url=SITE_URL;
	session_start();
	if(isset($_POST["li_submit"]))
	{
		include_once 'db_connect.php';
			
		$db = new DB_Connect();
        $db->connect();

		$email = $_POST['li_email'];
		$password = md5($_POST['li_password']);
		$query = "SELECT * FROM CLIENTS WHERE email='$email' AND PASSWORD='$password'";
		$result = mysql_query($query) or die($querys);
		if(mysql_num_rows($result) == 1)
		{
			$row = mysql_fetch_array($result);
			$_SESSION['display_name'] = $row['display_name'];
			$_SESSION['id'] = $row['id'];
			$url = "http://localhost/push_notification/sendNotification.php";
		}
		else
		{
			$error [] = array();
			$error [0] = "The username or password you entered is incorrect. ";
			$_SESSION['error'] = $error;
			$_SESSION['li_values'] = $_POST;
		}
	}
	header("location:$url");
?>