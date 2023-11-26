<?php
/*
 * utils.php
 * 通用工具函数
 */
define('CONTENT_JSON_DIR', 'content-json/');
define('LANG_DICT', array(
    'zh_TW' => array(
        'name' => '繁體中文',
        'code' => 'zh_TW',
        'html_lang' => 'zh-Hant'
    ),
    'en' => array(
        'name' => 'English',
        'code' => 'en',
        'html_lang' => 'en'
    )
));

// 語言參數偵測
function lang_param_detect() {
    global $page;
    if (!file_exists($page . '.php')) {
        $page = 'index';
    }
    if (!isset($_GET['lang'])) {
        header('Location: ' . $page . '.php?lang=zh_TW');
        exit;
    }
    if (!key_exists($_GET['lang'], LANG_DICT)) {
        header('Location: ' . $page . '.php?lang=zh_TW');
        exit;
    }
}
// 載入info.json
function load_info_json($lang) {
    return json_decode(file_get_contents(CONTENT_JSON_DIR . $lang . '/info.json'), true);
}
// 載入文案content json；定義CONTENT_JSON常數及返回該常數
function load_content_json($lang) {
    $page = basename($_SERVER['PHP_SELF'], '.php');
    if (!defined('CONTENT_JSON')) {
        define('CONTENT_JSON', json_decode(file_get_contents(CONTENT_JSON_DIR . $lang . '/' . $page . '.json'), true));
    }
    return CONTENT_JSON;
}
// 顯示語言切換選單
function show_lang_switch() {
    echo '
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
    ';
}
// 顯示網頁header
function web_header($info) {
    echo '
    <header class="page-header wrapper">
        <h1>
            <a href="index.php">
                <img class="logo" src="' . $info['logo'] . '" alt="' . $info['logo_alt'] . '">
            </a>
        </h1>
    ';
    show_lang_switch();
    echo '
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
    </header>
    ';

}
?>