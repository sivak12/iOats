<?php
session_start();
if(!session_is_registered("uname"))
{
header("location:../index.php");

}



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
			<h1 class="no_br">Online Exam</h1>	
		</div>
		
		<div id="navigation">
			<p id="status"> <?php echo $_SESSION['uname']; ?> &nbsp;, <a href="logout.php"> logout</a> </p>
			 <p id="chpass"><a href="change_pass.php" > change password</a></p>
			 <a  class="tabs active" href="view_facview.php"> &nbsp; Results &nbsp; </a> 
			 <a class="tabs inactive" href="que_create.php"> &nbsp;  Create &nbsp;	</a>
			
			
		</div> 
		
		<div id="content">
		
			<h1 class="caption">Feedback </h1>




<table>
			
				<tr>
					<th>
						Student
					</th>
					<th>
						Taken on
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
					$con = mysql_connect("localhost","root","");
					if (!$con)
					  {
					  die('Could not connect: ' . mysql_error());
					  }
					mysql_select_db("oats_p3", $con);
					
					$created_by=$_SESSION['uname'];
					$qnr_no = $_GET['id'];
					
					$tb_report = "tb_qnr."$qnr_no."_report";
					
					$sql = "SELECT * FROM $tb_report";
					
					$retid = mysql_query($sql);
					//if (!$retid) { echo( mysql_error()); }

								
				
					while($row=mysql_fetch_array($retid)) 
					{
					//$_SESSION['qnr_id']=$row['sno'];
						echo "
						<tr>
						
							<td>
								".$row['respondent']."
							</td>
							
														
							<td>".
								$row['taken_on']
							."</td>
							
							<td>".
								$row['qn_count']
							."</td>
							
							<td>".
								$row['att_count']
							."</td>
							
							<td>".
								$row['corr_count']
							."</td>
						
						</tr>";
	
	
					}
				
				mysql_close($con);
				?>           

			</table>
			
			
			
		</div>

	</div>




</body>
</html>
