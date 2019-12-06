<?php
require_once 'phpQuery/phpQuery/phpQuery.php';
$url = 'http://old.code.mu/exercises/advanced/php/parsing/rabota-s-bibliotekoj-phpquery-v-php/1/1.php';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://hramy.ru/regions/city_abc.htm');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);

$pq = phpQuery::newDocument($result);
$links = $pq->find('#table2 tr');
$count = $links->count();
echo '<table>';
for($i = 1; $i < $count; $i++){
    echo '<tr BORDER >';
  $city = $pq->find("#table2 tr:eq($i) td:eq(0)");
    $distr = $pq->find("#table2 tr:eq($i) td:eq(1)");
    $regio = $pq->find("#table2 tr:eq($i) td:eq(3)");
    echo '<td style=" border: 1px solid #fff;">'.$text_city = $city->text();
    echo '<td style=" border: 1px solid #fff;">'.$text_distr = $distr->text();
    echo '<td style=" border: 1px solid #fff;">'.$text_regio = $regio->text();
    echo $text.'<br>';
    echo '</tr>';
}
echo '</table>';
//$text = iconv('windows-1251', 'UTF-8', $text);
//echo '<pre>'.print_r($text, true).'</pre>';




