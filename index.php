<?php

$to = "user@com.ua";
$subject = "The new themes";
$headers = 'Content-type: text/html; charset=utf-8';
$header .= "From:user@com.ua \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";
require_once 'phpQuery/phpQuery/phpQuery.php';
spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class . '.php');
    if (file_exists($path)) {
	require $path;
    }
});


$pdo = new Db;
$curl = new Parser;
$curl->set(CURLOPT_FOLLOWLOCATION, 1);

// Парсинг ссылок с начальной страницы и запись их в БД
function parserPages($url, $curl, $pdo) {
    $result = $curl->exec($url);
    $pq = phpQuery::newDocument($result);
    foreach ($pq->find('.titleline .forumtitle a') as $value) {
	$pqHref = pq($value);
	$href = $pqHref->attr('href');
	$sql = "INSERT INTO `links` SET `link`=:link ";
	if (!$pdo->insLink($sql, $href))
	    echo "Вставка в БД не сработала";
    }
}

$urlFirst = 'http://www.html.by/';

parserPages($urlFirst, $curl, $pdo);
$stmt = $pdo->query(); //получение ссылок  главной стр из БД

while ($temp = $stmt->fetch()) {
    $url = 'html.by/' . $temp['link'];
    $start = 0;
    $end = 5; //предельное число страниц пагинации
    parserOnePage($url, $curl, $start, $end, $pdo, $to, $subject, $header);
}

function parserOnePage($url, $curl, $start, $end, $pdo, $to, $subject, $header) {
    if ($end > $start) {
	$result = $curl->exec($url);
	$pq = phpQuery::newDocument($result);
	foreach ($pq->find('.inner') as $value) {
	    $pqValue = pq($value);
	    $date = $pqValue->find('.author .label a')->attr('title');
	    $date = substr($date, -16);
	    $timestamp = strtotime($date);
	    if ((time() - $timestamp) < 6246400) {
		$message = $pqValue->find('.threadtitle a')->text();
		// echo "fresh date:&nbsp" . $date . "&nbsp текст:$message<hr>";
		$retval = mail($to, $subject, $message, $header);

		if ($retval == true) {
		    echo "Message sent successfully...";
		} else {
		    echo "Message could not be sent...";
		}
	    }
	}

	// Ссылка на след страницу пагинации
	$next = 'html.by/' . $pq->find('.threadpagenav .selected')->next()->find('a')->attr('href');

	//проверка счетчика(ограничителя страниц) пагинации
	if (!empty($next)) {
	    $start++;
	    parserOnePage($next, $curl, $start, $end, $pdo, $to, $subject, $header);
	}
    }
}
