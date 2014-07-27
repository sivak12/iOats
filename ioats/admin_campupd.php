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

$cat = $_GET['cat'];

$txt_val = $_POST['txtVal'];
$lst_val = explode("\r\n",$txt_val); 
/*
echo $txt_val[0];
echo $txt_val[1];
$j = 0;

$l = count($txt_val);
echo "length:".$l;
//$lst_val[0] = array();
for($i=0;$txt_val[$i]!=NULL;$i++)
{
	$ch = $txt_val[$i];
	echo $i.":".$ch;
	
	/*if($ch == '\n')
	{
		echo " n dear";
		$j++;
		
		continue;
	}	
	echo "<br>";
	$lst_val[$j] = $lst_val[$j].$ch;*
		
}

*
if(count($lst_val) == 0)
{
	$lst_val[] = $txt_val;	

}*/



if( isset($_POST['lst_prog'] ))
{
	$prog_id = $_POST['lst_prog'];
}

if( isset($_POST['lst_batch'] ))
{
	$batch_id = $_POST['lst_batch'];
}


$err_flg = false;
$errval_lst= array();
$errno_lst= array();
$errmsg_lst = array();

foreach($lst_val as $value)
{
	if($value == "")
		break;
	
	
	
	
	switch($cat)
	{
		case "prog":
		
			$query = " INSERT INTO program ( name ) 
						  VALUES ( '$value') ";
			$red = "prog";
			break;
		
		case "batch":
			
			$query = " INSERT INTO batch ( name,prog_id ) 
						  VALUES ( '$value','$prog_id') ";
			$red = "batch";
			break;
			
		case "sect":
			
			$query = " INSERT INTO section ( name,batch_id ) 
						  VALUES ( '$value','$batch_id') ";
			$red = "sect";
			break;


	}

	$result =mysql_query($query);
	
	$err_lst = array();
	$errno_lst = array();
	
	if(!$result)
	{
		$err_flg = true;
		$errval_lst[] = $value;
		$errno_lst[] = mysql_errno($con);
		$errmsg_lst[] = mysql_error($con);
	}
}

mysql_close($con);



/*switch($cat)
{
	case "prog":
					
	
	case "batch":
	
	
	case "sect":


}*/

unset($_SESSION['errno_lst']);
unset($_SESSION['errval_lst']);
unset($_SESSION['errmsg_lst']);



if($err_flg)
{
$_SESSION['errval_lst'] = $errval_lst;
$_SESSION['errno_lst'] = $errno_lst;
$_SESSION['errmsg_lst'] = $errmsg_lst;
}

header("location: admin_updsucc.php?cat=$red");





?>