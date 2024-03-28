<?php
/*
 * db_test.php
 * 資料庫連線測試
 */
require_once 'connect_db.php';

echo password_hash('pass1234', PASSWORD_DEFAULT);
// 正確使用 hash前段不能少
var_dump(password_verify('pass1234', '$2y$10$4K2xPt82OC.3LGZKqUSDTOIE6O1NTKjP7endKr2FELDMHR4jji156'));
// 去掉 hash前段會錯誤
var_dump(password_verify('pass1234', '3LGZKqUSDTOIE6O1NTKjP7endKr2FELDMHR4jji156'));

var_dump(PASSWORD_DEFAULT);

?>