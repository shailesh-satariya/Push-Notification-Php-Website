<?php
	session_start();
	require_once 'config.php';
	if(isset($_SESSION['id'])){
		$url= SITE_URL . "/push_notification/sendNotification.php";;
		header("location:$url");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Log In | Push Notification Demo</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<?php include("header.php");?>
    
    <div id="main-container">
    	<?php
			$su_first_name =  "";
			$su_last_name =  "";
			$su_email =  "";
			$su_display_name = ""; 
			$li_email = "";
			if(isset($_SESSION['error']))
			{
				if(isset($_SESSION['su_values']))
				{				
					$su_values = $_SESSION['su_values'];
					$su_first_name =  $su_values['su_first_name'];
					$su_last_name =  $su_values['su_last_name'];
					$su_email =  $su_values['su_email'];
					$su_display_name = $su_values['su_display_name'];
					unset($_SESSION['su_values']);
				}
				if(isset($_SESSION['li_values']))
				{				
					$li_values = $_SESSION['li_values'];
					$li_email =  $li_values['li_email'];
					unset($_SESSION['li_values']);
				}
		?>
		<div class="ls-message error">
			<p class="title">
				<span class="ls-icon icon-error"></span>
				<strong>The following error(s) occurred:</strong>
			</p>
			<?php
				$error = $_SESSION['error'];;
				unset($_SESSION['error']);
				foreach($error as $value)
				{
			?>
			<ul>
				<li><?php echo $value;?></li>
			</ul>
			<?php
				}
			?>
		</div>
		<?php
			}
		?>
    	<div class="login-section">
        	<form class="lsform" method="post" action="processLogin.php">
            	<h2>Log In</h2>
                <div class="form_row">
                	<label class="left_long">Email</label>
                    <input type="text" class="form_input" name="li_email" id="li_email" value="<?php echo $li_email;?>"/>
               	</div> 
          	    <div class="form_row">
                   	<label class="left_long">Password</label>
               	   	<input type="password" class="form_input" name="li_password" id="li_password"/>
               	</div>
               	<div class="form_row">
                   	<label class="left_long">&nbsp;</label>
                    <input type="checkbox" class="form_checkbox" name="remember_me" id="remember_me"/>
                   	<label class="l" for="remember_me">&nbsp;Remember Me</label>
              	</div>
                <div style="clear:both"></div>
 	      		<div class="form_row">
                   	<label class="left_long">&nbsp;</label>
                 	<input type="submit" id="li_submit" name="li_submit" value="Log In" class="form_submit">
                 </div>               
            </form>
             <div style="clear:both"></div>
             <br>
             <br>
             <br>
            <form class="lsform">
            	<h2>Forgot Password</h2>
                <div class="form_row">
                	<label class="left_long">Email</label>
                    <input type="text" class="form_input" name="fp_email" id="fp_email"/>
               	</div> 
 	      		<div class="form_row">
                   	<label class="left_long">&nbsp;</label>
                 	<input type="submit" id="fp_submit" name="fp_submit" value="Submit" class="form_submit">
                 </div>               
            </form>
    	</div>
        <div class="signup-section">
        	<form class="lsform" method="post" action="processRegistration.php">
            	<h2>Sign Up</h2>
				<div class="form_row">
                	<label class="left_long">First Name</label>
                    <input type="text" class="form_input" name="su_first_name" id="su_first_name" value="<?php echo $su_first_name;?>"/>
               	</div> 
                <div class="form_row">
                	<label class="left_long">Last Name</label>
                    <input type="text" class="form_input" name="su_last_name" id="su_last_name" value="<?php echo $su_last_name;?>"/>
               	</div>              
                <div class="form_row">
                	<label class="left_long">Email</label>
                    <input type="text" class="form_input" name="su_email" id="su_email" value="<?php echo $su_email;?>"/>
               	</div> 
          	    <div class="form_row">
                   	<label class="left_long">Password</label>
               	   	<input type="password" class="form_input" name="su_password" id="su_password"/>
               	</div>
                <div class="form_row">
                   	<label class="left_long">Confirm Password</label>
               	   	<input type="password" class="form_input" name="su_confrim_password" id="su_confirm_password"/>
               	</div>
                <div class="form_row">
                   	<label class="left_long">Display Name</label>
               	   	<input type="text" class="form_input" name="su_display_name" id="su_display_name" value="<?php echo $su_display_name;?>"/>
               	</div>
                <div style="clear:both"></div>
 	      		<div class="form_row">
                   	<label class="left_long">&nbsp;</label>
                 	<input type="submit" id="su_submit" name="su_submit" value="Sign Up" class="form_submit">
                 </div>               
            </form>
    	</div>
    </div>
    
    <?php include("footer.php");?>
</body>
</html>