<?php

require_once '../inc/connection.php';


if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['password_confirm'])) {

    $username         = $_POST['username'];
    $email            = $_POST['email'];
    $password         = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if (preg_match('/^[a-z0-9-._ ]*$/i', $username)) {

        if (strlen($password) >= 8 && strlen($password) <= 32) {
            if ($password === $password_confirm) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $user = $pdo->prepare('INSERT INTO users(`username`,`password`,`email`) VALUES(?,?,?)');
                    $user->execute([
                        $username,
                        password_hash($password, PASSWORD_DEFAULT, ['cost' => 11]),
                        $email,
                    ]);
                    if ($user->rowCount()) {
                        echo 'thanks';
                    }
                } else {
                    echo 'plaese provide a valid password';
                }
            } else {
                echo 'password confirmation dosen\'t match ';
            }
        } else {
            echo 'plaese provide a valid password';
        }
    } else {
        echo 'plaese provide a valid username';
    }
}
