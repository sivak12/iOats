<?php
session_start();
if(!session_is_registered("uname"))
{
header("location:../index.php");
}


$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("oats_p3", $con);

$query = "SELECT * FROM program";

$result = mysql_query($query);
//if (!$retid) { echo( mysql_error()); }

?> 





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $_SESSION['hdr'] ?></title>
<LINK REL="SHORTCUT ICON" HREF="logo.ico" />
<script type="text/javascript" src="admin_student.js"></script>
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
			<p id="chpass"><a href="change_pass.php" >change password</a></p>
			 <a  class="tabs inactive" href="admin_progent.php"> &nbsp; Add Program &nbsp; </a> 
			 <a  class="tabs inactive" href="admin_batchent.php"> &nbsp; Add Batch &nbsp; </a> 
			  <a  class="tabs inactive" href="admin_sectent.php"> &nbsp; Add Section &nbsp; </a> 
			 <a  class="tabs inactive" href="admin_student.php"> &nbsp; Add Student &nbsp; </a> 
			 <a class="tabs active" href="admin_facent.php"> &nbsp;  Add Faculty &nbsp; </a>
			   <a  class="tabs inactive" href="admin_facallot.php"> &nbsp; Faculty Allotment &nbsp; </a> 
			
			
		</div> 
		
		<div id="content">
		
			<h1 class="caption">Add faculty </h1>
			
			<form  enctype="multipart/form-data"
               name="form1" method="post" action="get_facupfile.php">
			
			<table>
			<tr>
				<th>
				Faulty file
				</th>
				<td>
				<input type="file" name="file" id="file"/>
				</td>
			</tr>
			<tr>
				<th>
				</th>
				<td>
				<input type="submit" value="Upload" />
				</td>
			</tr>			
			
			</table>
			</form>
				
				
					
		</div>

	</div>
</body>
</html>
