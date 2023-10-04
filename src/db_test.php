<?php
/*
 * db_test.php
 * 資料庫連線測試
 */
require_once 'connect_db.php';

$sth = $dbh->prepare("SHOW TABLES");
$sth->execute();
$tables = $sth->fetchAll(PDO::FETCH_ASSOC);
print_r($tables);

?>