<?php

require_once 'connect_db.php';
include 'html_head.php';
$content_path = 'content-json/' . $lang . '/index.json';
$content = json_decode(file_get_contents($content_path), true);

echo '
    <body>
';
html_body_header(true, $lang);

echo '
        <section id="about">
            <h1>' . $content['about']['title'] . '</h1>
            <h2>' . $content['about']['text'] . '</h2>
            <a class="btn btn-primary mt-3" href="about.php" role="button">' . $content['about']['button']['text'] . '</a>
        </section><!-- #about -->

        <section id="products">
            <h1>' . $content['products']['title'] . '</h1>
';
foreach ($content['products']['products'] as $product) {
    product_card($product);
}
echo '
        </section><!-- #products -->

        <section id="news" class="row mx-0">
            <div class="col-md-6">
                <h2>' . $content['medicine_updates']['medicine_information']['title'] . '</h2>
';
show_medicine_infomation($dbh, $lang);
echo '
            </div>
            <div class="col-md-6">
                <h2>' . $content['medicine_updates']['news']['title'] . '</h2>
';
show_news($dbh, $lang);
echo '
            </div>
        </section><!-- #news -->

        <section id="contact">
            <h1>' . $content['contact']['title'] . '</h1>
';
foreach ($content['contact']['list'] as $item) {
    echo $item, "\n";
}
echo '
            <hr style="margin: 4rem 15rem">
            

        </section><!-- #contact -->

        <section id="links">
            <h1>' . $content['links']['title'] . '</h1>
            <ul style="list-style-type:none; padding:0px">
';
foreach ($content['links']['links'] as $link) {
    echo '
                <li>
                    <a href="' . $link['link'] . '">' . $link['text'] . '</a>
                </li>
    ';
}
echo '
            </ul>
        </section><!-- #links -->
';
html_body_footer($lang);
echo '
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/dist/js/main.js"></script>
    </body>
</html>
';

?>