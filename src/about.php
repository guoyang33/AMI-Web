<?php
/* 
 * about.php
 * 關於頁面
 */

require_once 'html_head.php';
require_once 'utils.php';

$section_html = '';
foreach ($content['sections'] as $section) {
    // 文章 HTML
    $section_html .= '
    <section>
        <header class="about-info">
            <h2 class="about-title">' . $section['title'] . '</h2>
        </header>
    ';
    if ($section['type'] == 'list') {
        $section_html .= implode("\n", $section['list']);
    } else {
        $section_html .= '<p>' . $section['text'] . '</p>';
    }
    $section_html .= '
    </section>
    ';
}

echo '
<body>
    <div id="about" class="big-bg">
';
html_body_header($info);
echo '
        <div class="wrapper">
            <h2 class="page-title">' . $content['title'] . '</h2>
        </div><!-- /.wrapper -->
';
// echo '
//     <div class="about-contents wrapper">
// ';
echo $section_html;
// echo '
//     </div><!-- /.about-contents -->
// ';
html_body_footer($info);
echo '
    </div><!-- /#about -->
</body>
';
?>