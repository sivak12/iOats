<?php
session_start(); 
if(!session_is_registered("uname"))
{
header("location:../index.php");
}

$con = mysql_connect("localhost","root","");
	if (!$con)
	{
		//die('Could not connect:'.mysql_error());
	}
		
		
		mysql_select_db("oats_p3", $con);
		
		$name = $_POST['txtName'];
		$_SESSION['txtQname'] = $name;
			
		$desc = $_POST['txtDesc'];
		
			
		
		$lst_grp = array();
		$lst_grp = $_POST['chk_sect'];
		
		$trg_grp = implode(",", $lst_grp);
		//echo $trg_grp;
		
		$time_limit = $_POST['txtTime'];
		
		$created_by = $_SESSION['uname'];
		
		$start_txt = $_POST['txtStart'];
		$end_txt = $_POST['txtEnd'];
		
		$start_arr = explode(" ",$start_txt);
		$end_arr = explode(" ",$end_txt);
		
		//echo $start_arr[0];
		//echo $start_arr[1];
		
		/*********** getting start date time ************/
		$start_date = $start_arr[0];
		$start_time = $start_arr[1];
	
		$date_lst = explode("/",$start_date);
		$start_date = $date_lst[1]."/".$date_lst[0]."/".$date_lst[2];
		
				 
		$nstart_date = date('Y-m-d', strtotime($start_date));
		
		//echo "<br>newf:".$nstart_date;
		$start_on = $nstart_date." ".$start_time;
		
		
		/*********** getting end date time ************/
		$end_date = $end_arr[0];
		$end_time = $end_arr[1];
		
		$date_lst = explode("/",$end_date);
		$end_date = $date_lst[1]."/".$date_lst[0]."/".$date_lst[2];
		
				 
		$nend_date = date('Y-m-d', strtotime($end_date));
		
		$end_on = $nend_date." ".$end_time;
		
		
		
		
		
		
		
		
		
		
		
		/*
		$end_date = $start_arr[0];
		$start_time = $start_arr[1];
		 
		$nstart_date = date('Y-m-d', strtotime($start_date));
		
		$start_on = $nstart_date." ".$start_time;
		
		
		
		
		$end_date = $end_arr[0];
		$end_time = $end_arr[1];*/
		
		
		//$created_by = $_SESSION['fac_id'];	
		
		/*
		$chkResearcher = $_POST['chkResearcher'];
		$chkRespondent = $_POST['chkRespondent'];
		$tc = 0;
		$target = "all";
		if($chkRespondent == true)
		{
			$target = "respondent";	
			$tc++;
		}
		if( $chkResearcher == true)
		{
			$target = "researcher";
			$tc++;
		}
		
		if($tc == 2)
			$target = "all";
			
			
			*if( $target == "all" )
			{
				$target = "researcher";
			}
			else
			{
				$target = "all";
			}		
		}*/
		
		
		$response = 0;
		$query = "INSERT INTO oats_p3.tb_qnr (name, description,trg_sect_ids, created_by,created_on,start_on,end_on,time_limit,response)
				 VALUES ( '$name', '$desc' , '$trg_grp', '$created_by', NOW(),'$start_on','$end_on','$time_limit','$response')";
		$result = mysql_query($query);
		
		/** parts to be tested   */
		//$query = " SELECT * FROM tb_qnr";
		//$result = mysql_query($query);
		$no = mysql_insert_id();
		
		$table_name = "tb_qnr".$no;
	
		//create session tab name
		$_SESSION['table_name'] = $table_name;
		//$table_name = "tabnew1";
		$query = "CREATE TABLE $table_name
		(`sno` SERIAL NOT NULL,
		`question` VARCHAR(30),
		`opt1` VARCHAR(30),
		`opt2` VARCHAR(30),
		`opt3` VARCHAR(30),
		`opt4` VARCHAR(30),
		`opt5` VARCHAR(30),
		`opt6` VARCHAR(30),
		`opt7` VARCHAR(30),
		`opt8` VARCHAR(30),
		`opt9` VARCHAR(30),
		`opt10` VARCHAR(30),
		`answer` VARCHAR(10),
		`ans_type` VARCHAR(10) DEFAULT 'single'
		)";
			mysql_select_db("oats_p3", $con);
		$result = mysql_query($query);
		if(!$result)
			echo mysql_error();
		
		$table_name_report=$table_name."_report";
		$sql_query="CREATE TABLE $table_name_report (
						`sno` SERIAL NOT NULL ,
						`resp_id` INT(15), 
						`respondent` VARCHAR( 25 ) NOT NULL ,
						`qn_count` INT(10) DEFAULT '0',
						`att_count` INT(10) DEFAULT '0',
						`corr_count` INT(10) DEFAULT '0',
						`taken_on` DATETIME,
						`complete` BOOL NOT NULL)";

		$retid=mysql_query($sql_query);
		mysql_close($con);
		
		header("location: que_design_new.php");
?>