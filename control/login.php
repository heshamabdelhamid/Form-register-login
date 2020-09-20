<?php

if (isset($_POST['email'], $_POST['password'], $_POST['password'])) {

    $email    = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (preg_match('/^[a-z0-9-._ ]*$/i', $username)) {

        if (strlen($password) >= 8 && strlen($password) <= 32) {

            $user = $pdo->prepare('SELECT * FROM users WHERE username =:username AND activated = 1');
            $user->execute([$username]);

            if ($user->rowcount()) {
                if (password_verify($password, $user->fetch()['password'])) {
                    echo 'Welcome User';
                } else {
                    echo 'password is corect';
                }
            } else {
                echo ' User is not Activ';
            }
        } else {
            echo 'plaese provide a valid pasword';
        }
    } else {
        echo 'plaese provide a valid username';
    }
}