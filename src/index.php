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
            <h1>高展醫療用品</h1>
            <h2>追求卓越，超越期許，與您共創健康未來。</h2>
            <button class="btn btn-primary" onclick="location.href=\'about.php\'">關於高展</button>
        </section><!-- #about -->
        <section id="products">
        </section><!-- #products -->
        <section id="news">
        </section><!-- #news -->
        <section id="contact">
        </section><!-- #contact -->
        <section id="links">
        </section><!-- #links -->

        <footer>
            <p>&copy; 2023 Awesome Medical Inc.</p>
            <p>Tel: +886-7-312-0079</p>
            <p>Fax: +886-7-312-0079</p>
            <!-- <p>Address: 1F, No. 36, Lane 246, Tone-Meng 3rd Rd., San-Min District 80746, Kaohsiung City, Taiwan, Republic of China</p> -->
            <p>Address: 1F., No. 36, Ln. 246, Tongmeng 3rd Rd., Sanmin Dist., Kaohsiung City 80746, Taiwan (R.O.C.)</p>
        </footer>

        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/dist/js/main.js"></script>
    </body>
</html>
';

?>