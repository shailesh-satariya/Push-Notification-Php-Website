<?php

class DB_Functions {

    private $db;

    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $gcm_regid) {
		$sresult = mysql_query("SELECT * FROM gcm_users WHERE gcm_regid='$gcm_regid'");
		if(mysql_num_rows($sresult) > 0)
		{
			$row = mysql_fetch_array($sresult);
			$user_id = $row['id'];
			mysql_query("DELETE FROM user_inbox WHERE user_id = '$user_id'") or die(mysql_error());
			mysql_query("DELETE FROM gcm_users WHERE gcm_regid='$gcm_regid'")or die(mysql_error());
		}
		
		
        // insert user into database
        $iresult = mysql_query("INSERT INTO gcm_users(name, email, gcm_regid, created_at) VALUES('$name', '$email', '$gcm_regid', NOW())");
        // check for successful store
        if ($iresult) {
           	// get user details
           	$id = mysql_insert_id(); // last inserted id
           	$sresult2= mysql_query("SELECT * FROM gcm_users WHERE id = $id") or die(mysql_error());
           	// return user details
           	if (mysql_num_rows($sresult2) > 0) {
               	return mysql_fetch_array($sresult2);
           	} else {
               	return false;
           	}
       	} else {
           	return false;
       	}
		
    }


	 /**
     * Get user by email and password
     */
    public function sendFirstMessage($gcm_regid) {
		$date = date('Y-m-d H:i:s');
        $result = mysql_query("INSERT INTO messages(subject,message,date) VALUES('Welcome to Push Notification','Enjoy Push Notification','$date')") or die("Could not execute the query1");
		if ($result) {
           	// get user details
           	$message_id = mysql_insert_id(); 
			$sresult = mysql_query("SELECT * FROM gcm_users WHERE gcm_regid='$gcm_regid'");
			$row = mysql_fetch_array($sresult);
			$user_id = $row['id'];
			mysql_query("INSERT INTO user_inbox(message_id,user_id) VALUES('$message_id','$user_id')") or die("Could not execute the query2");
			mysql_query("INSERT INTO client_outbox(message_id,client_id) VALUES('$message_id','20')") or die("Could not execute the query2");
			
           	$message = array("price" => "Welcome to Push Notification");
       	} else {
			return false;
		}
    }

    /**
     * Get user by email and password
     */
    public function getUserByEmail($email) {
        $result = mysql_query("SELECT * FROM gcm_users WHERE email = '$email' LIMIT 1");
        return $result;
    }

    /**
     * Getting all users
     */
    public function getAllUsers() {
        $result = mysql_query("select * FROM gcm_users");
        return $result;
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $result = mysql_query("SELECT email from gcm_users WHERE email = '$email'");
        $no_of_rows = mysql_num_rows($result);
        if ($no_of_rows > 0) {
            // user existed
            return true;
        } else {
            // user not existed
            return false;
        }
    }

}

?>