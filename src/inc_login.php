<?php

session_start();
require '../config.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Check for empty fields
if(empty($email) || empty($password)) {
    header("Location: ../login.php?error=Please fill in the form.");
    exit();
}

try {
    // Check if email & password match
    $check_credentials_SQL = "SELECT `id`,`email`, `password`, `status` FROM users WHERE email = :email";
    $statement = $pdo->prepare($check_credentials_SQL);
    $statement->execute([
        ':email' => $email
    ]);

    if($statement->rowCount() == 0) {
        header("Location: ../login.php?error=User doesn't exist!");
        exit();
    }

    $record = $statement->fetch();

    // Decrypt Password
    if($record['status'] == 0) {
        header("Location: ../login.php?error=Please activate your account");
        exit();
    }

    // Decrypt Password
    if(crypt($password, $record['password']) != $record['password']) {
        header("Location: ../login.php?error=Invalid credentials!");
        exit();
    }

    // ισως χρειαστουν και αλλα στο SESSION
    $_SESSION['user_id'] = $record['id'];

    header("Location: ../");
    exit();
} catch(PDOException $e) {
    // if something wrong happens in the try{...} block execution comes here
    $message = 'PDO Exception: <strong>'.$e->getMessage().'</strong>';
    exit($message);
}

?>
