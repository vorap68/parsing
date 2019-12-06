<?php
$host = '127.0.0.1';
$db ='forma';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$username = 'root';
$password = 'dmitry13';
$adress_site ='htttp://user/';
$pdo = new PDO($dsn, $username, $password);