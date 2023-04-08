<?php
$dsn = "mysql:host=localhost;dbname=lr3v7";
$user = 'root';
$pass = '';

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $ex) {
    echo $ex->GetMessage();
}
