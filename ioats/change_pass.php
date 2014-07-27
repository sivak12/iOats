<?php
session_start();
if(!session_is_registered("uname"))
{
header("location:index.php");
} 


$strAction = $_GET['details'];
if ($strAction == 'check') {
 change_pass();
}

function change_pass()
 {
 	global $Err;
	$_SESSION['change_pass']=0;
	$uname=$_SESSION['uname'];
	
	$curr_pass=$_POST['txtCurPass'];
	$new_pass=$_POST['txtNewPass'];
	$con_pass=$_POST['txtConPass'];
	
	$con = mysql_connect("localhost","root","");
	if (!$con)
  	{
  		die('Could not connect: ' . mysql_error());
  	}
  
 	mysql_select_db("oats_p3", $con);
	
	
	$role = $_SESSION['user_role'];
	
	switch($role)
	{
		case "admin":
					$tb_login = "admin_det";
					$usr_id = $_SESSION['admin_id'];
					$field = "admin_id";
					break;
		case "faculty":
					$tb_login = "faculty_det";
					$field = "fac_id";
					$usr_id = $_SESSION['fac_id'];
					break;
		case "student":
					$tb_login = "student_det";
					$field = "stud_id";
					$usr_id = $_SESSION['stud_id'];
					break;
	}
	$result_name=mysql_query("SELECT * FROM $tb_login WHERE $field='$usr_id'");
	$row=mysql_fetch_array($result_name);
	
	
	if($curr_pass==$row['password'])
	{
		
		if($new_pass==$con_pass)
		{
			$up_result=mysql_query("UPDATE $tb_login  SET password='$new_pass' WHERE name= '$uname'");
			$_SESSION['change_pass']=1;
			header("location:change_success.php");
		}
		 
		 else
		 {
		   $Err="mismatch";
		  }
	}
	
	else
	{
		$Err="wpass";
			   	
	}
 }	
	
?>


<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="change_pass.js"></script>
<title><?php echo $_SESSION['hdr'] ?></title>
<LINK REL="SHORTCUT ICON" HREF="logo.ico" />
<link type="text/css" rel="stylesheet" href="oats_p3.css" /> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

<div id="all">


		<div id="header">
			<h1 class="no_br"><?php 
			echo $_SESSION['hdr']."  <span id='ver'>Beta</span>"; 
			echo "<br><span id='sub_hdr'>ISBR Online Analysis & Testing System </span>";?></h1>
			
			<!--<h1 class="caption"> Questionnaire</h1>	-->
		</div>
		
		<div id="navigation">
			<p id="status"> <?php echo $_SESSION['uname']; ?> &nbsp;,  <a href="logout.php" id="logout" > logout</a> </p>
			
		</div> 
		
		<div id="content">
		
				
			<h1 class="caption">Change Password </h1>

			<form name="change" action="change_pass.php?details=check" method="post">
			
			
			
			
			<table>
				<tr>
					<th>
						Current password:
					</th>
				
					<td>
						<input name="txtCurPass" type="password" size="25">
					</td>
				</tr>
					
				<tr>
					<th>
						<?php
						 if ($Err=="wpass") 
	     				 { 
		  			   
							echo "<i>* The password you typed is incorrect</i>";
		  				}
		 					?> 
					</th>
				</tr>
				
					
				
				<tr>
					<th>
						New password:
					</th>
				
					<td>
						<input name="txtNewPass" type="password" size="25">
					</td>
				</tr>
				
				<tr>
					<th>
						Confirm Password:
					</th>
				
					<td>
						<input name="txtConPass" type="password" size="25">
					</td>
				</tr>
				<tr>
					<th>
						<?php 
						if ($Err=="mismatch") 
	     				{ 
		     
							echo "<i>* Passwords don't match</i>";
		  				}
		 				?> 
					
					</th>
				
				
				</tr>
			
				<tr>
					<th>
					</th>
				
					<th>
						<input value="Change Password" type="submit">
					</th>
				</tr>
			
			
			</table> 
			</form>



</body>

</html>
