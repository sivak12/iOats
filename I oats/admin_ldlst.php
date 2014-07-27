<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("oats_p3", $con);

$lst = $_GET['lst'];
$value = $_GET['val'];

switch ($lst)
{
	case "lst_prog":
					$query = "SELECT * FROM batch WHERE prog_id=$value";				
					$db_id = "batch_id";
					$db_name = "name";
					$str = "<option value=\"select\" selected>select</option>";
					break;
	
	case "lst_batch":
					$query = "SELECT * FROM section WHERE batch_id=$value";				
					$db_id = "sect_id";
					$db_name = "name";
					if(! (isset($_GET['cat']) ) )
							$str = "<option value=\"select\" selected>select</option>";
					break;


	case "lst_sect":
					$query = "SELECT * FROM special WHERE batch_id=$value";
					$db_id = "special_id";
					$db_name = "name";
					break;
}

$result = mysql_query($query);




while($row = mysql_fetch_array($result))
{
	
	
	$id = $row[$db_id];
	$name = $row[$db_name];
	
	$str = $str. "<option value='$id'>$name</option> ";
}
echo $str;
?>