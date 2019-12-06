<?php

require_once 'phpQuery/phpQuery/phpQuery.php';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://www.rbt.ru/');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

$result = curl_exec($curl);
$pq= phpQuery::newDocument($result);
$stmt = $pq->find(".catalogue-info__column");
//var_dump($stmt);
$cats = $stmt->html();
print_r($cats);
//foreach ($cats as $cat) {
//    $pqCat = pq($cat);
//    echo $pqCat->text();    
//}