<?php

require_once 'phpQuery/phpQuery/phpQuery.php';

$curl = curl_init();
curl_setopt($curl,CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl,CURLOPT_URL,'http://wildwolfs.ru/vidi-rus');
$result = curl_exec($curl);
//echo $result;

$pq = phpQuery::newDocument($result);
$names= $pq->find('.table0 a');
$links = $pq->find('.product-card-media__element');
//var_dump($links);
//$srcs = $links->attr('src');
//var_dump($srcs);

foreach ($names as $elem) {
    $pqElem = pq($elem);
    $link[] = $pqElem->attr('href');
    $name[] = $pqElem->text();
    
}
var_dump($link);
var_dump($name);

//foreach($links as $elem){
//    $pqElem = pq($elem);
//    $link[] = $pqElem->attr('src');
//}
//var_dump($link);
//var_dump($elemnew);

?>
