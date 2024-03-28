<?php

require_once '../connect_db.php';

session_start();

if ($_SESSION['user']) {
    $sth = $dbh->prepare("SELECT * FROM `user` WHERE `id` = :id");
    $sth->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $sth->execute();
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        echo 'Hello, ' . $user['username'] . '!';
    }

    echo '
    <a href="../logout.php">登出</a>
    ';
}