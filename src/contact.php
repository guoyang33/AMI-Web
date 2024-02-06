<?php

include 'html_head.php';
$content_path = 'content-json/' . $lang . '/contact.json';
$content = json_decode(file_get_contents($content_path), true);

echo '
    <body>
';
html_body_header(false, $lang);
echo '
        <main>
            <div class="bg-light p-3 col-sm-6 offset-sm-3">

                <h1>' . $content['title'] . '</h1>
                <p>' . $content['text'] . '</p>
                <form action="contact_target.php" method="post">
';
foreach ($content['form']['fields'] as $field_name => $field) {
    echo '
                    <div class="form-group">
                        <label class="mt-2" for="' . $field_name . '">
                            ' . (($field['required']) ? '<span class="text-danger">*</span>' : '') . $field['label'] . '
                        </label>
    ';
    switch ($field['type']) {
        case 'textarea':
            echo '
                        <textarea class="form-control" id="' . $field_name . '" name="' . $field_name . '" rows="3" placeholder="' . $field['placeholder'] . '"' . (($field['required']) ? ' required' : '') . '></textarea>
            ';
            break;
        default:
            echo '
                        <input type="' . $field['type'] . '" class="form-control" id="' . $field_name . '" name="' . $field_name . '" placeholder="' . $field['placeholder'] . '"' . (($field['required']) ? ' required' : '') . '>
            ';
    
    }
}
echo '
                    <button type="submit" class="btn btn-primary my-2 col-2 offset-5">' . $content['form']['submit'] . '</button>
                </form>
            </div>
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