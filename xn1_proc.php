<?php 
$text1 = $_POST['text1'];
$text2 = $_POST['text2'];


$t1 = preg_replace("/\,+/", " ,", $text1);
$t1 = preg_replace("/\.+/", " .", $t1);
$t1 = explode(' ', $t1);
$t2 = preg_replace("/\,+/", " ,", $text2);
$t2 = preg_replace("/\.+/", " .", $t2);
$t2 = explode(' ', $t2);

$t = array_intersect($t1, $t2);



foreach ($t1 as $v) {
	if(in_array($v,$t))
		$v= "<span style='color:green'>$v</span>";		
		echo  $v." ";
}

foreach ($t2 as $v) {
	if(in_array($v,$t))
		$v= "<span style='color:green'>$v</span>";
	 echo $v;
}


?>