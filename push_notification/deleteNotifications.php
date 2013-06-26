<?php
	if (isset( $_REQUEST['message_ids'])) {
		
		$response = array();
		
		include_once './db_connect.php';
		
		$db = new DB_Connect();
    	$db->connect();
	
		$message_ids = $_REQUEST['message_ids'];
		
		
	
		$query = "delete from messages where id in ($message_ids)";
		

	
		$result = mysql_query($query) or die($query);

		
		$response = array();
		if ($result == TRUE) {
			
			$response["success"] = 1;
		}
		else {
			$response["success"] = 0;
    		$response["error"] = "Fail in delete";
		}
		header('content-type: application/json;');

		
		$objJson = json_encode($response);
		echo  $objJson;
		
		
	}
?>