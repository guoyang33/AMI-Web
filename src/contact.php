<?php

include 'captcha.php';
include 'html_head.php';
$content_path = 'content-json/' . $lang . '/contact.json';
$content = json_decode(file_get_contents($content_path), true);

$captcha_incorrect = false;

if (isset($_POST['form']) && $_POST['form'] == 'contact') {
    if ($PHPCAP->verify($_POST['captcha'])) {
        // check field data
        $flag = true;
        foreach ($_POST as $key => $value) {
            if (empty($value) && $key != 'address') {
                $flag = false;
            }
        }

        if ($flag) {
            require_once 'connect_db.php';
            $submit_date = date('Y-m-d');
            $sth = $dbh->prepare("INSERT INTO `customer_message` (`cust_name`, `email`, `phone`, `address`, `message`, `submit_date`) VALUES (:cust_name, :email, :phone, :address, :message, :submit_date)");
            $sth->bindParam(':cust_name', $_POST['cust_name'], PDO::PARAM_STR);
            $sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
            $sth->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
            $sth->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
            $sth->bindParam(':message', $_POST['message'], PDO::PARAM_STR);
            $sth->bindParam(':submit_date', $submit_date, PDO::PARAM_STR);
            $sth->execute();
    
            if ($dbh->lastInsertId()) {     // 資料庫寫入成功
                echo '
                    <body>
                        <main>
                            <div class="bg-light p-3 col-sm-6 offset-sm-3">
                                <h1>' . $content['success']['title'] . '</h1>
                                <p>' . $content['success']['text'] . '</p>
                                <a class="btn btn-primary" href="index.php" role="button">' . $content['button']['back']['text'] . '</a>
                            </div>
                        </main>
                    </body>
                ';
            } else {        // 資料庫寫入失敗
                echo '
                    <body>
                        <main>
                            <div class="bg-danger p-3 col-sm-6 offset-sm-3">
                                <h1>' . $content['fail']['title'] . '</h1>
                                <p>' . $content['fail']['text'] . '</p>
                                <a class="btn btn-primary" href="contact.php" role="button">' . $content['button']['back']['text'] . '</a>
                            </div>
                        </main>
                ';
            }
            exit;
        }
    } else {
        $captcha_incorrect = true;
    }
}
echo '
    <body>
';
html_body_header(false, $lang);
echo '
        <main>
            <div class="bg-light p-3 col-sm-6 offset-sm-3">

                <h1>' . $content['title'] . '</h1>
                <p>' . $content['text'] . '</p>
';
if ($captcha_incorrect) {
    echo '
                <div class="alert alert-danger" role="alert">' . $content['captcha_incorrect'] . '</div>
    ';
}
echo '
                <form method="post">
                    <input type="hidden" name="form" value="contact">
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
                        <textarea class="form-control" id="' . $field_name . '" name="' . $field_name . '" rows="3" placeholder="' . $field['placeholder'] . '"' . (($field['required']) ? ' required' : '') . '>' . ((isset($_POST[$field_name])) ? $_POST[$field_name] : '') . '</textarea>
            ';
            break;
        case 'captcha':
            echo '
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" id="' . $field_name . '" name="' . $field_name . '" placeholder="' . $field['placeholder'] . '"' . (($field['required']) ? ' required' : '') . '>
                            </div>
                            <div class="col-6">
            ';
            $PHPCAP->prime();
            $PHPCAP->draw();
            echo '
                            </div>
                        </div>
            ';
            break;
        default:
            echo '
                        <input type="' . $field['type'] . '" class="form-control" id="' . $field_name . '" name="' . $field_name . '" value="' . ((isset($_POST[$field_name])) ? $_POST[$field_name] : '') . '" placeholder="' . $field['placeholder'] . '"' . (($field['required']) ? ' required' : '') . '>
            ';
    
    }
}
echo '
                    <button type="submit" class="btn btn-primary my-2 col-2 offset-5">' . $content['form']['submit'] . '</button>
                </form>
            </div>
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