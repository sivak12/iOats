<?php
session_start(); 
if(!session_is_registered("uname")){
header("location:../index.php");
}?>

<?php
$_SESSION['que_design_ent'] += 1;


?>


	
	
	<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title><?php echo $_SESSION['hdr'] ?></title>
	<script type="text/javascript" src="que_design_new.js"></script>
	<LINK REL="SHORTCUT ICON" HREF="logo.ico" />
	
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
							<TEXTAREA WRAP=PHYSICAL ID="txtQuestion" NAME="txtQuestion" ROWS=2 COLS=60 onkeyup="show_tb()"></TEXTAREA>
							
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
					
				</table>
				
			<table id="tb_opt">
				<tr>
					<th>
					Option
					</th>
					<th>
					
					</th>
					<th>
					Answer
					</th>
					
				</tr>
			
				<tr id="rlast" title="1">
					
					<th>
					a.
					
					</th>
					<th>
						<TEXTAREA WRAP=PHYSICAL id="txtOpt1" NAME="txtOpt1" ROWS=1 COLS=60  ></TEXTAREA>	
					</th>
					<th>
						<INPUT TYPE='radio' NAME='ans_opt' VALUE='a' >
					</th>
					<th>
						<input type="button" name="btnAdd1" id="btnAdd1" onclick="addRow(this)" value="Add Option" />
					</th>
				
				</tr>	
			
			</table>	
			<table>
						<tr>
							<th>
							</th>
							<td>
								<INPUT TYPE="button" VALUE="Add next question" NAME="add"  id="add" onclick="val_det(this)" >
							</td>
							
							<th>
								<input type="button" value="Complete" name="complete" id="complete" onclick="val_det(this)" >
							</th>	
						</tr>
						
			</table>			
				
				
		</form>			
				
				
				
			</div>
		</div>
		
	
	
	</body>
	</html>

		
		
		
