<?php

$host = '127.0.0.1';
$dbname = 'forma';
$charset = 'utf8';
$dsn  = "mysql:host=$host;dbname=$dbname;charset=$charset";
$pdo = new PDO($dsn,'root','dmitry13');

function debug($arr){
    echo '<pre>'.print_r($arr,true).'</pre>';
}