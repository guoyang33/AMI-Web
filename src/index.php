<?php

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
            <a class="btn btn-primary" href="about.php" role="button">' . $content['about']['button']['text'] . '</a>
        </section><!-- #about -->

        <section id="products">
            <h1>' . $content['products']['title'] . '</h1>
        </section><!-- #products -->

        <section id="news">
            <h1>' . $content['news']['title'] . '</h1>
            <div class="col-md-6">
                <h2>' . $content['news']['medicine_updates']['title'] . '</h2>
                <p>' . $content['news']['medicine_updates']['text'] . '</p>
                <table></table>
            </div>
            <div class="col-md-6">
                <h2>' . $content['news']['news']['title'] . '</h2>
                <p>' . $content['news']['news']['text'] . '</p>
                <table></table>
            </div>
        </section><!-- #news -->

        <section id="contact">
            <h1>' . $content['contact']['title'] . '</h1>
            <h2>' . $content['contact']['text'] . '</h2>
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