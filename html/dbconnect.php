<?php
try {
	$dbuser = isset($_ENV["MYSQL_USERNAME"]) ? $_ENV["MYSQL_USERNAME"] : "bbsuser";
	$dbpass = isset($_ENV["MYSQL_PASSWORD"]) ? $_ENV["MYSQL_PASSWORD"] : "bbsuser";
	$dbname = isset($_ENV["MYSQL_DATABASE"]) ? $_ENV["MYSQL_DATABASE"] : "bbsuser";
	$dbhost = isset($_ENV["MYSQL_SERVER"])   ? $_ENV["MYSQL_SERVER"]   : "db";

    $db = new PDO('mysql:dbname='.$dbname .';host='.$dbhost .';charset=utf8', $dbuser, $dbpass);
} catch (PDOException $e) {
    echo 'DB接続エラー： ' . $e->getMessage();
}
?>