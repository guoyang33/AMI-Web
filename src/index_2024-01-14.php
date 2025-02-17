<?php
/* 
 * index.php
 * 入口網頁(首頁)
 */

// require_once 'html_head.php';
require_once 'utils.php';

header("Content-Type: text/html; charset=utf-8");
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
$lang_dict = get_lang_dict();

echo '
<!DOCTYPE html>
<html lang="' . $lang_dict[$lang]['html_lang'] . '">
    <head>
        <meta charset="utf-8">
        <meta name="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="' . $info['description'] . '" />
        <title>' . $info['title'] . '</title>
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
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    </head>
';

echo '
    <body>
        <header id="header" class="header fixed-top d-none">
            <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
                <a href="index.php" class="logo d-flex align-items-center">
                    <img class="logo" src="' . $info['logo'] . '" alt="' . $info['logo_alt'] . '">
                </a>
                <nav class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto active" href="#home">Home</a></li>
                        <li><a class="nav-link scrollto" href="#about">About</a></li>
                        <li><a class="nav-link scrollto" href="#products">Products</a></li>
                        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                        <li><a class="nav-link scrollto" href="#news">news</a></li>
                    </ul>
                    <i class="bi mobile-nav-toggle bi-list"></i>
                </nav><!-- .navbar -->


                <div class="header-function-bar d-none">
                    <div class="dropdown dropdown-language-switch">
                        語言：
                        <button class="btn dropdown-toggle border" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="dropdown-text">Language</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="?lang=zh_TW">繁體中文</a></li>
                            <li><a class="dropdown-item" href="?lang=en">English</a></li>
                        </ul>
                    </div>
                    <nav>
                        <ul class="main-nav">
';
foreach ($info['header']['nav'] as $nav_item) {
echo '
                            <li>
                                <a href="' . $nav_item['link'] . '">' . $nav_item['text'] . '</a>
                            </li>
';
}
echo '
                        </ul>
                    </nav>
                </div>
            </div>
        </header><!-- /.page-header -->
';
/* ===========================================About=========================================== */
echo '
        <section id="about">
            <h1>' . $content['about']['title'] . '</h1>
';
foreach ($content['about']['articles'] as $article) {
    echo '
            <article>
                <h2>' . $article['title'] . '</h2>
    ';
    if ($article['type'] == 'text') {
        echo '
                <p>' . $article['text'] . '</p>
        ';
    } else if ($article['type'] == 'list') {
        foreach ($article['list'] as $list_item) {
            echo $list_item;
        }
    } else if ($article['type'] == 'image') {
        echo '
                <img src="' . $article['src'] . '" alt="' . $article['alt'] . '">
        ';
    }
    echo '
            </article>
    ';
}
echo '
        </section><!-- /#about -->
';
/* ===========================================Products=========================================== */
echo '
        <section id="products">
            <h1>' . $content['products']['title'] . '</h1>
';
foreach ($content['products']['products'] as $product) {
    echo '
            <article class="' . $product['style_class'] . '">
                <h2>' . $product['title'] . '</h2>
    ';
    if (in_array('list', $product['type'])) {       // 條列式內容
        foreach ($product['list'] as $list_item) {
            echo $list_item, "\n";
        }
    }
    if (in_array('pro_or_pub', $product['type'])) {     // 身份選項 僅有兩個按鈕
        echo '
                <div class="row">
        ';
        echo '
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#prod-1-pro-confirm-modal">產品</button>
                </div>
        ';
    }
    echo '
                <div class="modal fade" id="prod-1-pro-confirm-modal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-title"產品</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div><!-- /.modal-header -->
                            <div class="modal-body">
                                <p>你確定要選擇產品嗎？</p>
                            </div><!-- /.modal-body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                                <button type="button" class="btn btn-primary">確定</button>
                            </div><!-- /.modal-footer -->
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
    ';
    echo '
            </article>
    ';
}
echo '
        </section><!-- /#products -->
';

echo '
        <div id="home" class="big-bg d-none">
            <div class="home-content wrapper">
                <h2 class="page-title">' . $content['title'] . '</h2>
                <p>' . $content['text'] . '</p>
                <a class="button" href="' . $content['button']['link'] . '">' . $content['button']['text'] . '</a>
            </div><!-- /.home-content -->
        </div><!-- /#home -->
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/dist/js/main.js"></script>
    </body>
</html>
';
?>