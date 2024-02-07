<?php

require_once 'connect_db.php';
include 'html_head.php';
// $content_path = 'content-json/' . $lang . '/news_detail.json';
// $content = json_decode(file_get_contents($content_path), true);

$news_id = $_GET['id'];
$sth = $dbh->prepare('SELECT * FROM news WHERE id = :id');
$sth->bindParam(':id', $news_id, PDO::PARAM_INT);
$sth->execute();
$news = $sth->fetch(PDO::FETCH_ASSOC);


echo '
    <body>
';
html_body_header(false, $lang, false);
echo '
        <article>
            <div class="m-3 bg-light p-5">
                <h1>' . $news['subject'] . '</h1>
                <hr>
                <p>' . $news['content'] . '</p>
            </div>
        </article>
';
html_body_footer($lang);
echo '
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/dist/js/main.js"></script>
    </body>
</html>
';
?>