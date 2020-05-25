<?php

session_start();
require '../config.php';

//print_r($_POST); die;

// Check if user is logged in
if(empty($_SESSION['user_id'])) {
    header("Location: ../login.php?error=Please log in.");
    exit();
}

try {
    // Check if user already has an active villa
    // Kalo einai na paei panw panw
    $check_active_villa_SQL = "SELECT * FROM villas WHERE `user_id` = :user_id";
    $statement = $pdo->prepare($check_active_villa_SQL);
    $statement->execute([
        ':user_id' => $_SESSION['user_id']
    ]);

    if($statement->rowCount() > 0) {
        $errors['general'] = 'Already active villa';
    }
} catch (PDOException $e) {
    // if something wrong happens in the try{...} block execution comes here
    $message = 'PDO Exception: <strong>'.$e->getMessage().'</strong>';
    exit($message);
}

// Save Post Data into Variables
$title = trim($_POST['title']);
$state = trim($_POST['state']);
//$city = trim($_POST['city']);
$address = trim($_POST['address']);
$price = trim($_POST['price']);
//$extras = trim($_POST['extras']); //array
$description = trim($_POST['description']);
//$photos = trim($_POST['photos']);
//$email = trim($_POST['email']);

$extras = !empty($_POST['extras']) ? trim($_POST['extras']) : null;

/**
 * Form Validation
 * 1. State
 * 2. bla bla bla
 */

// Ολες οι αλληλεπιδρασεις με τη βαση θα γίνουν στο τελος του αρχειου σε ενα ενιαιο try-catch αφου νωριτερα εχουν τελειωσει τα απλά validations
$errors = [];
$inputs = [];

// Check for empty fields
if(empty($username) && empty($email) && empty($password) && empty($con_password)) {
    $errors['general'] = 'Please fill in the form.';
    $_SESSION['errors'] = $errors;
    header("Location: ../publish.php");
    exit();
}

// Check if state is one of the array elements
if(!in_array($state, ['Magnisia', 'Thessaloniki', 'Cyclades', 'Chania'])) {
    $errors['state'] = 'Your state is not valid.';
} else {
    $inputs['state'] = $state;
}

/**
 * if(!isset($tade) && !elegxos)
 */

try {
    if(count($errors) > 0) {
        $_SESSION['errors'] = $errors;
        $_SESSION['inputs'] = $inputs;
        header('Location: ../publish.php');
        exit();
    }

    // Insert data into villas table
    $sql = "INSERT INTO villas (`user_id`, title, state, address, price, description) VALUES (:user_id, :title, :state, :address, :price, :description)";
    $values = [
        ':user_id' => $_SESSION['user_id'],
        ':title' => $title,
        ':state' => $state,
        //':city' => $city,
        ':address' => $address,
        ':price' => $price,
        ':description' => $description
    ];

    $statement = $pdo->prepare($sql);
    $insert_data = $statement->execute($values);

    if($insert_data == true) {
        header('Location: ../browse.php?success=Your Villa was submitted succesfully!');
        exit();
    } else {
        $errors['general'] = 'Something went wrong. Please try again!';
        $_SESSION['errors'] = $errors;
        header('Location: ../publish.php');
        exit();
    }
} catch(PDOException $e) {
    // if something wrong happens in the try{...} block execution comes here
    $message = 'PDO Exception: <strong>'.$e->getMessage().'</strong>';
    exit($message);
}
?>
