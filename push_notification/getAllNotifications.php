<?php
	if (isset( $_REQUEST['reg_id'])) {
		
		$response = array();
		$start = 0;
		$end = 7;
		
		
		include_once './db_connect.php';
		
		$db = new DB_Connect();
    	$db->connect();
	
		$reg_id = $_REQUEST['reg_id'];
		
		$order = "DESC";
		
		$limit_statement = "limit $start, $end";
	
		$query = "SELECT messages.id AS 'id', clients.display_name AS 'from',clients.email AS 'email', messages.subject 'subject', messages.message AS 'message', messages.date AS 'date' FROM gcm_users, user_inbox, client_outbox, messages, clients WHERE gcm_users.gcm_regid = '$reg_id' AND user_inbox.user_id = gcm_users.id AND user_inbox.message_id = messages.id AND messages.id = client_outbox.message_id
AND client_outbox.client_id = clients.id";

		if (isset( $_REQUEST['max_id'])) {
			$max_id = $_REQUEST['max_id'];
			$query .= " AND messages.id > '$max_id'";
		}
		
		
		if (isset($_REQUEST['min_id'])) {
			$min_id = $_REQUEST['min_id'];
			$query .= " AND messages.id < '$min_id'";
		}
		
		if (isset( $_REQUEST['order'])) {
			$order = $_REQUEST['order'];
			$limit_statement = "";
		}
			
		$query .= " ORDER BY messages.id $order $limit_statement";	
		
		//echo $query;
	
		$result = mysql_query($query) or die($query);

		
		$response = array();
		if (mysql_num_rows($result) > 0) {
			
   			while($r = mysql_fetch_assoc($result)) {
				$response["messages"][] = $r;
   			}
			$response["success"] = 1;
		}
		else {
			$response["success"] = 0;
    		$response["error"] = "No more notificatioons found";
		}
		header('content-type: application/json;');

		
		$objJson = json_encode($response);
		echo  $objJson;
		
		
	}
?>