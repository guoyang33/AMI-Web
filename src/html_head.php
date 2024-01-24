<!DOCTYPE html>
<?php
/*
 * html_head.php
 */
header("Content-Type: text/html; charset=utf-8");
require_once 'utils.php';

$lang_dict = get_lang_dict();
$lang = 'en';
if (isset($_GET['lang'])) {
    setcookie('lang', $_GET['lang'], time() + 3600 * 24 * 30, '/');
    header('Location: ' . basename($_SERVER['PHP_SELF']));
}
if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}

// 載入info文案

echo '
<html lang="' . $lang_dict[$lang]['html_lang'] . '">
    <head>
        <meta charset="utf-8">
        <meta name="author" content="CYouLiao">
        <meta name="description" content="AWESOME Medical Inc. (abbr. as AMI), a medical in-vitro device (IVD) and medicine import/ distribution company based in Kaohsiung city, Taiwan.">
        <meta name="keywords" content="AWESOME Medical Inc., AMI, medical">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Awesome Medical</title>
        <link rel="apple-touch-icon" sizes="57x57" href="./assets/icon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="./assets/icon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="./assets/icon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="./assets/icon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="./assets/icon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="./assets/icon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="./assets/icon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="./assets/icon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="./assets/icon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="./assets/icon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="./assets/icon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/icon/favicon-16x16.png">
        <link rel="manifest" href="./assets/icon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!-- 重置網頁CSS設定 -->
        <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
        <!-- 載入Bootstrap 5 -->
        <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- 自定義CSS設定 -->
        <link href="assets/dist/css/style.css" rel="stylesheet" cache="false" />
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
';
?>