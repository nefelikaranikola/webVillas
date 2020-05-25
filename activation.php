<?php

session_start();
require 'config.php';

//http://localhost/activation.php?email=blablabla&activation_code=12345

// Save Post Data into Variables
$email = isset($_GET['email']) ? trim($_GET['email']) : null;
$activation_code = isset($_GET['activation_code']) ? trim($_GET['activation_code']) : null;

if(empty($email) || empty($activation_code)) {
    header('Location: login.php?error=Error!');
    exit();
}

try {
    $check_valid_data = "SELECT email, activation_code, `status` FROM users WHERE email = :email AND activation_code = :activation_code";
    $statement = $pdo->prepare($check_valid_data);
    $statement->execute([
        ':email' => $email,
        ':activation_code' => $activation_code
    ]);

    $record = $statement->fetch();

    if(!$record) {
        header('Location: login.php?error=Invalid inputs!');
        exit();
    }

    if($record['status'] == 1) {
        header('Location: login.php?success=Account Activated');
        exit();
    }

    //Update status to activated (1).. query not prepared stmt
    // activate
    $update = 'UPDATE users SET `status` = 1 WHERE email = :email';
    $statement = $pdo->prepare($update);
    $statement->execute([
        ':email' => $email
    ]);

    header('Location: login.php?success=Account Activated');
    exit();
} catch(PDOException $e) {
    $message = 'PDO Exception: <strong>'.$e->getMessage().'</strong>';
    exit($message);
}

?>
