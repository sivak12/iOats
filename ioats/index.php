<?php
header("Cache-control: private, no-cache");
header("Expires: Mon, 26 Jun 1997 05:00:00 GMT");
header("Pragma: no-cache");

session_start();
session_destroy();
session_start();
$strAction = $_GET['Action'];
if (strtoupper($strAction) == 'LOGIN') {
 login_check();
}

$_SESSION['hdr'] = "I - OATS";

function login_check() 
{
 
 global $uname, $Err;
 $uname = $_POST['txtName'];
 $pword = $_POST['txtPass'];
 
$uname = stripslashes($uname);
$pword = stripslashes($pword);
$uname = mysql_real_escape_string($uname);
$pword = mysql_real_escape_string($pword);

//connecting to the
 $con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
  
 mysql_select_db("oats_p3", $con);

if($uname == "admin")
{
	$sql = "SELECT * FROM `admin_det` WHERE password='$pword'";
	$retid = mysql_db_query("oats_p3", $sql, $con);	
	$count=mysql_num_rows($retid);
	if($count == 1)
	{ 
			$role = "admin";
			
			$row=mysql_fetch_array($retid);
			session_register("uname");
			session_register("pword");
			$_SESSION['uname']=$row['name'];
			$_SESSION['user_role']="admin";
			$_SESSION['admin_id'] = $row['admin_id']; 
			mysql_close($con);
			header("location:admin_progent.php");
	
	}
	else 
	{
		  // Invalid Login
		  
		 $Err = true;
		  return false;
	}
	
	
	

}

else
{

 
		$sql = "SELECT * FROM `faculty_det` WHERE email='$uname' and password='$pword'";
		$retid = mysql_db_query("oats_p3", $sql, $con);
		$count=mysql_num_rows($retid);
		$role = "";
		
		if($count == 1)
		{ 
			$role = "faculty";
		}
		else
		{
			$sql="SELECT * FROM `student_det` WHERE email='$uname' and password='$pword'";
			$retid = mysql_db_query("oats_p3", $sql, $con);
			$count=mysql_num_rows($retid);
			
			if($count == 1)
				$role = "student";
		}
		
		if($role != "")
		{
			if($role == "faculty")
			{
				$row=mysql_fetch_array($retid);
				session_register("uname");
				session_register("pword");
				$_SESSION['uname']=$row['name'];
				$_SESSION['user_role']="faculty";
				$_SESSION['fac_id'] = $row['fac_id']; 
				mysql_close($con);
				header("location:view_facview.php");
			}
			else
			{
				$row=mysql_fetch_array($retid);
				session_register("uname");
				session_register("pword");
				$_SESSION['uname']=$row['name'];
				$_SESSION['user_role']="student";
				$_SESSION['stud_id'] = $row['stud_id']; 
				$_SESSION['sect_id'] = $row['sect_id'];
				mysql_close($con);
				header("location:view_student.php");
			}
		}
		
		
		else 
		{
		  // Invalid Login
		  
		  $Err = true;
		  return false;
		 }

}
} 
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<LINK REL="SHORTCUT ICON" HREF="logo.ico" />
<script type="text/javascript" src="login_check.js"></script>
<title><?php echo $_SESSION['hdr'] ?></title>
<link type="text/css" rel="stylesheet" href="oats_p3.css" /> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

</head>

<body>

	<div id="all">
		
		<div id="header">
			
			<h1 class="no_br"><?php 
			echo $_SESSION['hdr']."  <span id='ver'>Beta</span>"; 
			echo "<br><span id='sub_hdr'>ISBR Online Analysis & Testing System </span>";?></h1>	
			<!--<h1 class="caption"> Questionnaire</h1>-->
		</div>
		
		<!--<div id="navigation">
			<p id="status"> new user? &nbsp;<a href="register.php">register </a> </p>
		</div>--> 
		
		<div id="login">
			<h1 class="caption">Login  </h1>
			
			<FORM NAME="Login" ACTION="index.php?Action=Login" METHOD=POST>
			<table>
				
				<tr>
					<th>
						Username:	
					</th>
					<td>
						<INPUT ID="name" TYPE="TEXT" NAME="txtName" VALUE="" SIZE="30" />
					</td>
				</tr>
					<th>
						Password:
					</th>
					<td>
						<INPUT ID="password" TYPE="PASSWORD" NAME="txtPass" VALUE="" SIZE="30" />
					</td>
				<tr>
					<th>
					</th>
					<td>
						<input type="submit" value="Login" />
					</td>
					
				</tr>
			
			</table>
		
		
		</form>
		
		</div>
		
		<div id="footer">
				  <p><?php if ($Err) { ?>
			<div align="center"><label><p><b>Wrong Username/password.Try again.</b></p></label></div>
		<?php } ?></p>
		</div>
	</div> 

</body>

</html>
