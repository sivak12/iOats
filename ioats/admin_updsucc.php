<?php
session_start();
if(!session_is_registered("uname"))
{
header("location:../index.php");
}
?>

<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $_SESSION['hdr'] ?></title>
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
			
			<!--<h1 class="caption"> Questionnaire</h1>	-->
		</div>
		
		<div id="navigation">
			<p id="status"> <?php echo $_SESSION['uname']; ?> &nbsp;,  <a href="logout.php" id="logout" > logout</a> </p>
			<p id="chpass"><a href="change_pass.php" >change password</a></p>
						
		</div> 
		
		<div id="content">
			
			<?php
			if(!isset($_SESSION['errval_lst']))
			{
				$capt = "Update Successful..!"; 
				$str = "The ";
			}
			
			else
			{
				$capt = "Update Failed..!"; 
				$str = "The following ";
			}
			
			
			echo "<h1 class='caption'>$capt</h1>";			
			
			$cat = $_GET['cat'];
			
			
			
			switch($cat)
			{
				case "prog":
							$str = $str."Program ";
							$lnk = "admin_progent.php";				
							break;
				
				
				case "batch":
							$str = $str."Batch ";
							$lnk = "admin_batchent.php";
							break;
				
				case "sect":
							$str = $str."Section ";
							$lnk = "admin_sectent.php";
							break;
				case "stud":
							$str = $str."Student ";
							$lnk = "admin_student.php";
							break;
				
				case "fac":
							$str = $str."Faculty ";
							$lnk = "admin_facent.php";
							break;
				
				case "facallot":
							$str = $str."Faculty Allotment ";
							$lnk = "admin_facallot.php";
							break;
				
				
				
			}
			
			if(isset($_SESSION['errval_lst']))
			{
				$str = $str." details are not updated";	
				echo "<h4>$str</h4>";
				
				$errno_lst = $_SESSION['errno_lst'];
				$errval_lst = $_SESSION['errval_lst'];
				$errmsg_lst = $_SESSION['errmsg_lst'];
				
				$i=0;
				foreach($errval_lst as $value)
				{
					$str2 = "Entry : ".$value." , error : ";
					
					if( $errno_lst[$i] == 1062 )
					{
						$str2 = $str2."Duplicate Entry";
					}
					else
					{
						$str2 = $str2.$errmsg_lst[$i];
					}	
					
					echo "<p><b>$str2</b></p>";			
					$i++;
				}
				
				
				
			}
			
			else
			{
				$str = $str." details are successfully updated";	
				echo "<h4>$str</h4>";
			}
			
			
			
			
			
			
			echo "<h4>Click <a href='$lnk' target=\"_self\" > here</a> to continue...</h4> ";
			
			?>
			
			
						
			

		
		</div>

	</div>
</body>
</html>

