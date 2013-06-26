<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Test Inbox</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<?php include("header.php");?>
    
    <div id="main-container">
    	
        	<form class="lsform" method="post" action="getNotification.php">
            	<h2>Get Inbox</h2>
                <div class="form_row">
                	<label class="left_long">Registration Id</label>
                    <textarea class="form_input" name="reg_id" id="reg_id"></textarea>
               	</div> 
                <div style="clear:both"></div>
 	      		<div class="form_row">
                   	<label class="left_long">&nbsp;</label>
                 	<input type="submit" id="tn_get" name="tn_get" value="Get" class="form_submit">
                 </div>               
            </form>      
    </div>
    
    <?php include("footer.php");?>
</body>
</html>