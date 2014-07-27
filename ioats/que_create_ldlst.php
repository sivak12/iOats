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


$fac_id = $_SESSION['fac_id'];
$sect_ids = $_SESSION['sect_ids'];


$sect_jn = "INNER JOIN section USING (sect_id)";
$batch_jn = "INNER JOIN batch USING (batch_id)";
$prog_jn = "INNER JOIN program USING (prog_id)";
//$cond = "WHERE fac_alloc.fac_id=$fac_id";
$cond = "WHERE section.sect_id IN ($sect_ids)";


$lst = $_GET['lst'];
$value = $_GET['val'];

switch ($lst)
{
	case "lst_prog":
					$field= "batch.batch_id,batch.name";
					$dom = "section";
					$cond = $cond." AND batch.prog_id=$value";
					$query = "SELECT DISTINCT ".$field." FROM ".$dom
							 ." ".$batch_jn
							 ." ".$cond; 
					
					$db_id = "batch_id";
					$db_name = "name";
					
					$str = "<option value='select' selected>select</option>";
					
					break;
	
	
	case "lst_batch":
					
					$field= "section.sect_id,section.name";
					$dom = "section";
					$cond = $cond." AND section.batch_id=$value";
					$query = "SELECT DISTINCT ".$field." FROM ".$dom
							  ." ".$cond; 
					
					$db_id = "sect_id";
					$db_name = "name";
					break;
					
					
					

}
   

$result = mysql_query($query);


while($row = mysql_fetch_array($result))
{
		
	$id = $row[$db_id];
	$name = $row[$db_name];
	
	switch($lst)
	{
		case "lst_prog":
					$str = $str. "<option value='$id'>$name</option> ";
					break;


		case "lst_batch":
					$str = $str. "<input type='checkbox' name='chk_sect[]' id='chk_sect' value=$id />$name <br>";
					break;
					
					
					
	}

}

echo $str;





?>