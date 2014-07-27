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
<title><?php echo $_SESSION['hdr'] ?></title>
<LINK REL="SHORTCUT ICON" HREF="logo.ico" />

<script type="text/javascript" src="facreport.js"></script>
<link type="text/css" rel="stylesheet" href="oats_p3.css" />

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>

	<div id="all">
		
		<div id="header">
			<h1 class="no_br"><?php 
			echo $_SESSION['hdr']."  <span id='ver'>Beta</span>"; 
			echo "<br><span id='sub_hdr'>ISBR Online Analysis & Testing System </span>";?></h1>	
		</div>
		
		<div id="navigation">
			<p id="status"> <?php echo $_SESSION['uname']; ?> &nbsp;, <a href="logout.php"> logout</a> </p>
			 <p id="chpass"><a href="change_pass.php" > change password</a></p>
			 <a  class="tabs active" href="view_facview.php"> &nbsp; Results &nbsp; </a> 
			 <a class="tabs inactive" href="que_create.php"> &nbsp;  Create &nbsp;	</a>
			
			
		</div> 
		
		<div id="content">
		
			<h1 class="caption">Report </h1>
		
			<form name="form1" action="exp_excel.php" method="post">			
			<p align="right">
			<a  href="view_facview.php">Back to Tests Page</a>
			</p>


		<div id="tb_report">
		<?php
		
		$str1 = " 
			
				<tr>
					<th>
						RollNo
					</th>
					<th>
						Program
					</th>
					<th>
						Batch
					</th>
					<th>
						Section
					</th>
				 ";
		
		echo "<table>
				<tr>		";
		
		echo $str2 = "
			
				
					<th>
						Student Name
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
				</tr> "; ?>
				
				
				
				<?php 
					$con = mysql_connect("localhost","root","");
					if (!$con)
					  {
					  die('Could not connect: ' . mysql_error());
					  }
					mysql_select_db("oats_p3", $con);
					
					$created_by=$_SESSION['uname'];
					$qnr_no = $_GET['id'];
					
					$tb_report = "tb_qnr".$qnr_no."_report";
					
					$sql = "SELECT * FROM $tb_report";
					
					$retid = mysql_query($sql);
					//if (!$retid) { echo( mysql_error()); }

								
					$str3 = "";			
					$str5 = "";
					while($row=mysql_fetch_array($retid)) 
					{
					//$_SESSION['qnr_id']=$row['sno'];
						
						$resp_id = $row['resp_id'];
						
						$q2 = "select section.name,batch.name,program.name from student_det
								inner join section using (sect_id)
								inner join batch using (batch_id)
								inner join program using (prog_id)
								where stud_id = $resp_id ";
						
						$r2 = mysql_query($q2);
						
						$row2 = mysql_fetch_array($r2);
						
						$str3 = "
						<tr>
						
							<td>
								".$row['resp_id']."
							</td>
							
														
							<td>".
								$row2[2]
							."</td>
							
							<td>".
								$row2[1]
							."</td>
							
							<td>".
								$row2[0]
							."</td>";
						
						echo "<tr>";	
												
						echo $str4 = "
					
						
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
						
						
								
						
						$str5 = $str5.$str3.$str4;	
	
					}
				
				mysql_close($con);
				$str_tb = "<table border=1>".$str1.$str2.$str5."</table>";
				//echo $str_tb;
				$_SESSION['excel_tb'] = $str_tb;
				
				?>           
			
			</table>
			</div>
			<input type="submit" value="Create Report" /> 
			
			</form>
			
			
			
		</div>

	</div>




</body>
</html>
