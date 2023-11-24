<?php
/* 
 * index.php
 * 入口網頁(首頁)
 */

require_once 'html_head.php';
require_once 'utils.php';

echo '
<body>
    <div id="home" class="big-bg">
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

echo '
        <div class="home-content wrapper">
            <h2 class="page-title">' . $content['title'] . '</h2>
            <p>' . $content['text'] . '</p>
            <a class="button" href="' . $content['button']['link'] . '">' . $content['button']['text'] . '</a>
        </div><!-- /.home-content -->
    </div><!-- /#home -->
';

?>