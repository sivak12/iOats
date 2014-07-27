<?php
session_start();
if(!session_is_registered("uname"))
{
header("location:../index.php");
}

  
      /* $file="report.xls";
   
      $test=$_POST['str'];
   
      //header("Content-type: application/vnd.ms-excel");
   
      //header("Content-Disposition: attachment; filename=$file");
   
      echo $test;*/
	  //echo $_SESSION['excel_tb'];
   
   	  
   
   
      $file="test.xls";
   
      //$test="<table border=1><tr><td>Cell 1</td><td>Cell 2</td></tr></table>";
   
     header("Content-type: application/vnd.ms-excel");
   
      header("Content-Disposition: attachment; filename=$file");
   
     echo $_SESSION['excel_tb'];
         
		 
		 ?>
   
   
   
   
