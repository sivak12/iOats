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

$respondent=$_SESSION['uname'];
$stud_id = $_SESSION['stud_id'];

$stud_report = $stud_id."_report";
$sql = "SELECT * FROM $stud_report order by taken_on DESC";
$retid = mysql_db_query("oats_p3", $sql, $con);
if (!$retid) { echo( mysql_error()); }

?> 




<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
			<p id="chpass"><a href="change_pass.php" >change password</a></p>
			 <a  class="tabs inactive" href="view_student.php"> &nbsp; Tests &nbsp; </a> 
			 <a class="tabs active" href="view_studview.php"> &nbsp;  Results &nbsp; </a>
			 
			
			
		</div> 
		
		<div id="content">
		
			<h1 class="caption">Tests </h1>
			
			<table>
			
				<tr>
					<th>
						Test
					</th>
					<th>
						Taken On
					</th>
					<th>
						Total Qns
					</th>
					<th>
						Attempted
					</th>
					
					<th>
						Correct
					</th>
				</tr>
				
				
				
				<?php 
					while($row=mysql_fetch_array($retid)) 
					{
					
						echo " 
						<tr>
						
							<td>
									".$row['qnr_name']."
							</td>
							
							<td>
								".$row['taken_on']."
							</td>
							
							<td>
								".$row['qn_count']."
							</td>
							
							<td>
								".$row['att_count']."
							</td>
							
							<td>
								".$row['corr_count']."
							</td>
						</tr> ";
					}
						
					?>
					
								           

			</table>
		</div>

	</div>
</body>
</html>
