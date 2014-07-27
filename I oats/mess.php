

<?php
require_once "Mail.php";
			$name = "siva";
			$email = "siva.c24@gmail.com";
			$from = "Admin <systems@isbr.in>";
			$to = $email;
			$subject = "Online ISBR Test - User Details";
			$body = "Dear Student,\n";
			$body = $body."You are successfully registered with the Online Tests of ISBR and your user details are.. \n";
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
			}
			else 
			{
				echo("<p>Message successfully sent!</p>");
			}
			
?>