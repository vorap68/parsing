<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!--Подключаем библиотеку-->
	<script src="js/jquery-2.2.3.min.js"></script>
</head>
<body>
<p class="www">Абзац.</p>
<p class="www">Абзац.</p>
<p class="www">Абзац.</p>
<p>Абзац.</p>
<input type="submit" >
<script>
$(document).ready(function(){
	$('input').click(function()){
		$(".www").html('!!!');
	}
	//$(".www").html('!!!');
//alert('yes');	
   // $("input").click(function(event){
   //    alert("Поздравляем! Вы починили код!");
   // });

});


</script>
</body>
