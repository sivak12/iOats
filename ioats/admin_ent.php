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

$sql = "SELECT * FROM `tb_qnr` order by created_on DESC";

$retid = mysql_db_query("oats_p3", $sql, $con);
if (!$retid) { echo( mysql_error()); }

?> 




<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
<link type="text/css" rel="stylesheet" href="oats_p3.css" /> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
	
	<div id="all">
		
		<div id="header">
			<h1 class="no_br">Online Tests </h1>
			
			<!--<h1 class="caption"> Questionnaire</h1>	-->
		</div>
		
		<div id="navigation">
			<p id="status"> <?php echo $_SESSION['uname']; ?> &nbsp;,  <a href="logout.php" id="logout" > logout</a> </p>
			<p id="chpass"><a href="change_pass.php" >change password</a></p>
			 <a  class="tabs active" href="view_student.php"> &nbsp; Admin &nbsp; </a> 
			 <a class="tabs inactive" href="view_studview.php"> &nbsp;  Results &nbsp; </a>
			 
			
			
		</div> 
		
		<div id="content">
		
			<h1 class="caption">Add Students </h1>
			
			
			<table>
				
				<tr>
					<th>
					Program
					</th>
					<td>
					<select name="lst_prog" id="lst_prog" onchange="load_lst(1)">
					</td>
				</tr>
				
				<tr>
					<th>
					Batch
					</th>
					<td>
					<select name="lst_batch" id="lst_batch" onchange="load_lst(2)">
					</td>	
				</tr>
				
				
				<tr>
					<th>
					Section
					</th>
					<td>
					<select name="lst_sect" id="lst_sect" onchange="load_lst(3)">
					
					</td>	
				</tr>
				
				
			</table>
			
			<!--<table>
			
				<tr>
					<th>
						Test
					</th>
					<th>
						Created By
					</th>
					<th>
						Created On
					</th>
					<th>
						Responses
					</th>
				</tr> -->
				
				
				
				
				
				<?php 
					
					/*while($row=mysql_fetch_array($retid)) 
					{
					//$_SESSION['qnr_id']=$row['sno'];
					
					$respondent=$_SESSION['uname'];
						$table_report="tb_qnr".$row['sno']."_report";

						$result=mysql_query("SELECT * FROM $table_report WHERE respondent='$respondent'");
						$count=mysql_num_rows($result);

					
							
							    if($count==0) 
								{
									echo "
									<tr>
							
										<td>";
									
									
									
									echo "<a href=\"ans_ent.php?id=" . $row["sno"] . "\" target=\"_self\" >"
									
									.$row['name']
									."</a>";
									
									
								
									echo"</td>
							
									<td>".
										$row['created_by']
									."</td>
									
									<td>".
										$row['created_on']
									."</td>
									
									<td>".
										$row['response']
									."</td>
								
								</tr>";
							}
	
					}
				*/?>           

		
		</div>

	</div>
</body>
</html>
