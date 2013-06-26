<?php

		
		
		include_once './db_connect.php';
		
		$db = new DB_Connect();
    	$db->connect();
	
		$message_id = "50";
	
		$query = "SELECT clients.display_name AS 'from', messages.subject 'subject', messages.message AS 'message', messages.date AS 'date' FROM gcm_users, client_outbox, messages, clients WHERE messages.id = client_outbox.message_id AND client_outbox.client_id = clients.id AND messages.id = '$message_id'";

		//echo $query;
	
		$result = mysql_query($query) or die($query);

		//$response["messages"] = array();
		$response = array();
   		$r = mysql_fetch_assoc($result);
		$response = $r;
		header('content-type: application/json;');

		
		$objJson = json_encode($response);
		echo  $objJson;
		
	
?>