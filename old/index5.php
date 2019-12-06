<?php
require_once 'phpQuery/phpQuery/phpQuery.php';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL,'http://old.code.mu/exercises/advanced/php/parsing/rabota-s-bibliotekoj-phpquery-v-php/1/1.php');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);
//$url = 'C:/WebServers/111.htm';
$result = curl_exec($curl);
//var_dump($result);

$pq = phpQuery::newDocument($result);
$elems = $pq->find('#content a.www');
//$text = $elem->html();
//var_dump($text);
foreach($elems as $elem){
    $pqElem = pq($elem);
    $mas[] = $pqElem -> text();
    }
    echo '<pre>'.print_r($mas,true).'</pre>';


?>