<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
	<textarea name="text1" id="" cols="30" rows="10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo iusto placeat aliquid tempore harum similique, quo deleniti, velit eum labore est a consectetur aut cum. Hic quo, nobis aspernatur iste.</textarea>
	<textarea name="text2" id="" cols="30" rows="10">sit amet adipisicing elit</textarea><br>
	<button id='action'>ACTION</button>

	<div class="t1"></div>
	<div class="t2"></div>

<script>
	$(document).ready(function(){
		var text1 = $("[name=text1]").html();
		var text2 = $("[name=text2]").html();
		
		$('#action').click(function(){
			$.ajax({
				url:'xn1_proc.php',
				// dataType:'JSON',
				method:'POST',
				data:({'text1':text1,'text2':text2}),
				success:function(d){
					// var u = d;
					// var d = JSON.parse(d);
						console.log(d);
					
					$(".t1").html(d);
				}

			})
		})
	})

</script>
</body>
</html>