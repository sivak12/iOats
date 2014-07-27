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
			//$pword = genPass($id.$name.$email); 
			$pword = "isbrblr";
			$query = "INSERT INTO faculty_det (name, email,password)
					 VALUES ('$name', '$email' ,'$pword')";
			$result = mysql_query($query);	
		
			
			if(!$result)
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