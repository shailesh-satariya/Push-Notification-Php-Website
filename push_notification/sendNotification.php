<?php
	session_start();
	require_once 'config.php';
	if(!isset($_SESSION['id'])){
		header("location:" . SITE_URL);
	}
	if (isset($_POST["sn_send"])) {
		
		$subject = $_POST["sn_subject"];
  		$message = $_POST["sn_text"];
    
   	 	include_once './GCM.php';
    
    	$gcm = new GCM();
		
		include_once './db_connect.php';
		
		$db = new DB_Connect();
        $db->connect();

		
		$date = date('Y-m-d H:i:s');
		mysql_query("INSERT INTO messages(subject,message,date) VALUES('$subject','$message','$date')") or die("Could not execute the query1");

		$result = mysql_query("SELECT MAX(id) FROM messages");
		$row = mysql_fetch_array($result);		
		$message_id = $row['MAX(id)'];
		
		
    	$message_array = array("message" => $message);
		
		$receivers = "";
		
		$result = mysql_query("SELECT * FROM gcm_users");

		while($row = mysql_fetch_array($result))
  		{
			$user_id = $row['id'];
			

			$registatoin_ids = array($row['gcm_regid']);
			$jsonop = $gcm->send_notification($registatoin_ids, $message_array);
			
			$r = json_decode($jsonop,true);
			if($r['failure'] == 1 && $r['results'][0]['error'] == "NotRegistered" ) {
				mysql_query("DELETE FROM user_inbox WHERE user_id = '$user_id'") or die("DELETE FROM user_inbox WHERE user_id = '$user_id'");
				mysql_query("DELETE FROM gcm_users WHERE id = '$user_id'")or die("DELETE FROM user_inbox WHERE user_id = '$user_id'");
			}
			else {
				mysql_query("INSERT INTO user_inbox(message_id,user_id) VALUES('$message_id','$user_id')") or die("Could not execute the query2");
			}
		}
		$client_id = $_SESSION['id'];
		mysql_query("INSERT INTO client_outbox(message_id,client_id) VALUES('$message_id','$client_id')") or die("Could not execute the query3");
	}
	$snUrl = SITE_URL . "sendNotification.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Send Notification</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript">
	
		function submitForm()
		{
			var subject = document.getElementById('sn_subject').value;
			var message = document.getElementById('sn_text').value;
			subject = subject.replace(/^\s+|\s+$/g,"");
			message = message.replace(/^\s+|\s+$/g,"");
			
			
			if(subject == "" || message == "") {
				alert('Enter Proper Data.');
				return false;
			}
			return true;
		}
	</script>
</head>

<body>
	<?php include("header.php");?>
    
    <div id="main-container">
    	
        	<form class="lsform" method="post" action="<?php echo $snUrl;?>" name="frm">
            	<h2>Send Notification</h2>
                <?php 
					$subject = "";
					$message = "";
					if(isset($_GET['m_id'])){
						$m_id = $_GET['m_id'];
						$client_id = $_SESSION['id'];
						if (!isset($_POST["sn_send"])) {
							include_once './GCM.php';
    
    						$gcm = new GCM();
		
							include_once './db_connect.php';
			
							$db = new DB_Connect();
        					$db->connect();
						}
						
						$query = "SELECT messages.* FROM client_outbox, messages WHERE client_id='$client_id' AND client_outbox.message_id=messages.id AND messages.id='$m_id'";
						$result = mysql_query($query) or die($query);
						
						
						
						if(mysql_num_rows($result) > 0) {
							$row = mysql_fetch_array($result);
							$subject = $row['subject'];
							$message = $row['message'];
						}
					}
				?>
                <div class="form_row">
                	<label class="left_long">Subject</label>
                    <input type="text" class="form_input" name="sn_subject" id="sn_subject" value="<?php echo $subject;?>"/>
               	</div> 
                <div style="clear:both"></div>
          	    <div class="form_row">
                   	<label class="left_long">Message</label>
               	   	<textarea class="form_input" name="sn_text" id="sn_text"><?php echo $message;?></textarea>
               	</div>
                <div style="clear:both"></div>
 	      		<div class="form_row">
                   	<label class="left_long">&nbsp;</label>
                 	<input type="submit" id="sn_send" name="sn_send" value="Send" class="form_submit" onclick="return submitForm()">
                 </div>               
            </form>      
    </div>
    
    <?php include("footer.php");?>
</body>
</html>