<?php
/*
 * utils.php
 * 通用工具函数
 */
define('CONTENT_JSON_DIR', 'content_json/');
define('LANG_DICT', array(
    'zh_TW' => '繁體中文',
    'en' => 'English'
));
// 載入文案content json；定義CONTENT_JSON常數及返回該常數
function load_content_json() {
    global $page;
    global $lang;
    if (!defined('CONTENT_JSON')) {
        define('CONTENT_JSON', json_decode(file_get_contents("{CONTENT_JSON_DIR}.{$page}.json"), true)[$lang]);
    }
    return CONTENT_JSON[$lang];
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
    echo LANG_DICT[$lang];
    echo '</button>';
    echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
    echo '<li><a class="dropdown-item" href="' . $page . '.php?lang=zh_TW">繁體中文</a></li>';
    echo '<li><a class="dropdown-item" href="' . $page . '.php?lang=en">English</a></li>';
    echo '</ul>';
    echo '</div>';
}
?>