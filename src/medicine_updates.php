<?php

require_once 'connect_db.php';
include 'html_head.php';
$content_path = 'content-json/' . $lang . '/medicine_updates.json';
$content = json_decode(file_get_contents($content_path), true);

echo '
    <body>
';
html_body_header(false, $lang);
echo '
        <main>
            <div class="m-3">
                <h1>' . $content['medicine_information']['title'] . '</h1>
';
show_medicine_infomation($dbh, $lang);
echo '
            </div>
            <div class="m-3 mt-sm-5">
                <h1>' . $content['news']['title'] . '</h1>
';
show_news($dbh, $lang);
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