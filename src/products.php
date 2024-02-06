<?php

include 'html_head.php';
$content_path = 'content-json/' . $lang . '/products.json';
$content = json_decode(file_get_contents($content_path), true);

echo '
    <body>
';
html_body_header(false, $lang);
echo '
        <main>
                <h1>' . $content['title'] . '</h1>
';
foreach ($content['products'] as $product) {
product_card($product);
}
echo '
        </main>
';
html_body_footer();
echo '
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/dist/js/main.js"></script>
    </body>
</html>
';
?>