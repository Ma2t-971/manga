<?php
$config = require __DIR__ . '/config.php';
$conn = new PDO(
    "mysql:host={$config['host']};dbname={$config['dbname']}",
    $config['username'],
    $config['password'],
    [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
); ?>