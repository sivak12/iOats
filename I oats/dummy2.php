<?php

$str = $_POST['txt1'];
$lst = explode("\n",$str);
echo $lst;
foreach($lst as $val)
	echo "itm:".$val."<--";

?>