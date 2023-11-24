<!DOCTYPE html>
<?php
/*
 * html_head.php
 */
header("Content-Type: text/html; charset=utf-8");
require_once 'utils.php';
$lang = 'en';
if (isset($_GET['lang'])) {
    setcookie('lang', $_GET['lang'], time() + 3600 * 24 * 30, '/');
    header('Location: ' . basename($_SERVER['PHP_SELF']));
}
if (isset($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}

// 載入info文案
$info = load_info_json($lang);
$content = load_content_json($lang);

echo '
<html lang="' . LANG_DICT[$lang]['html_lang'] . '">
<head>
<meta charset="utf-8">
<meta name="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="' . $info['description'] . '" />
<title>' . $info['title'] . '</title>
<link rel="icon" href="' . $info['icon'] . '" type="image/x-icon" />

<!-- 重置網頁CSS設定 -->
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
<!-- 載入Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- 自定義CSS設定 -->
<link href="assets/dist/css/style.css" rel="stylesheet" cache="false" />
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
';
?>