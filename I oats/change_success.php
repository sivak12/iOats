<?php
session_start();
?>


<html>
<head>
<title><?php echo $_SESSION['hdr'] ?></title>
<LINK REL="SHORTCUT ICON" HREF="logo.ico" />
<link type="text/css" rel="stylesheet" href="oats_p3.css" /> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div id="all">
				
		<div id="header">
			<h1 class="no_br"><?php 
			echo $_SESSION['hdr']."  <span id='ver'>Beta</span>"; 
			echo "<br><span id='sub_hdr'>ISBR Online Analysis & Testing System </span>";?></h1>
			
			
		</div>
		
		<div id="navigation">
			<p id="status">    </p>
			
		</div> 

	<div id="content">
	
					
		
			<h1 class="caption">Successful </h1>

<?php
 if($_SESSION['change_pass']==1) 
 {
 echo "<h2>Password successfully changed..!</h2>";

           
		   switch($_SESSION['user_role'])
		   {
		   		case "student":
				
		   				   echo "<a href=\"view_student.php\">Click to continue </a>";
		    				break;	
				case "faculty":
		  			   echo "<a href=\"view_facview.php\">Click to continue</a>";
 						break;				
 				case "admin":
 							echo "<a href=\"admin_progent.php\">Click to continue</a>";
 							break;
 
 
 			}		   	
	

	}
	
	 
?>
	
	</div>
	</div>
	   
</body>
</html>
