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
';
web_header($info);
echo '
        <div class="home-content wrapper">
            <h2 class="page-title">' . $content['title'] . '</h2>
            <p>' . $content['text'] . '</p>
            <a class="button" href="' . $content['button']['link'] . '">' . $content['button']['text'] . '</a>
        </div><!-- /.home-content -->
    </div><!-- /#home -->
';

?>