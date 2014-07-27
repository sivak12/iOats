<?php
session_start();
if(!session_is_registered("uname"))
{
header("location:../index.php");
}

$data = array();

function add_person( $name, $email )
{
  global $data;
  
  $data []= array(
    
  'name' => $name,
  'email' => $email );
  
}


function genPass($str)
{
  $pass = md5($str);
  $pass = substr($pass, 0, 8);
  return $pass;
} 


if ( $_FILES['file']['tmp_name'] )
{
		$dom = DOMDocument::load( $_FILES['file']['tmp_name'] );
		
		$rows = $dom->getElementsByTagName( 'Row' );
		$first = true;
		foreach ($rows as $row)
		{
				//echo "in";
				if( !($first))
				{
						$index = 1;
						$cells = $row->getElementsByTagName( 'Cell' );
						
						
						$name = "";
						$email = "";
						
						foreach( $cells as $cell )
						{ 
							$ind = $cell->getAttribute( 'Index' );
							if ( $ind != null ) $index = $ind;
							
							
							if( $cell->nodeValue == "")
							{
								break;
							}
							//echo "innnnnnnnnnnnnnncell\n";
							if ( $index == 1 ) $name = $cell->nodeValue;
							if ( $index == 2 ) $email = $cell->nodeValue;
							//if ( $index == 3 ) $email = $cell->nodeValue;
							
							$index += 1;
						}
								
						if( $name != "" && $email != "")
						add_person($name, $email);
		
				}
				$first = false;
			
		}
		
		
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("oats_p3", $con);
	
		
		//$sect =  $_POST['lst_sect'];
		$err_flg = false;
		
		foreach($data as $row)
		{
			
			$name =  $row['name'];
			$email =  $row['email'];
			$pword = genPass($id.$name.$email); 
			//$pword = "isbr";
			$query = "INSERT INTO faculty_det (name, email,password)
					 VALUES ('$name', '$email' ,'$pword')";
			$result = mysql_query($query);	
		
			if($result)
			{
				/**********************mail faculty username & pwords   ********************/
				
				/******* mail username & pword *******/
			
				require_once "Mail.php";
	
			
			
				
				$from = "Admin <systems@isbr.in>";
				
				$to = $email;
				$subject = "User Details : I-OATS";
						
				$body = "You are successfully registered with the Online Tests of ISBR and your user details are.. \n";
				$body = $body."Username: $email\n";
				$body = $body."Password: $pword";
				
				
				$host = "mail.isbr.in";
				$username = "systems@isbr.in";
				$password = "isbR4545";
				
				$headers = array ('From' => $from,
				  'To' => $to,
				  'Subject' => $subject);
				$smtp = Mail::factory('smtp',
				  array ('host' => $host,
					'auth' => true,
					'username' => $username,
					'password' => $password));
				
				$mail = $smtp->send($to, $headers, $body);
				
				if (PEAR::isError($mail)) 
				{
					echo("<p>" . $mail->getMessage() . "</p>");
					$err_flg = true;
					$errval_lst[] = $email;
					$errno_lst[] = "0";
					$errmsg_lst[] = "Failed to mail user and hence not updated..";
					$query = "DELETE FROM `student_det` WHERE `email` = $email ";
					$result = mysql_query($query);
				} 
					
			
			
			
			
			
			
			
			}
			else
			{
		
				$err_flg = true;
				$errval_lst[] = $name;
				$errno_lst[] = mysql_errno($con);
				$errmsg_lst[] = mysql_error($con);
			}
		
		
		
		}
		
			
		unset($_SESSION['errno_lst']);
		unset($_SESSION['errval_lst']);
		unset($_SESSION['errmsg_lst']);
	
	
	
		if($err_flg)
		{
		$_SESSION['errval_lst'] = $errval_lst;
		$_SESSION['errno_lst'] = $errno_lst;
		$_SESSION['errmsg_lst'] = $errmsg_lst;
		}
		
		
		
		
		
			
		header("location: admin_updsucc.php?cat=fac");	 
		 
}

?>