<?php
/* 
 * about.php
 * 關於頁面
 */

require_once 'html_head.php';
require_once 'utils.php';

$article_html = '';
$aside_html = '<ul class="sub-menu">';
foreach ($content['articles'] as $article) {
    // 文章 HTML
    $article_html .= '
    <article id="' . $article['id'] . '" class="article-block d-none">
        <header class="about-info">
            <h2 class="about-title">' . $article['title'] . '</h2>
        </header>
        <p>
    ';
    if ($article['type'] == 'list') {
        $article_html .= implode('</p><p>', $article['list']);
    } else {
        $article_html .= $article['text'];
    }
    $article_html .= '
        </p>
    </article>
    ';

    // 邊欄 HTML
    $aside_html .= '
    <li>
        <a class="aside-item" href="#' . $article['id'] . '">' . $article['title'] . '</a>
    </li>
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
    </div><!-- /#about -->
    <div class="about-contents wrapper">
';
echo $article_html;
echo '  
        <aside>
';
echo $aside_html;
echo '
        </aside>
    </div><!-- /.about-contents -->
';
html_body_footer($info);
?>
    <script type="text/javascript">
        $(document).ready(function() {
            // show article
            $('.article-block').first().removeClass('d-none');
        });
        $('.aside-item').click(function() {
            $('.article-block').addClass('d-none');
            $($(this).attr('href')).removeClass('d-none');
            // scroll to top
            $('html, body').animate({
                scrollTop: 0
            }, 500);
        });
    </script>
</body>