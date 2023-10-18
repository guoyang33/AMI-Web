<?php
/*
 * utils.php
 * 通用工具函数
 */
define('CONTENT_JSON_DIR', 'content-json/');
define('LANG_DICT', array(
    'zh_TW' => array(
        'name' => '繁體中文',
        'code' => 'zh_TW'
    ),
    'en' => array(
        'name' => 'English',
        'code' => 'en'
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
// 載入文案content json；定義CONTENT_JSON常數及返回該常數
function load_content_json() {
    global $page;
    global $lang;
    if (!defined('CONTENT_JSON')) {
        define('CONTENT_JSON', json_decode(file_get_contents(CONTENT_JSON_DIR.$page . '.json'), true)[$lang]);
    }
    return CONTENT_JSON;
}
// 召喚語言切換選單
function summon_lang_switch($lang, $page) {
    echo '<div class="dropdown mx-3">';
    echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">';
    echo $lang;
    echo '</button>';
    echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
    echo '<li><a class="dropdown-item" href="' . $page . '.php?lang=zh_TW">繁體中文</a></li>';
    echo '<li><a class="dropdown-item" href="' . $page . '.php?lang=en">English</a></li>';
    echo '</ul>';
    echo '</div>';
}
// 召喚亮色模板語言切換選單
function summon_lang_switch_light($lang, $page) {
    echo '<div class="dropdown mx-3">';
    echo '<button class="btn btn-light border-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">';
    echo LANG_DICT[$lang]['name'];
    echo '</button>';
    echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
    echo '<li><a class="dropdown-item" href="' . $page . '.php?lang=zh_TW">繁體中文</a></li>';
    echo '<li><a class="dropdown-item" href="' . $page . '.php?lang=en">English</a></li>';
    echo '</ul>';
    echo '</div>';
}
?>