<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<input type="text" name="text">
	<button>SEND</button>
	<div id="table"></div>
<script>
	$(document).ready(function(){
		$("button").click(function(){
			var text = $("[name=text]").val();
			//location.reload();
			$.ajax({
				url:"xn2_proc.php",
				method:"POST",
				cache:false,
				data:({'text':text}),
				success:function(d){
					
					//location.reload();
					$("#table").append(d);
				}
			})
		})
	});


</script>

</body>
</html>