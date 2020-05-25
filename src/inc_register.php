<?php

session_start();
require '../config.php';
require 'functions.php';

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

// Ολες οι αλληλεπιδρασεις με τη βαση θα γίνουν στο τελος του αρχειου σε ενα ενιαιο try-catch αφου νωριτερα εχουν τελειωσει τα απλά validations
$errors = [];
$inputs = [];

// Check for empty fields
if(empty($username) && empty($email) && empty($password) && empty($con_password)) {
    $errors['general'] = 'Please fill in the form.';
    $_SESSION['errors'] = $errors;
    header("Location: ../register.php");
    exit();
}

//Check if username is valid - permitted characters and min-length
if(!preg_match("/\w/", $username) || strlen($username) > 25) {
    $errors['username'] = 'Your username is not valid.';
} else {
    $inputs['username'] = $username;
}

// Check if password is valid
if(!preg_match("/\w/", $username) || strlen($password) < 8) {
    $errors['password'] = 'Your password is not valid.';
}

// Στο ηδη υπάρχων προσθεσε το επόμενο
if($password != $con_password && !isset($errors['password'])) {
    $errors['password'] .= ' Your password is incorrect!';
}

// Check if email is valid and unique
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Your email is not valid.';
} else {
    $inputs['email'] = $email;
}

try {
    // Check if username, email is unique
    if(!isset($errors['username'])) {
        $check_username_SQL = "SELECT username FROM users WHERE username = :username";
        $statement = $pdo->prepare($check_username_SQL);
        $statement->execute([
            ':username' => $username
        ]);

        if($statement->rowCount() > 0) {
            $errors['username'] .= 'This username already exists.';
        }
    }

    if(!isset($errors['email'])) {
        $check_email_SQL = "SELECT email FROM users WHERE email = :email";
        $statement = $pdo->prepare($check_email_SQL);
        $statement->execute([
            ':email' => $email
        ]);

        if($statement->rowCount() > 0) {
            $errors['email'] .= 'This email already exists.';
        }
    }

    if(count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        $_SESSION['inputs'] = $inputs;
        header('Location: ../register.php');
        exit();
    }

    // Password Encryption - SHA512
    $encrypted_pass = crypt($password, '$6$je658dfgf%25Zhr!');

    // Generate Activation Code
    $activation_code = rand(10000, 99999);

    // Insert data into users table
    $sql = "INSERT INTO users (username, email, password, activation_code, status) VALUES (:username, :email, :password, :activation_code, :status)";
    $values = [
        ':username' => $username,
        ':email' => $email,
        ':password' => $encrypted_pass,
        ':activation_code' => $activation_code,
        ':status' => false
    ];

    $statement = $pdo->prepare($sql);
    $insert_data = $statement->execute($values);

    if($insert_data == true) {
        // Αποστολή κωδικού ενεργοποίησης λογαρισμού μέσω email με το PHPMailer
        // και redirect με το κατάλληλο μήνυμα στη σελίδα login
        sendCodeViaEmail($email, $username, $activation_code);
    } else {
        $errors['general'] = 'Something went wrong. Please try again!';
        $_SESSION['errors'] = $errors;
        header('Location: ../register.php');
        exit();
    }

    // Check if form was submitted:
        if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
          }
          if(!$captcha){
            echo '<h2>Please check the captcha form.</h2>';
            exit;
          }
          $secretKey = "6LdRGvwUAAAAAKIFANHWOh5bzs8LGgvu0AHpI8Nx";
          $ip = $_SERVER['REMOTE_ADDR'];
          // post request to server
          $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
          $response = file_get_contents($url);
          $responseKeys = json_decode($response,true);
          // should return JSON with success as true
          if($responseKeys["success"]) {
                  echo '<h2>Thanks for posting comment</h2>';
          } else {
                  echo '<h2>You are spammer ! Get the @$%K out</h2>';
          }
} catch(PDOException $e) {
    // if something wrong happens in the try{...} block execution comes here
    $message = 'PDO Exception: <strong>'.$e->getMessage().'</strong>';
    exit($message);
}
?>
