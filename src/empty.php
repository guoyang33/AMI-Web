<?php

include 'html_head.php';
$content_path = 'content-json/' . $lang . '/about.json';
// $content = json_decode(file_get_contents($content_path), true);

echo '
    <body>
';
html_body_header();
echo '
        <main id="demo">
            <h1>Dedicated to developing and delivering hormone therapeutics</h1>
            <h2>A global pharmaceutical company partners focused on chronic endocrine conditions</h2>
            <ul>
                <li>DIURNAL, a global specialty pharmaceutical company focused on chronic endocrine diseases</li>
                <li>CITRINE Medicine, a pharmaceutical company and focused on providing effective and affordable therapeutic solutions to rare disease patients in the Greater China, holds the exclusive distribution rights for DIURNAL\'s products across Asia</li>
                <li>AMI, a pharmaceutical distribution firm dedicated to delivering effective and accessible therapeutic solutions to rare disease patients in Taiwan, possesses the distribution rights for DIURNAL\'s products via its partnership with CITRINE Medicine</li>
            </ul>
        </main>
';
html_body_footer($lang);
echo '
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/dist/js/main.js"></script>
    </body>
</html>
';
?>