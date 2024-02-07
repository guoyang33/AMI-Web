<?php

include 'html_head.php';
$content_path = 'content-json/' . $lang . '/about.json';
$content = json_decode(file_get_contents($content_path), true);

echo '
    <body>
';
html_body_header(false, $lang);
echo '
        <article class="bg-light p-3">
            <h1>' . $content['title'] . '</h1>
';
foreach ($content['sections'] as $section) {
    echo '
            <hr>
            <h2>' . $section['title'] . '</h2>
    ';
    switch ($section['type']) {
        case 'list':
            foreach ($section['list'] as $item) {
                echo $item, "\n";
            }
            break;
        case 'image':
            echo '
            <img src="' . $section['src'] . '" alt="' . $section['alt'] . '">
            ';
            break;
        default:
            echo '
            <p>' . $section['text'] . '</p>
            ';
    }
}
echo '
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