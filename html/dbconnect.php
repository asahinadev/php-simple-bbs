<?php
try {
    $db = new PDO('mysql:dbname=bbsuser;host=db;charset=utf8', 'bbsuser', 'bbsuser');
} catch (PDOException $e) {
    echo 'DB接続エラー： ' . $e->getMessage();
}
?>