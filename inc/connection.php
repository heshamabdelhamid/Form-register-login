<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=lrapp;charset=utf8;connect_timeout=15', 'root', '', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => FALSE,
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION
    ]);
} catch (\PDOException $e) {
    die(print_r($e->getMessage()));
}
