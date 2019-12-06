<?php

require_once 'function.php';
require_once 'phpQuery/phpQuery/phpQuery.php';

function curlOut($url){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);
    return curl_exec($curl);
}

function linkin($url,$pdo){
$result =  curlOut($url);
$pq = phpQuery::newDocument($result);
$linksFind = $pq->find('a');
$mainFind = $pq->find('#main p');
$mainText = $mainFind->text();
echo $url.'<br>';
$sql = "UPDATE `links` SET  `content`=:content  WHERE `link`=:link";
$stmt = $pdo->prepare($sql);
$stmt->execute(array('link'=>$url,'content'=>$mainText));
$link=[];
foreach ($linksFind as $link){
    $pqLink = pq($link);
    $linkHref = $pqLink->attr('href');
    //echo $linkHref;
    $sql = "INSERT INTO `links` SET `link`=:link";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array('link'=>'http://old.code.mu/exercises/advanced/php/parsing/poetapnyj-parsing-i-metod-pauka/2/'.$linkHref));
}
return ;
}

$linksCurrent = $pdo->prepare("SELECT `link` FROM `links`");
$linksCurrent->execute();
$arrLink=[];
//var_dump($arrLink);

 while($row = $linksCurrent->fetchColumn()){
    $linkCurrent = 'http://old.code.mu/exercises/advanced/php/parsing/poetapnyj-parsing-i-metod-pauka/2/'.$row;
    //echo $linkCurrent.'<br>';
    linkin($linkCurrent, $pdo);
}
 
$url ='http://old.code.mu/exercises/advanced/php/parsing/poetapnyj-parsing-i-metod-pauka/2/index1.php';
 
 linkin($url,$pdo);

