<?php
function debug($arr){
	echo '<pre>'.print_r($arr,true).'</pre>';
}

$host = 'localhost';
$db = 'main';
$charset='utf8';
$dsn="mysql:host=$host;dbname=$db;charset=$charset";
$user = 'root';
$password = 'dmitry13';
$pdo =new PDO($dsn,$user,$password);
$stmt = $pdo->query("SELECT * FROM `category`");
$id = array();
// while($result_id = $stmt->fetch()){
// 	$id[] = $result_id['id'];
// }

$mass=[];
while($result = $stmt->fetch()){
	$itog = array_search($result['parent_id'], $id);
	//var_dump($itog);
	if(!($itog === false && is_bool($itog))) continue; 
	 $mass[] = $result;
	$id[] = $result['parent_id'];
	// print_r($id);
	// echo'<br>';
}
 debug($id);
 debug($mass);

?>