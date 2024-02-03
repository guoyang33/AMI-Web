<?php
/*
 * utils.php
 * 通用工具函数
 * 
 * Changelog:
 * --為配合PHP5伺服器，常數將不在函數中宣告 2023-11-30
 */
define('CONTENT_JSON_DIR', 'content-json/');

function get_lang_dict() {
    return array(
        'zh_TW' => array(
            'name' => '繁體中文',
            'code' => 'zh_TW',
            'html_lang' => 'zh-tw'
        ),
        'en' => array(
            'name' => 'English',
            'code' => 'en',
            'html_lang' => 'en'
        )
    );
}

function get_nav_dict() {
    return array(
        'about' => array(
            'name' => array(
                'zh_TW' => '關於我們',
                'en' => 'About'
            ),
            'id' => '#about',
            'href' => '/about.php'
        ),
        'products' => array(
            'name' => array(
                'zh_TW' => '產品介紹',
                'en' => 'Products'
            ),
            'id' => '#products',
            'href' => '/products.php'
        ),
        'news' => array(
            'name' => array(
                'zh_TW' => '最新消息',
                'en' => 'News'
            ),
            'id' => '#news',
            'href' => '/news.php'
        ),
        'contact' => array(
            'name' => array(
                'zh_TW' => '聯絡我們',
                'en' => 'Contact'
            ),
            'id' => '#contact',
            'href' => '/contact.php'
        ),
        'links' => array(
            'name' => array(
                'zh_TW' => '友站連結',
                'en' => 'Links'
            ),
            'id' => '#links',
            'href' => '/links.php'
        )
    );
}

// 語言參數偵測
function lang_param_detect() {
    global $page;

    $lang_dict = get_lang_dict();
    if (!file_exists($page . '.php')) {
        $page = 'index';
    }
    if (!isset($_GET['lang'])) {
        header('Location: ' . $page . '.php?lang=zh_TW');
        exit;
    }
    if (!key_exists($_GET['lang'], $lang_dict)) {
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
    return json_decode(file_get_contents(CONTENT_JSON_DIR . $lang . '/' . $page . '.json'), true);
}
// 顯示網頁header
function html_body_header($is_index = false, $lang = 'en') {
    $nav_dict = get_nav_dict();
    echo '
    <header>
        <div class="header-logo" onclick="location.href=\'index.php\'"></div>
        <div class="header-nav">
            <nav class="navbar navbar-expand">
                <ul class="navbar-nav">
    ';
    foreach ($nav_dict as $nav) {
        if ($is_index) {
            echo '
                        <li class="nav-item">
                            <a class="nav-link" href="' . $nav['id'] . '">' . $nav['name'][$lang] . '</a>
                        </li>
            ';
        } else {
            echo '
                        <li class="nav-item">
                            <a class="nav-link" href="' . $nav['href'] . '">' . $nav['name'][$lang] . '</a>
                        </li>
            ';
        }
    }
    echo '
                </ul>
            </nav>
        </div>
        <div class="header-lang">
    ';
    switch ($lang) {
        case 'zh_TW':
            echo '
            <a href="?lang=en">English</a>
            ';
            break;
        default:
            echo '
            <a href="?lang=zh_TW">切換至中文</a>
            ';
    }
    echo '
        </div>
    </header>
    ';
}
// 顯示網頁footer
function html_body_footer($lang = 'en') {
    switch ($lang) {
        case 'zh_TW':
            echo '
            <footer>
                <p>&copy; 2023 Awesome Medical Inc.</p>
                <p>電話: 07-312-0079</p>
                <p>傳真: 07-312-0079</p>
                <p>地址: 80746高雄市三民區同盟三路246巷36號1樓</p>
            </footer>
            ';
            break;
        default:
            echo '
            <footer>
                <p>&copy; 2023 Awesome Medical Inc.</p>
                <p>Tel: +886-7-312-0079</p>
                <p>Fax: +886-7-312-0079</p>
                <p>Address: 1F., No. 36, Ln. 246, Tongmeng 3rd Rd., Sanmin Dist., Kaohsiung City 80746, Taiwan (R.O.C.)</p>
            </footer>
            ';
    }
}
?>