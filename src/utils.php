<?php
/*
 * utils.php
 * 通用工具函数
 */
define('LANG_DICT', array(
    'zh_TW' => '繁體中文',
    'en' => 'English'
));
// 召喚語言切換
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
// 召喚亮色模板語言切換
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