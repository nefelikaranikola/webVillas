<?php

// Database Params
$database = [
    'host' => 'localhost',
    'dbname' => '********',
    'user' => '*****',
    'password' => '*******'
];

// PDO dsn connection
$dsn = 'mysql:host='.$database['host'].';dbname='.$database['dbname'];

// Create a PDO instance
try {
    $pdo = new PDO($dsn, $database['user'], $database['password']);
    $pdo->exec('set names utf8');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $message = 'PDO Exception: <strong>'.$e->getMessage().'</strong>';
    exit($message);
}

?>
