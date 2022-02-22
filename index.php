<?php

require __DIR__ . '/utils.php';

try {
    $server = 'localhost';
    $db = 'crud_ddb';
    $user = 'root';
    $password = '';

    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    createStudent('Hanotiau', 'Stefan', 28, $pdo);
    readStudent($pdo);
    updateStudent(26, 'Bon', 'Jean', 54, $pdo);
    deleteStudent(27, $pdo);

}

catch (Exception $exception) {
    echo $exception->getMessage();
}