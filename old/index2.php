<html>                                                                  
<head>                                                                
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">   
$(document).ready(function(){

$("#pmtog").css("color","green");
$("p.pr1").css("color","red");
$("[type=button]").css("color","#D2691E");
$("p.pmb1,p.pmb2,p.pmb3").css("color","blue");
$("#wrap1 p.pmtobr").css("color","brown");
$("[src='mountimg2.jpg']").css("borderStyle","solid");
$("[type=button],[type=submit]").css("color","red");

});                                           
</script>                                                          
</head>
<body> 
<p><b>Каждое задание отмеченное цифрой должно быть выполнено с помощью одной jQuery команды.</b></p>
<hr />
<p><b>1.</b></p>                                                        
<p id="pmtog">Покрасьте меня в зеленый цвет.</p>
<p><b>2.</b></p>
<h3 class="pr1">Мой цвет не должен быть изменен.</h3>
<p class="pr1">Покрасьте меня в красный цвет.</p>
<p><b>3.</b></p>
<input type="button" value="Покрасьте меня в оранжевый" />
<br /><br />
<input type="text" value="Мой цвет не должен быть изменен"/>
<br /><br />
<input type="submit" value="Мой цвет изменять не нужно"/>
<br /><br />
<p><b>4.</b></p>
<p class="pmb1">Покрасьте меня в синий.</p>
<p>Мой цвет не должен быть изменен.</p>
<p>Мой цвет не должен быть изменен.</p>
<p class="pmb2">Покрасьте меня в синий.</p>
<p>Мой цвет не должен быть изменен.</p>
<p class="pmb3">Покрасьте меня в синий.</p>
<p><b>5.</b></p>
<div id="wrap1">
<p>Мой цвет не должен быть изменен.</p>
<p class="pmtobr">Покрасьте меня в коричневый.</p>
</div>
<p class="pmtobr">Мой цвет не должен быть изменен.</p>
<p><b>6. Отобразите рамку вокруг третьего (слева) изображения. (Используйте команду css("borderStyle","solid")</b></p>
<img src="mountimg3.jpg" style="width:200px;">
<img src="mountimg1.jpg" style="width:200px;">
<img src="mountimg2.jpg" style="width:200px;">
<p><b>7. </b></p>
<div id="iwrap">
<input type="button" value="Покрасьте меня в красный" />
<br /><br />
<input type="text" value="Мой цвет не должен быть изменен"/>
<br /><br />
<input type="submit" value="Покрасьте меня в красный"/>
</div>
</body>
</html>
