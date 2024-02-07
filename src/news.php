<?php

require_once 'connect_db.php';
include 'html_head.php';
$content_path = 'content-json/' . $lang . '/news.json';
$content = json_decode(file_get_contents($content_path), true);

$limit = 10;
$offset = 0;
if (isset($_GET['offset'])) {
    $offset = intval($_GET['offset']);
}

echo '
    <body>
';
html_body_header(false, $lang);
echo '
        <main>
            <div class="m-3">
                <h1>' . $content['title'] . '</h1>
';
show_news($dbh, $lang, $limit, $offset, true);
echo '
            </div>
        </main><!-- #news -->
';
html_body_footer();
echo '
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/dist/js/main.js"></script>
    </body>
</html>
';
?>