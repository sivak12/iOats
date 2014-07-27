<?php

session_start();
if(!session_is_registered("uname")){
header("location:../index.php");
}


$con = mysql_connect("localhost","root","");
if (!$con)
{
	 die('Could not connect: ' . mysql_error());
}

// getting query
mysql_select_db("oats_p3", $con);

//getting qnr sno
$qnr_no =  $_SESSION['qnr_no'];

//updating no of responses in tb_qnr

$query = "UPDATE tb_qnr SET response=response+1 WHERE sno= '$qnr_no'";
$result = mysql_query($query);

/*** get exam name ***/
$query = " SELECT * FROM tb_qnr WHERE sno=$qnr_no ";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$qnr_name = $row['name'];



/** opening tb_qnr(no) dv***/
$ent_table = "tb_qnr".$qnr_no;


$query = "SELECT * FROM $ent_table";
$result = mysql_query($query);

//insert a new empty record with the respondents name and updated the answers for each question in the loop later.
$table_report=$ent_table."_report";

$respondent=$_SESSION['uname'];
$resp_id = $_SESSION['stud_id'];

$stud_id = $_SESSION['stud_id'];


/*
if(count($_POST)==1)
{
	$ans_qno = $_SESSION['ans_qno'];
	?>
	<script>alert("You must atleast one question");</script>
	<?php header("location: ans_ent.php?id=$ans_qno");
}*/
		


$sql_query="INSERT INTO `$table_report` (`sno`,`resp_id`, `respondent`,`complete`) VALUES (NULL,'$resp_id', '$respondent','1')";

$retid=mysql_query($sql_query);

//$str2="r1";
$att_count = 0;
$corr_count = 0;
$qn_count = 0;
while ($row = mysql_fetch_array($result)) 
{
	$qn_count++;
	
	
	$id=$row['sno'];
	$type=$row['ans_type'];
	$ans_key = $row['answer'];
	
	$rd_btn = $id;
	$chk_box = c.$id;
	
	$qn_no = "qn_".$id;
	
	
	$flag = false;
	
	if(isset($_POST[$rd_btn]))
	{
		$ans_ent = $_POST[$rd_btn];
		$flag = true;
	}
	else if(isset($_POST[$chk_box]))
	{
		
		
		$ans_entarr = $_POST[$chk_box];
		$ans_ent = implode($ans_entarr);
		//echo "anwer:".$ans_ent;
		$flag = true;
	}
	
	if($flag == true)
	{
		$att_count++;
		
		$upd_query="UPDATE $table_report SET $qn_no='$ans_ent' WHERE resp_id='$resp_id'";	 	   
		$upd_result=mysql_query($upd_query);
		
		if($ans_ent == $ans_key)
			$corr_count++;
	}
		
		
}			
		
$update_query="UPDATE $table_report SET qn_count='$qn_count', att_count='$att_count', corr_count='$corr_count',taken_on=NOW() WHERE resp_id='$resp_id'";
$r=mysql_query($update_query);


$stu_report = $stud_id."_report";
//echo $stu_report."<br>";
$query = "INSERT INTO $stu_report (qnr_id,qnr_name,taken_on,qn_count,att_count,corr_count) VALUES 
									( '$qnr_no','$qnr_name', NOW(), '$qn_count', '$att_count', '$corr_count')";
$result = mysql_query($query);	
if(!$result)
echo mysql_error();	
	
	
	/*}
	if(isset($_POST[$rd_btn]))
	{
		$att_count++;	
		
		if( $_POST[$rd_btn] == $row['answer'] )
		{
			$corr_count++;
		}
		
	}
	
	else if(isset($_POST[$chk_box]))
	{
		$att_count++;
		$answer = array();
		$ans_ent = array();
		$ans_key = $row['answer'];
		$ans_ent = $_POST[$chk_box];
		$ac = 0;
		$flag = true;
		for($i=0; $i<count($answer); $i++)
		{
			if($ans_key[$i] != $ans_ent[$i])
			{
				$flag = false;
				break;
				
			}
			$ac++;
		
		}
		
		if($flag)
		{
			if($ac == count($answer))
			{
				$corr_count++;
			
			}
		}
		
	
		
	
	if($type == "single")
	{
		if($_POST[$rd_btn] == $row['answer'])
		{
			
		}
	}
	else if($type== "multiple")
	{
		$flag = 0;
		
		
		
		
		
	
	
	
	
	
	
	$n=1;
	$test="opt".$n;
		
			//getting no of options
		while($row[$test]!=NULL)
		{
			$n++;
			$test="opt".$n;
		}	 
	$usr_ans = "";
	
	if($type=='single')
	{
		$a=$_POST[$id];
		$qn_no="qn_".$id;
	 	for($k=1,$kc="a" ; $k<$n ; $k++,$kc++) 
		{
			  $t="opt".$k;
	  		  $t_count=$t."_count";
			  if($a==$row[$t])
			  {
			  	 //$quer="update $ent_table set $t_count=$t_count+1 where sno= '$id'";
				 //query to update the answers of the respondent in the table_report		
	  	   		 
				 //conv optns 123 to optn abc
				//echo ("kc:::::::"+$kc);								 
				 $update_query="UPDATE $table_report SET $qn_no='$kc' WHERE respondent='$respondent'";	 	   
				 $up_result=mysql_query($update_query);
				 $usr_ans = $kc;
				 break;	
				}
		}
	 
	 
	 } 
	
	if($type=='multiple') 
	{
		$nam="c".$id;
		$a=array();
		$a=$_POST[$nam];
		$qn_no="qn_".$id;
		$m_ans = "";
		
		
		for($k=0;$k<($n-1);$k++)
		{   
		    
	 		$temp=$a[$k];
			
			for($l=1,$lc="a";$l<$n;$l++,$lc++) 
			{
				  $t="opt".$l;
				  $t_count=$t."_count";
				   
				  if($temp==$row[$t])
				  {	 
						
						 //query to update the answers of the respondent in the table_report
						
						$m_ans = $m_ans.$lc;		
													
						 $update_query="UPDATE $table_report SET $qn_no='$m_ans' WHERE respondent='$respondent'";
						
						/* if($r)
							echo" executed";
						else echo "no";
						 $up_result=mysql_query($update_query);	
				  } 
			 }
			 	   
		}
	
		$usr_ans = $m_ans;
	} 
	
	/*
	if($type=='ranking')
	{
	    $qn_no="qn_".$id;
	  	for($k=1;$k<$n;$k++) 
		{
			  $t=$id.$k;
			  $rname=$_POST[$t];
			  
			  $wt=$n-$rname;
			
	  		  $t_count="opt".$k."_count";
			  	 $quer="update $ent_table set $t_count=$t_count+$wt where sno= '$id'";
				 //query to update the answers of the respondent in the table_report		
	  	   		 $update_query="UPDATE $table_report SET $qn_no=($qn_no*10)+$rname WHERE respondent='$respondent'";	 	   
				 $b=mysql_query($quer);
				 $up_result=mysql_query($update_query);
				
		}
	//query to update the answers of the respondent in the table_report		
    }	
	$str ="Comments".$id;
	$c=$_POST[$str];
	$d=$row["comment"];
	$e=$c."\n".$d;
	$quer3="update $ent_table set comment='$e'where sno = '$id'";
	
	$f=mysql_query($quer3); *

	if( $usr_ans != "")
	{
		$att_count++;
		
		if( $usr_ans == $row['answer'] )
		{
			$corr_count ++;
		}
	
	
	}	  
	
	
	 //$x=$x+1;		
	$qn_count++;	
	
			
}

$update_query="UPDATE $table_report SET qn_count='$qn_count', att_count='$att_count', corr_count='$corr_count',taken_on=CURDATE() WHERE respondent='$respondent'";
$r=mysql_query($update_query);

$stu_report = $respondent."_report";
$query = "INSERT INTO `$stu_report` (`sno`, `qnr_name`,`taken_on`,`qn_count`,`att_count`,`corr_count`) VALUES 
									(NULL, '$qnr_name', CURDATE(), '$qn_count', '$att_count', '$corr_count')";
$result = mysql_query($query);


//$user_role = $_SESSION['user_role'];



//if( $user_role == "student")
//{
//header("location: score.php");


*}
else
{
header("location: view_facent.php");
}*/
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

<body>
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
		
			<h1 class="caption"> Score </h1>
			<form action="view_student.php">
			<table>
				<tr>
					<th>
						Total Questions:		
					</th>
					<td>
					<?php	echo $qn_count; ?>
					</td>
				
				</tr>
					
				<tr>	
					<th>
						Attempted Questions:
					</th>
					<td>
					<?php	echo $att_count; ?>
					</td>	
				</tr>
					
				<tr>
					<th>
						Correct Answers:
					</th>
					<td>
					<?php	echo $corr_count; ?>
					</td>
				</tr>
				
				<tr>
				<td>
				<input type="submit" value="OK" />
				</td>
				</tr>			
			
			</table>

			</form>
		</div>
	</div>
</body>
</html>
			
			
			
