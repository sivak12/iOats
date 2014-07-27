<?php
session_start();
if(!session_is_registered("uname"))
{
header("location:../index.php");
}
$_SESSION['que_design_ent'] = 0;
?>

<?php
$con = mysql_connect("localhost","root","");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("oats_p3", $con);
//$created_by=$_SESSION['uname'];

$fac_id = $_SESSION['fac_id'];


// get sect_ids of the faculty
$query = "SELECT sect_ids FROM faculty_det
           WHERE fac_id = $fac_id ";
$result = mysql_query($query);

$row = mysql_fetch_array($result);
$sect_ids = $row['sect_ids'];
$_SESSION['sect_ids'] = $sect_ids;

$sect_jn = "INNER JOIN section USING (sect_id)";
$batch_jn = "INNER JOIN batch USING (batch_id)";
$prog_jn = "INNER JOIN program USING (prog_id)";
//$cond = "WHERE fac_alloc.fac_id=$fac_id";

$cond = "WHERE section.sect_id IN ($sect_ids)";

/******* get sections *************
$field= "section.sect_id,section.name";
$dom = "fac_alloc";
$query = "SELECT DISTINCT ".$field." FROM ".$dom
         ." ".$sect_jn
		 ." ".$cond; 
$q1 = $query;
$res_sect = mysql_query($query);

while($row = mysql_fetch_array($res_sect))
{
		


}

/********* get batches ******************
$field= "batch.batch_id,batch.name,section.sect_id";
$dom = "fac_alloc";
$query = "SELECT DISTINCT ".$field." FROM ".$dom
         ." ".$sect_jn
		 ." ".$batch_jn
		 ." ".$cond; 
$res_batch = mysql_query($query);
$q2 = $query; */

/********* get programs ******************
$field= "prog_id,program.name";

$dom = "fac_alloc";
$query = "SELECT DISTINCT ".$field." FROM ".$dom
         ." ".$sect_jn
		 ." ".$batch_jn
		 ." ".$prog_jn
		 ." ".$cond; */

$field= "prog_id,program.name";
$dom = "section";
$query = "SELECT DISTINCT ".$field." FROM ".$dom
         ." ".$batch_jn
		 ." ".$prog_jn
		 ." ".$cond; 

$res_lst = mysql_query($query);
$q3 = $query;


/*********** assign arrays *************

while($row = mysql_fetch_array($res_prog))
{
	$lst_prog['prog_id'] = $row['prog_id'];
	$lst_prog['prog_name'] = $row['name'];
	$lst_prog['batch_id'] = $row['batch_id'];
	
}

while($row = mysql_fetch_array($res_batch))
{
	$lst_batch['batch_id'] = $row['batch_id'];
	$lst_batch['batch_name'] = $row['name'];
	$lst_batch['sect_id'] = $row['sect_id'];
}

while($row = mysql_fetch_array($res_sect))
{
	$lst_sect['sect_id']
	$lst_sect['sect_name']
	
	
}
*/





?>



<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title><?php echo $_SESSION['hdr'] ?></title>
<link type="text/css" rel="stylesheet" href="oats_p3.css" />
<LINK REL="SHORTCUT ICON" HREF="logo.ico" />
<script type="text/javascript" src="que_createjs.js"></script>
<script language="javascript" type="text/javascript" src="datetimepicker.js" ></script>

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
			<p id="status"><?php echo $_SESSION['uname']; ?> &nbsp;, <a href="logout.php"> logout</a> </p>
			 <p id="chpass"><a href="change_pass.php" > change password</a></p>
			 <a class="tabs inactive" href="view_facview.php"> &nbsp;  Results &nbsp; </a>
			 <a class="tabs active" href="que_create.php"> &nbsp;  Create &nbsp;  </a>
			
		</div> 
		
		<div id="content">
		
			
			<h1 class="caption">Create Test </h1>

			<FORM NAME="form1" id="form1" ACTION="que_create_upd.php" METHOD=POST>
			
			
			
			<table>
				<tr>
				
					<th>
						Test Name
					</th>
				
					<td>
						<TEXTAREA WRAP=PHYSICAL  NAME="txtName" id="txtName" xROWS=3 COLS=29 onkeyup="en_submit()" ></TEXTAREA>
					</td>
					<td>
						*required
					</td>
				</tr>
				<tr>
					<th>
						Description
					</th>
				
					<td>
						<TEXTAREA WRAP=PHYSICAL ID="Forms Multi-Line1" NAME="txtDesc" ROWS=4 COLS=29></TEXTAREA>
					</td>
				</tr>
				
				<tr>
					<th>
					Time Limit(in minutes)
					</th>
					<td>
					<input type="text" name="txtTime" size="6"/>		
					</td>
				
				</tr>
				
			
			
			<tr>
					<th>
					Target :
					</th>
					<th>
						<table>
							<tr>
								<th>
								program
								</th>
								<th>
								batch
								</th>
								<th>
								section
								</th>
							</tr>
							
							<tr>
								<th>
								
								<select name="lst_prog" id="lst_prog" onchange="ld_lst(this)" >
								<option value="select" selected>select </option>
								
								<?php
								
								while($row = mysql_fetch_array($res_lst) )
								{
														
									$id = $row['prog_id'];
									$name = $row['name'];
									echo "<option value=$id>$name</option>";
									
								
								
								}
							
							
								?>
								</select>
								
								
								</th>
								
								
								<th>
									<select name="lst_batch" id="lst_batch" onchange="ld_lst(this)" >
									<option value="select" selected>select </option>
									</select>
								
								</th>
								
																
								<th>
																
									<fieldset id="chk_fld" name="chk_fld">
				
				
									</fieldset>
								
								
								</th>
							
									
							
							
							</tr>
						
						</table>
					</th>
			</tr>
			
			
			<tr>
				<th>
				Starts:
				</th>
				<td>
					<input type="text" name="txtStart" id="txtStart" size="20"><a href="javascript:NewCal('txtStart','ddmmyyyy',true,24)">
					<img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>	
				</td>
				<th>
					Ends:
				</th>
				<th>
					<input type="text" name="txtEnd" id="txtEnd" size="20"><a href="javascript:NewCal('txtEnd','ddmmyyyy',true,24)">
					<img src="cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
				</th>
				
			
			</tr>
			
			
			<tr>
				<th>
				
				</th>
				<td>
				<input type="submit" name="btnSubmit" id="btnSubmit" value="  Create  "  />
				</td>
			
			</tr>		
					
		</table>	
					
					
					
					
			
		</form>
	</div>
	</div>
	


</body>

</html>
