<?php

require_once 'connect_db.php';
include 'html_head.php';
// $content_path = 'content-json/' . $lang . '/medicine_information_detail.json';
// $content = json_decode(file_get_contents($content_path), true);

$medicine_information_id = $_GET['id'];
$sth = $dbh->prepare('SELECT * FROM `medicine_information` WHERE id = :id');
$sth->bindParam(':id', $medicine_information_id, PDO::PARAM_INT);
$sth->execute();
$medicine_information = $sth->fetch(PDO::FETCH_ASSOC);


echo '
    <body>
';
html_body_header(false, $lang, false);
echo '
        <article>
            <div class="m-3 bg-light p-5">
                <h1>' . $medicine_information['subject'] . '</h1>
                <hr>
                <p>' . $medicine_information['content'] . '</p>
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