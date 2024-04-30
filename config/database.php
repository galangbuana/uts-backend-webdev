<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_xyz');
define('DB_USER', 'uts');
define('DB_PASS', 'utsbackend');

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die("Could not connect to the database " . DB_NAME . ": " . $e -> getMessage());
}