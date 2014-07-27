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




<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $_SESSION['hdr'] ?></title>
<LINK REL="SHORTCUT ICON" HREF="logo.ico" />
<script type="text/javascript" src="admin_ldlst.js"></script>
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
			   <a  class="tabs active" href="admin_sectent.php"> &nbsp; Add Section &nbsp; </a> 
			 <a  class="tabs inactive" href="admin_student.php"> &nbsp; Add Student &nbsp; </a> 
			 <a class="tabs inactive" href="admin_facent.php"> &nbsp;  Add Faculty &nbsp; </a>
			   <a  class="tabs inactive" href="admin_facallot.php"> &nbsp; Faculty Allotment &nbsp; </a> 
			
			
		</div> 
		
		<div id="content">
		
			<h1 class="caption">Add Students </h1>
			
			<form name="form1" method="post" action="admin_campupd.php?cat=sect">
			<table>
				
				<tr>
					<th>
					Program 
					</th>
					
					<td>
					
					<select name="lst_prog" id="lst_prog" onchange="load_lst(this)">
					
					<option value="select" selected>select</option>
					<?php
					
					while($row = mysql_fetch_array($result))
					{
						$prog_id = $row['prog_id'];
						$prog_name = $row['name'];
						
						echo "<option value='$prog_id'>$prog_name</option>";
					
					}
		
					
					?>
					
					</select>
					
					</td>
				</tr>
				
				<tr>
					<th>
					Batch
					</th>
					<td>
					<select name="lst_batch" id="lst_batch">
					
					</select>
					</td>	
				</tr>
				
				
				<tr>
					<th>
					Section
					</th>
					
					<td>
					
					<TEXTAREA  ID="txtSect" NAME="txtVal" ROWS=10 COLS=40 > </textarea>
					
					
					
					</td>	
				</tr>
								
				<tr>
					<td>
					</td>
					<td>
						<input type="submit" value="Submit">
					</td>
				</tr>
				
								
			</table>
			
			
			</form>
		
				
				
				
				
			

		
		</div>

	</div>
</body>
</html>
