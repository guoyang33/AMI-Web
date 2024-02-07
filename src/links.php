<?php

include 'html_head.php';
$content_path = 'content-json/' . $lang . '/links.json';
$content = json_decode(file_get_contents($content_path), true);

echo '
    <body>
';
html_body_header(false, $lang);
echo '
        <article class="bg-light p-3 col-sm-6 offset-sm-3">
            <h1>' . $content['title'] . '</h1>
            <hr>
            <ul class="text-center" style="list-style-type:none; padding:0px">
';
foreach ($content['links'] as $link) {
    echo '
                <li>
                    <a href="' . $link['link'] . '">' . $link['text'] . '</a>
                </li>
    ';
}
echo '
            </ul>
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