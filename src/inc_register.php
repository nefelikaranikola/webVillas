<?php

require '../config.php';

// Save Post Data into Variables
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$con_password = trim($_POST['con_password']);

/**
 * Form Validation
 * 1. Usename validation
 * 2. Email validation
 * 3. Password validation
 */

// Ολες οι αλληλεπιδρασεις με τη βαση θα γινυον στο τελος του αρχειου σε ενα ενιαιο try-catch αφου νωρτιερα εχουν τελειωσει τα απλά validation

// Check for empty fields
if(empty($username) || empty($email) || empty($password) || empty($con_password)) {
    exit('Please complete the form.');
}

// Permitted Characters
$patern_name = "/[A-Za-z]+[A-Za-z0-9_]*[A-Za-z0-9]/";


//Check if username is valid - permitted characters and min-length
if(!preg_match($patern_name, $username) || strlen($username) >25) {
    exit('Your username is not valid!');
}

// Check if password is valid
if(strlen($password) < 8) {
    exit('Your password is not valid!');
}

// Check if email is valid and unique
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Your email is not valid!');
}

if($password != $con_password) {
    exit('Your password is incorrect!');
}

try {
    // Check if email is unique - +username
    $getUsersTable = "SELECT username, email FROM users";
    $statement = $pdo->query($getUsersTable);
    $records = $statement->fetchAll();

    foreach ($records as $record) {
        if($record['email'] == $email) {
            exit('This email already exists!');
        }
    }

    foreach ($records as $record) {
        if($record['username'] == $username) {
            exit('This username already exists! Try something else.');
        }
    }

    // Insert data into users table
    $sql = "INSERT INTO users (username, email, password, activation_code, status) VALUES (:username, :email, :password, :activation_code, :status)";
    $values = [
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
        ':activation_code' => 123,
        ':status' => true
    ];

    $statement = $pdo->prepare($sql);
    $test = $statement->execute($values);

} catch(PDOException $e) {
    $message = 'PDO Exception: <strong>'.$e->getMessage().'</strong>';
    exit($message);
}

if($test == true)
    echo 'ok';
else
    echo 'not ok';

?>
