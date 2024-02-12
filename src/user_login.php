<?php
require_once './html_head.php';
require_once './utils.php';

if (isset($_SESSION['user_id'])) {
    header('Location: ./index.php');
    exit;
}

if (array_key_exists('login', $_POST)) {
    
} else {
    html_body_header(false, $lang, true);

    echo '
    <form action="./user_login.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
    </form>
    ';
}