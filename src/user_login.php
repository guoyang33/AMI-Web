<?php
include 'html_head.php';
require_once 'connect_db.php';

session_start();

// 已登入的使用者不得再登入
if (isset($_SESSION['user_id'])) {
    header('Location: ./user_home.php');
    exit;
}

if (key_exists('login', $_POST)) {
    if (!empty($_POST['login']['username']) && !empty($_POST['login']['password'])) {
        $username = $_POST['login']['username'];
        $password = $_POST['login']['password'];
    
        $sth = $dbh->prepare("SELECT * FROM user WHERE username = :username LIMIT 1");
        $sth->bindParam(':username', $username, PDO::PARAM_STR);
        $sth->execute();
        $user = $sth->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header('Location: ./man/index.php');
            exit;
        }
    }
}

echo '
<form action="./user_login.php" method="post">
    <input type="hidden" name="login">
    <input type="text" name="login[username]" placeholder="Username" required>
    <input type="password" name="login[password]" placeholder="Password" required>
    <input type="submit" value="Login">
</form>
';

?>