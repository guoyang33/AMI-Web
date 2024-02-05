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
            <div class="alert alert-primary col-sm-8 offset-sm-2" role="alert">
                <h2>' . $content['contact']['form']['title'] . '</h2>
                <form action="contact_target.php" method="post">
                    <div class="form-group row">
                        <label for="name" class="col col-form-label">' . $content['contact']['form']['field']['cust_name']['label'] . '</label>
                        <div class="">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class=" col-form-label">' . $content['contact']['form']['field']['email']['label'] . '</label>
                        <div class="">
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class=" col-form-label">' . $content['contact']['form']['field']['phone']['label'] . '</label>
                        <div class="">
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class=" col-form-label">' . $content['contact']['form']['field']['address']['label'] . '</label>
                        <div class="">
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class=" col-form-label">' . $content['contact']['form']['field']['message']['label'] . '</label>
                        <div class="">
                            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-1 mt-1">
                            <button type="submit" class="btn btn-primary">' . $content['contact']['form']['button']['text'] . '</button>
                        </div>
                    </div>
                </form>
            </div>

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