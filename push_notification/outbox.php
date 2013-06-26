<?php
	session_start();
	require_once 'config.php';
	if(!isset($_SESSION['id'])){
		header("location:" . SITE_URL);
	}
	
	
	
	$client_id = $_SESSION['id'];
	
	include_once './db_connect.php';
		
	$db = new DB_Connect();
    $db->connect();
	
	if(isset($_GET['d_id'])) {
		$message_id = $_GET['d_id'];
		$query = "DELETE FROM client_outbox WHERE message_id = '$message_id'";
		mysql_query($query) or die($query);
	}
	
	if(isset($_POST['delete'])) {
		$messages = implode(",",$_POST['messages']);
		$query = "DELETE FROM client_outbox WHERE message_id IN($messages)";
		mysql_query($query) or die($query);
	}
	
	$clink = "outbox.php?";
	$dlink = "outbox.php?";
	if(!isset($_GET['page']))
		$page=1;
	else {
		$page=$_GET['page'];
		$clink = "outbox.php?page=" . $page;
		$dlink = $clink . "&";
	}
	
	$itemsperpage = 2;
	$startindex=($page-1)*$itemsperpage;
	$query = "SELECT messages.* FROM client_outbox, messages WHERE client_id = '$client_id' and client_outbox.message_id=messages.id ORDER BY messages.date DESC";
	
	$link = "outbox.php?page=";
	
	
	
	$result=mysql_query($query) or die($query);
	$totalitems = mysql_num_rows($result);
	$totalpages = ceil($totalitems/$itemsperpage);
	
	$query .= " LIMIT $startindex,$itemsperpage";	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Out Box</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="text/javascript">
		function checkBoxes()
		{
			for (var i=0; i < document.frm.elements.length; i++) {
				if (document.frm.elements[i].type == 'checkbox' && document.frm.elements[i].name == 'messages[]')
					document.frm.elements[i].checked = document.frm.chkAll.checked;
				}
		}
		function submitForm()
		{
			var flag = 0;
			for (var i=0; i < document.frm.elements.length; i++) 
			{
				if (document.frm.elements[i].type == 'checkbox' && 
					document.frm.elements[i].name == 'messages[]' && 
					document.frm.elements[i].checked == true )
				{
					flag = 1;
					break;
				}
			}	
			if(flag == 1)
			{
				var msg = "Are you sure to delete these user?\nIt will delete permanantly.";
				if(confirm(msg))
					return true;
				
			}
			return false;
		}
	</script>
</head>

<body>
	<?php include("header.php");?>
    
    <div id="main-container">
    	
        	<h2>Outbox</h2>
            <?php if($totalitems!= 0) {?>
            <form name="frm" method="post" action="<?php echo $clink;?>">
        		<div id="tbl">
            
        			<table>
            			<tr>
                			<th  width="50px"><input type='checkbox' value='$id' name='chkAll'  onclick="checkBoxes()"/></th>
                			<th>Subject</th>
                    		<th  width="125px">Date</th>
                    		<th  width="80px">Delete</th>
                    		<th  width="80px">Resend</th>
            			</tr>
            		<?php 
						$result2 = mysql_query($query) or die($query);	
						while($row = mysql_fetch_array($result2)) {
							$mid = $row['id'];
							$date = strtotime($row['date']);
							$fdate = date("Y-M-d", $date);
							$cdate = date("Y-M-d");
							if($fdate == $cdate)
								$fdate =  date("H:i", $date);
					?>
            			<tr>
                			<td><input type='checkbox' value="<?php echo $mid; ?>" name='messages[]'/></td>
                			<td ><?php echo $row['subject']; ?></td>
             		       	<td width="125px"><?php echo $fdate; ?></td>
                    		<td width="80px">
								<a href="<?php echo $dlink . "d_id=" . $mid; ?>" title="delete">
									Delete
								</a>
							</td>
                     		<td>
								<a href="sendNotification.php?m_id=<?php echo $mid; ?>" title="resend">
									Resend
								</a>
							</td>
                		</tr>
            		<?php
						}
					?>
            		</table> 
                    </div> 
                    <br/>
                    <div style="float:right;margin-right: 33px;">
						<input class="form_submit" type="submit" value="Delete" name="delete" onclick="return submitForm()" />
					</div>
                    <div style="clear:both;"></div>
					<br />
                <?php
					if($totalpages>=1)
					{
						if($totalpages<=5)
						{
							$start = 1;
							$end = $totalpages;
						}
						else
						{
							if($page == 1 || $page == 2)
							{
								$start = 1;
								$end = 5;
							}
							else if($page == $totalpages || $page == $totalpages-1)
							{
								$start = $totalpages-4;
								$end = $totalpages;
							}
							else
							{
								$start = $page-2;
								$end = $page+2;
							}
						}
						echo "<div class='paging' style='margin-left:200px;'>";
						echo "Page $page of $totalpages";
						echo "<div class='pages'>";
						if($page!=1)
						{
							
							$prev = $page-1;
							$hlink = $link . $prev;
							echo "<a href='$hlink' class='prevp'>Prev</a>"; 
						}
						for($i=$start;$i<=$end;$i++)
						{
							$hlink = $link . $i;
							if($page!=$i)
								echo "<a href='$hlink'>$i</a>";	
							else
								echo "&nbsp;$i&nbsp;";
						}
						if($page!=$totalpages)
						{
							$next = $page+1;
							$hlink = $link . $next;
							echo "<a class='nextp' href='$hlink'>Next</a>";						
						}
						echo "&nbsp;&nbsp;";
						echo "</div></div>";
					}
				?>
           		
                
          	 </form>
             <?php } else {?>
             	<h2>Outbox is empty</h2>
             <?php } ?>
    	</div>
    
    <?php include("footer.php");?>
</body>
</html>