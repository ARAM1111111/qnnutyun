<?php
// ============= FUNCTIONS ===============================
function table($a,$b){
	if(intval($a)<=0 || intval($b)<=0) return false;
	$table="<table border=1 width=300 height=300>";
	for ($i=1; $i <=$a ; $i++) { 
		$table.="<tr>";
		for ($j=1; $j <=$b ; $j++) { 
			$table.="<td></td>";
		}
		$table.="</tr>";
	}
	$table.="</table>";
	return $table;
}
function inp($input){
	return "<input type=$input name=$input>";
}
function color()
{
    $a =  sprintf( '#%02X%02X%02X', rand(0, 255), rand(0, 255), rand(0, 255) );
    return "<div style='width:100px;height:100px;border:1px solid black;background-color:$a'></div>";  
}
// ======================= END FUNCTIONS ===================================
$text = trim($_POST['text']);

if($reg = preg_match('/^table\([1-9],[1-9]\)$/', $text)){
	$reg_match = preg_match_all("/[1-9]/", $text,$matches);
	echo table($matches[0][0],$matches[0][1]);
}else if($reg = preg_match('/^input\([a-z]+\)$/', $text))
{
	$reg_match = preg_match_all("/(text)|(number)|(password)/", $text,$matches);
	echo inp($matches[0][0]);		
}else  echo color();

?>

