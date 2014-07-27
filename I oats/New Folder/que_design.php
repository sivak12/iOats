<?php
session_start(); 
if(!session_is_registered("uname")){
header("location:../index.php");
}?>

<?php
$_SESSION['que_design_ent'] += 1;



/** updating questionnaire db **/

/*$fname = $_GET['fname'];
$flag = 1;


switch($fname)
{

case "create":
				$ch_name = $_POST['txtName'];
				if($ch_name == "")
					$flag = 0;
					
				break;
case "design":
				$ch_qn = $_POST['txtQuestion'];
				$ch_opt1 = $_POST['txtOpt1'];
				if( ($ch_qn == "") || ($ch_opt1 == ""))
					$flag = 0;
				break;
case "allow":
				$flag = 0;
				break;

}*/

/*if($flag == 0)
{

		if($fname == "create")		
				header("location: que_create.php");
		else if($fname == "design")
				header("location: que_design.php?fname=allow");			
							
}
else
{		

	if (  ( $_SESSION['que_design_ent'] ) == 0) //check wid session var
	{
		
		$_SESSION['que_design_ent'] += 1; // set session var
		/*$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		// getting query
		mysql_select_db("oats_p2", $con);
		
		$name = $_POST['txtName'];
		
			
		$desc = $_POST['txtDesc'];
		$created_by = $_SESSION['uname'];	
		
		
		$chkResearcher = $_POST['chkResearcher'];
		$chkRespondent = $_POST['chkRespondent'];
		
		$target = "all";
		if($chkRespondent == true)
		{
		//echo("resp");
		$target = "respondent";	
		}
		if( $chkResearcher == true)
		{
			//echo("research");
			if( $target == "" )
			{
				$target = "researcher";
			}
			else
			{
				$target = "all";
			}		
		}
		$response = 0;
		$query = "INSERT INTO tb_qnr (name, description, created_by,created_on,target,response)
				 VALUES ( '$name', '$desc' , '$created_by', CURDATE(), '$target', '$response')";
		$result = mysql_query($query);
		
		/** parts to be tested   
		//$query = " SELECT * FROM tb_qnr";
		//$result = mysql_query($query);
		$no = mysql_insert_id();
		
		$table_name = "tb_qnr".$no;
	
		//create session tab name
		$_SESSION['table_name'] = $table_name;
		//$table_name = "tabnew1";
		$query = "CREATE TABLE $table_name (
		sno SERIAL,
		question VARCHAR(30),
		opt1 VARCHAR(30),
		opt1_count INT(10) DEFAULT '0',
		opt2 VARCHAR(30),
		opt2_count INT(10) DEFAULT '0',
		opt3 VARCHAR(30),
		opt3_count INT(10) DEFAULT '0',
		opt4 VARCHAR(30),
		opt4_count INT(10) DEFAULT '0',
		opt5 VARCHAR(30),
		opt5_count INT(10) DEFAULT '0',
		opt6 VARCHAR(30),
		opt6_count INT(10) DEFAULT '0',
		opt7 VARCHAR(30),
		opt7_count INT(10) DEFAULT '0',
		opt8 VARCHAR(30),
		opt8_count INT(10) DEFAULT '0',
		opt9 VARCHAR(30),
		opt9_count INT(10) DEFAULT '0',
		opt10 VARCHAR(30),
		opt10_count INT(10) DEFAULT '0',
		ans_type VARCHAR(10) DEFAULT 'single',
		allow_comm BOOL DEFAULT '0',
		comment VARCHAR(150)
		)";
		
		$result = mysql_query($query);
		if(!$result)
			echo mysql_error();
		
		$table_name_report=$table_name."_report";
		$sql_query="CREATE TABLE $table_name_report (
						`sno` SERIAL NOT NULL ,
						`respondent` VARCHAR( 25 ) NOT NULL ,
						`complete` BOOL NOT NULL)";

		$retid=mysql_query($sql_query);
		mysql_close($con);
	}
	else
	{
		$_SESSION['que_design_ent'] += 1;
		$question  = $_POST['txtQuestion'];
		
		$opt1 = $_POST['txtOpt1'];
		$opt2 = $_POST['txtOpt2'];
		$opt3 = $_POST['txtOpt3'];
		$opt4 = $_POST['txtOpt4'];
		$opt5 = $_POST['txtOpt5'];
		$opt6 = $_POST['txtOpt6'];
		$opt7 = $_POST['txtOpt7'];
		$opt8 = $_POST['txtOpt8'];
		$opt9 = $_POST['txtOpt9'];
		$opt10 = $_POST['txtOpt10'];
		
		$ans_type = $_POST['mnuType'];
		
		if( $_POST['chkComment' ] == true)
			$allow_comm = true;
		else
			$allow_comm = false;
		
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		// getting query
		mysql_select_db("oats_p2", $con);
		$table_name = $_SESSION['table_name'];
		$query = "INSERT INTO $table_name (question, opt1, 
													opt2,
													opt3,
													opt4,
													opt5,
													opt6,
													opt7,
													opt8,
													opt9,
													opt10,
													ans_type,allow_comm)
						
				VALUES ( '$question', 	'$opt1' , 
										'$opt2', 
										'$opt3', 
										'$opt4', 
										'$opt5', 
										'$opt6', 
										'$opt7', 
										'$opt8', 
										'$opt9', 
										'$opt10', 
													'$ans_type', '$allow_comm')";
		$result = mysql_query($query);		
		
		
		// add a column for each question entered in the questionnaire

		$table_name_report=$table_name."_report";
		$qn_id = mysql_insert_id();
		$qn_no="qn_".$qn_id;
		$p_qn_id=$qn_id-1;
		$p_qn_no="qn_".$p_qn_id;
		if($p_qn_id==0) 
		$sql_query="ALTER TABLE $table_name_report ADD $qn_no INT( 10 )  DEFAULT '0' AFTER respondent ";
		else
		$sql_query="ALTER TABLE $table_name_report ADD $qn_no INT( 10)  DEFAULT '0' AFTER $p_qn_no ";
		
		$retid=mysql_query($sql_query);
		mysql_close($con);
	}
	
}
*/	?>
	
	
	
	
	
	
	
	
	
	
	
	<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>Untitled Document</title>
	<script type="text/javascript" src="que_designjs.js"></script>
	
	<link type="text/css" rel="stylesheet" href="oats_p3.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	</head>
	
	<body>
	
		<div id="all">
		
			
			<div id="header">
				<h1 class="no_br"> Online Exam</h1>	
			</div>
			
			<div id="navigation">
				<p id="status"><?php echo $_SESSION['uname']; ?>&nbsp;,  <a href="logout.php"> logout </a> </p>
				 <p id="chpass"><a href="change_pass.php" > change password</a></p>
				 <a class="tabs inactive" href="view_facview.php"> &nbsp;  Results &nbsp; </a>
				 <a class="tabs active" href="que_create.php"> &nbsp;  Create &nbsp;  </a>
			
			</div> 
			
			<div id="content">
					
				<h1 class="caption"><?php echo $_SESSION['txtQname'];?></h1>
	
				<FORM NAME="form1" id="form1" ACTION="" METHOD=POST>
				
				
				<table>
				
					
					<tr>
						
						<th>
							<?php echo "Qn No.".$_SESSION['que_design_ent'].":"; ?> 
							
						</th>
						
						<td>
							<TEXTAREA WRAP=PHYSICAL ID="txtQuestion" NAME="txtQuestion" ROWS=2 COLS=60 onkeyup="txtQn_change(this)"></TEXTAREA>
							
						</td>
						
					</tr>
					<tr>
						<th>
							Type:
						</th>
						<td>
							<select name="mnuType" onchange="ch_ansopt(this)">
								<option value="single" selected>Single</option>
								<option value="multiple">Multiple</option>
								
							</select>
						</td>
						
					
					
					</tr>
					<tr>
							<th>
							</th>
							<th>
							</th>
							<th>
							mark as answer
							</th>
					</tr>
					
					<?php
					for( $i=1 ,$ic='a'; $i<=10 ; $i++,$ic++)
					{   
						$txtName = "txtOpt".$i;
						$chkName = "chkOpt".$i;
						$capName = "cap_".$txtName;
						$btnOptName = "btnOpt_".$txtName;
						$btnNextName = "btnNext_".$txtName;
						$btnCompName = "btnComp_".$txtName;
						echo "
						<tr>
						<th>
							
							<span id=$capName> Option $i: </span>
						</th>
						<td>
							<TEXTAREA WRAP=PHYSICAL id=$txtName NAME=$txtName ROWS=1 COLS=60  title=$i onkeyup=\"txtOpt_change(this)\"></TEXTAREA>
						</td>
						
						<td>
							<INPUT ID='ans_opt' TYPE='radio' NAME='ans_opt' VALUE='$ic'>
						</td>
										
					
						</tr>
						
						<tr>
						<td>
							
						</td>
						<td>
							<INPUT TYPE=SUBMIT VALUE=\"Add next question\" NAME=$btnNextName  id=$btnNextName onclick=\"val_qdet('1')\" >
						</td>
						
						<td>
							<input type=SUBMIT value=\"Complete\" name=$btnCompName id=$btnCompName onclick=\"val_qdet('2')\" >
						</td>
					
					
					</tr>
						
						
						
						
						
						 ";
					}	
					?>
					
						
					
				
					
				
					
				
				</table>
			
				</form>
			</div>
		</div>
		
	
	
	</body>
	</html>

		
		
		
