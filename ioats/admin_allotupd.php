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

$sect_arr = array();
for($i=1;;$i++)
{
	$lst_sect = "lst_sect".$i;
	
	if( ! (isset($_POST[$lst_sect])) )
	{
		break;
	}
	
	$sect_lst = $_POST[$lst_sect];
	foreach($sect_lst as $sect)
	{
		$sect_arr[] = $sect;
	}
}

$sect_txt = implode(",",$sect_arr);



//echo "the sect ids:$sect_txt";

$fac_id = $_POST['lst_fac'];
//echo "idddddddd:".$fac_id;
	
$query = "UPDATE faculty_det SET sect_ids = '$sect_txt' WHERE fac_id = $fac_id ";
//echo "query:".$query;
			  	

$result = mysql_query($query);
//echo $resut;

header("location: admin_updsucc.php?cat=facallot");	 

?>