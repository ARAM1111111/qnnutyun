<?php
function query($query){
	$conn = mysqli_connect("localhost","root","","myflot") or die(mysqli_connect_error());
	$res = mysqli_query($conn,$query) or die(mysqli_error());
	if(stripos($query, "SELECT")===0){
		return mysqli_fetch_all($res,MYSQLI_ASSOC);
	}
	else return mysqli_query($conn,$query);
}
$result = query("SELECT * FROM `trip` ORDER BY trip_no DESC");

$table = "<table>";
$table.="<tr>";
$table.="<td>trip_no</td><td>ID_comp</td><td>plane</td><td>town_from</td><td>town_to</td><td>time_out</td><td>time_in</td>";
$table.="</tr>";
$table.="<tr>";
$table.="<td><input type='text' name='trip' disabled></td><td><input type='text' name='ID_comp'></td><td><input type='text' name='plane'></td><td><input type='text' name='town_from'></td><td><input type='text' name='town_to'></td><td><input type='text' name='time_out'></td><td><input type='text' name='time_in'></td><td><button id='btn'>ADD</button></td>";
$table.="</tr>";
foreach ($result as $value) {
	$id = $value['trip_no'];
	$table.="<tr id=$id>";
	foreach ($value as $val) {
		$table.="<td contenteditable='true'>$val</td>";
	}
	$table.="<td id='edit' style='cursor:pointer'>Edit</td><td id='del' style='cursor:pointer'>Delete</td>";
$table.="</tr>";
}    
$table.="</table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>   
      <style>
       td{
       	border:solid green 1px;
       }
    </style>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	echo $table;
	?>
	<script>
	$(document).ready(function(){

		$('#btn').click(function(){
			var ID_comp = $("[name=ID_comp]").val();
			var plane = $("[name=plane]").val();
			var town_from = $("[name=town_from]").val();
			var town_to = $("[name=town_to]").val();
			var time_out = $("[name=time_out]").val();
			var time_in = $("[name=time_in]").val();

			$.ajax({
				url:"xn4_proc.php",
				method:"POST",
				data:{"ID_comp":ID_comp,"plane":plane,"town_from":town_from,"town_to":town_to,"time_out":time_out,"time_in":time_in,action:"add"},
				success:function(d){
					location.reload();
					// console.log(d);
				}
			})
		});	

		$("table").delegate("#del", "click", function(){
    		var id = $(this).parent().attr("id");
    		var action = $(this).html();

    		$.ajax({
    			url:"xn4_proc.php",
    			method:"POST",
    			data:{"action":action,"id":id},
    			success:function(v){
    				location.reload();
    				// console.log(v);
    			}
    		})
			 

		});

		$("table").delegate("#edit", "click", function(){
    		var id = $(this).parent().attr("id");
    		var action = $(this).html();

    		$.ajax({
    			url:"xn4_proc.php",
    			method:"POST",
    			data:{"action":action,"id":id,"ID_comp":ID_comp,"plane":plane,"town_from":town_from,"town_to":town_to,"time_out":time_out,"time_in":time_in},
    			success:function(v){
    				location.reload();
    				// console.log(v);
    			}
    		})			 
		});

	})


	</script>
</body>
</html>