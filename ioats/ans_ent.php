<?php 

//changes made acc to the required modifications.
session_start();
if(!session_is_registered("uname")){
header("location:index.php");
}

$con = mysql_connect("localhost","root","");
if (!$con)
{
	 die('Could not connect: ' . mysql_error());
}

// getting query
mysql_select_db("oats_p3", $con);
$qnr_no =  $_GET['id'];
$_SESSION['qnr_no'] = $qnr_no;

// getting questionnaire name & description
$query = " SELECT * FROM tb_qnr WHERE sno=$qnr_no ";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$capt_qname = $row['name'];
$capt_qdesc = $row['description'];
$time_limit = $row['time_limit'];

$ent_table = "tb_qnr".$qnr_no;


$query = "SELECT * FROM $ent_table";
$result = mysql_query($query);

?>



<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $_SESSION['hdr'] ?></title>
<LINK REL="SHORTCUT ICON" HREF="logo.ico" />
<script language="JavaScript" src="ans_ent.js"></script>
<link type="text/css" rel="stylesheet" href="oats_p3.css" /> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<?php echo "<body onload='start_timer($time_limit)'>"; ?>
	<div id="all">
		
		<div id="header">
			<h1 class="no_br"><?php 
			echo $_SESSION['hdr']."  <span id='ver'>Beta</span>"; 
			echo "<br><span id='sub_hdr'>ISBR Online Analysis & Testing System </span>";?></h1>
		</div>
		
		<div id="navigation">
			
			<p id="status"> <?php echo $_SESSION['uname']; ?> &nbsp;,  <a href="logout.php" id="logout" > logout</a> </p>
			<a  class="tabs active" href="view_student.php"> &nbsp; Tests &nbsp; </a> 
			 <a class="tabs inactive" href="view_studview.php"> &nbsp;  Results &nbsp; </a>
		
		</div> 
		
		<div id="content">
		
			<h2 class="caption"> <?php echo "$capt_qname"; ?> </h2>
			<!--<h2> <?php echo "$capt_qdesc"; ?> </h2>-->
				<div id="timer">Time Remaining: <span id="hr_txt"></span> hour,<span id="min_txt"></span> minutes</div>

				
					
				
			
		
			
			<?php 
	  
//query to check whether the record of the respondent exixts or not
$respondent=$_SESSION['uname'];
$table_report=$ent_table."_report";
$sql="SELECT * FROM $table_report WHERE respondent='$respondent'";
$retid=mysql_query($sql);
$count=mysql_num_rows($retid); 


	  
if($count==0) 
{
	$x=0;
		
		
	 echo "<FORM NAME='Question'  action =\"ans_ent_2.php\" METHOD='POST' >";
	 	 
	echo "
   <div id=\"qn_area\">";
   
	 
	 echo "<table>";	 
	 	
	while ($row = mysql_fetch_array($result)) 
	{    
		$id =  $row["sno"];   
		$question = $row["question"];  
		$type=$row['ans_type'];
		$n=1;
		$test="opt".$n;
		
			//getting no of options
		while($row[$test]!=NULL)
		{
			$n++;
			$test="opt".$n;
		}	 
	 
		 //getting option names
		 for($k=1;$k<$n;$k++)
		 {
			$t="opt".$k;
			$t2=$row[$t];
		}
		
		$type=$row['ans_type']; 
	
	 	$chkname="c".$id."[]";
	 	$allow_comm=$row['allow_comm'];
	 		
		//question no		
		$x=$x+1;
    	
			
		//print question
		
		echo "
			
		<tr>
				
			<th>Q.$x </th>
        		
			<td><b>$question </b></td>
			
		</tr>";
		  
			 
          
        
		if($type=="single") 
		{
			for($k=1,$kc='a';$k<$n;$k++,$kc++) 
			{
				$t="opt".$k;
				$t2=$row[$t];
				echo "
				<tr>
					<td>opt $kc.</td>		
					
					<td> <input type=radio name='$id' value='$kc'>$t2 </td>
				</tr>";
			}
			
		}
		
		if($type=="multiple") 
		{
			for($k=1,$kc='a';$k<$n;$k++,$kc++) 
			{
				$t="opt".$k;
				$t2=$row[$t];
				echo "
				<tr>
					 <td>opt $kc.</td>
					 <td> <input type=checkbox name='$chkname' value='$kc'>$t2</td>
				</tr>";
			}
		}
	
		/*
		if($type=="ranking") 
		{
			echo "
			<tr>
				<td>
				</td>
		
				<td>
					Rank
				</td>";
			
				for($l=1;$l<$n;$l++)	
				{
					echo "
					<th>	
						$l 
					</th>	";
				}
				
				echo "
			
			</tr> ";	
				
				
			for($k=1;$k<$n;$k++) 
			{
				$rname=$id.$k;
				$ans="opt".$k;
				$option=$row["$ans"];
				
				echo "
				<tr> 
					
					<th>
						Opt.$k
					</th>
						
					<td>
						$option
					</td>";
			
					for($l=1;$l<$n;$l++)	
					{
						echo "<td>";
						echo "<input type=radio name='$rname' value=\"$l\" >";
						echo "</td>";
					}
					echo "
				</tr>";
			}			
		}
		if($allow_comm)
		{
			echo "
			<tr>
				<td>
				</td>
				<td>
					Comments
				</td>
			</tr> ";
			echo "
			<tr>
				<td>
				</td>
				<td>
					<TEXTAREA WRAP=PHYSICAL ID=Forms Multi-Line1 NAME=\"Comments".$id ."\" ROWS=7 COLS=40></TEXTAREA>
				</td>
			</tr>";
        }
		*/
	}	
	echo "</table>";
	echo "</div>";
	echo "
		<p align=\"right\">
			<input type='submit' value='Submit' name='submit1' id='submit1'>
		</p>
			
	  
		
		";
	
	echo "
	</form>";
}
					
      
else 
{
	echo "<b>".$respondent.", you have answered this questionnaire. To answer new questionnaires, go back to the questionnaire page </b>";
	echo "<br> <br>";
	if($_SESSION['user_role']=='researcher')
		echo "<a href=\"view_facent.php\"> Questionnaire Page </a>";
	 else
	 	echo "<a href=\"view_student.php\"> Questionnaire Page </a>";		  
 }
	 
 ?>		 		

	</div>
</div>
		


</body>
</html>
