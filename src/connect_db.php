<?php
/*
 * connect_db.php
 * 資料庫連線
 */

date_default_timezone_set('Asia/Taipei');

$user = 'ami_root';
$pass = 'B2Lw4O/(9HQbSSfN';
$db = 'ami_web';
$host = 'localhost';
$port = 3306;
$dns = "mysql:host=$host;dbname=$db;port=$port;charset=utf8";
$dbh = new PDO($dns, $user, $pass);

$sth = $dbh->exec("SET CHARSET utf8");
$sth = $dbh->exec("SET NAMES utf8");
// print_r($dbh->errorInfo()); // debug

?>