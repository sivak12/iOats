

<?php
$data = array();

function add_person( $rollno, $name, $email )
 {
  global $data;
  
  $data []= array(
  
  'rollno' => $rollno,
  'name' => $name,
  'email' => $email,
  
  );
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
		
		if( !($first))
		{
			$index = 1;
			$cells = $row->getElementsByTagName( 'Cell' );
			foreach( $cells as $cell )
			{ 
				$ind = $cell->getAttribute( 'Index' );
				if ( $ind != null ) $index = $ind;

				if ( $index == 1 ) $rollno = $cell->nodeValue;
				if ( $index == 2 ) $name = $cell->nodeValue;
				if ( $index == 3 ) $email = $cell->nodeValue;
				
				$index += 1;
			}
					
			add_person( $rollno, $name, $email);

		}
		$first = false;
	
	}
	
	
	$con = mysql_connect("localhost","root","");
	if (!$con)
 	{
  		die('Could not connect: ' . mysql_error());
  	}
	mysql_select_db("oats_p3", $con);

	
	$sect =  $_POST['lst_sect'];
	foreach($data as $row)
	{
		$rollno = $row['rollno'];
		$name =  $row['name'];
		$email =  $row['email'];
		$pword = genPass($rollno.$name.$email); 
		
		$query = "INSERT INTO student_det (rollno,name, email,password,sect_id)
				 VALUES ( '$rollno','$name', '$email' ,'$pword', '$sect')";
		$result = mysql_query($query);	
	
	
		/******* mail username & pword *******/
	
		$to = $email;
		$subject = "Online Exam - User details";
		$message = "Username:".$email."\nPassword:".$pword;
		//$from = "ISBR Admin";
		//$headers = "From: $from";
		$from = "siva.c24@gmail.com";
		$headers = "From: $from";
		
		mail($to,$subject,$message,$headers);
		echo "Mail Sent.";
	
	
	
	
	}
	
		
	
	 

}
?>