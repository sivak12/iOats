<?php
session_start(); 
if(!session_is_registered("uname"))
{
header("location:../index.php");
}


$question  = $_POST['txtQuestion'];
		
		/*$opt1 = $_POST['txtOpt1'];
		$opt2 = $_POST['txtOpt2'];
		$opt3 = $_POST['txtOpt3'];
		$opt4 = $_POST['txtOpt4'];
		$opt5 = $_POST['txtOpt5'];
		$opt6 = $_POST['txtOpt6'];
		$opt7 = $_POST['txtOpt7'];
		$opt8 = $_POST['txtOpt8'];
		$opt9 = $_POST['txtOpt9'];
		$opt10 = $_POST['txtOpt10'];*/
		$j=1;
		$opt = array();
		$answer = "";
		
		$answer = $_POST['ans_opt'];
		if( is_array($answer))
				$answer = implode("",$answer);
		
		for($i=1,$ic='a';$i<=10;$i++,$ic++)
		{
			$txtName = "txtOpt".$i;
			//$chkName = "chkOpt".$i;
			if( $_POST[$txtName] != "")
			{
				$opt[] = $_POST[$txtName];
			}
			/*if( isset ($_POST[$chkName]) )
			{
				$answer = $answer.$ic;
			}*/
		
		}		
			
		
		
		$ans_type = $_POST['mnuType'];
		
		/*if( $_POST['chkComment' ] == true)
			$allow_comm = true;
		else
			$allow_comm = false;*/
		
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
		// getting query
		mysql_select_db("oats_p3", $con);
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
													ans_type,
													answer)
						
				VALUES ( '$question', 	'$opt[0]' , 
										'$opt[1]', 
										'$opt[2]', 
										'$opt[3]', 
										'$opt[4]', 
										'$opt[5]', 
										'$opt[6]', 
										'$opt[7]', 
										'$opt[8]', 
										'$opt[9]',
										'$ans_type', 
										'$answer')";
		$result = mysql_query($query);		
		
		
		// add a column for each question entered in the questionnaire

		$table_name_report=$table_name."_report";
		$qn_id = mysql_insert_id();
		$qn_no="qn_".$qn_id;
		$p_qn_id=$qn_id-1;
		$p_qn_no="qn_".$p_qn_id;
		if($p_qn_id==0) 
		$sql_query="ALTER TABLE $table_name_report ADD $qn_no VARCHAR( 10 )  DEFAULT '' AFTER respondent ";
		else
		$sql_query="ALTER TABLE $table_name_report ADD $qn_no VARCHAR( 10)  DEFAULT '' AFTER $p_qn_no ";
		
		$retid=mysql_query($sql_query);
		mysql_close($con);
		
		$index = $_GET['ind'];
		if($index ==1)
		{
			header("location: que_design_new.php");
		}
		else
		{
			//echo "CCCCCCCCCCCCCCCCCCCCCCCCCCreation";
			header("location: que_create.php");	
		}
		
		
	?>

