<?php 
function query($query){
	$conn = mysqli_connect("localhost","root","","myworld") or die(mysqli_connect_error());
	$res = mysqli_query($conn,$query) or die(mysqli_error());
	if(stripos($query, "SELECT")===0){
		return mysqli_fetch_all($res,MYSQLI_ASSOC);
	}
	else return $res;
}

$res =query("SELECT co.name as qaxaq,COUNT(ci.name) as qanak FROM `country` as co JOIN city as ci ON co.code = ci.CountryCode WHERE Continent = 'Asia' GROUP BY co.name ORDER BY co.region ASC,COUNT(ci.name) DESC");
// echo "<pre>";
// print_r($res);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="2" width="300">
		<tr style="color:green">
			<td>QAXAQ</td>
			<td>QANAK</td>
		</tr>
	<?php foreach ($res as $val) { ?>
		<tr>
		<?php foreach ($val as $v) { ?>
			<td><?php echo $v ?></td>
		<?php } ?>	
		</tr>
	<?php } ?>
	</table>
</body>
</html>