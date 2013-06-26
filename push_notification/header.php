	<div id="userbar">
    <div id="userlinks" class="usercommon">
    </div>
     <?php
		if(isset($_SESSION['id'])){
	?>
    <div id="userinfo" class="usercommon">
    	<?php echo $_SESSION['display_name']; ?> |
        <a href="logout.php">Log Out</a>
    </div>
    <?php
		}
	?>
    </div>
    
    <div id="header">
    	<div id="header-content">
        	<div id="header-logo">
            	<h1><a href="index.php">Push Notification</a></h1>
            </div>	
            <ul id="topnav">
            	<?php
    				if(isset($_SESSION['id'])){
				?>
                <li><a href="sendNotification.php">Send Notification</a></li>
                <li><a href="outbox.php">Outbox</a></li>
				<?php
					}
				?>
				<li><a href="download.php">Download</a></li>
				<li><a href="">About Us</a></li>
			</ul>
    	</div>
    </div>