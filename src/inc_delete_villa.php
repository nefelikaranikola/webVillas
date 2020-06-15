<?php

session_start();
require '../config.php';

$villa_id = (isset($_GET['villa_id']) && !empty($_GET['villa_id'])) ? $_GET['villa_id'] : null ;

if($villa_id == null) {
    header('Location: /');
    exit;
}

$sql = 'SELECT * FROM villas WHERE id = :id';
$statement = $pdo->prepare($sql);
$statement->execute([
    ':id' => $villa_id
]);
$record = $statement->fetch();

if($_SESSION['user_id'] != $record['user_id']) {
    header('Location: /');
    exit;
}

$sql = 'DELETE FROM villas WHERE id = :id';
$statement = $pdo->prepare($sql);
$delete = $statement->execute([
    ':id' => $villa_id
]);

if(!$delete) {
    header('Location: ../villa.php?id='.$villa_id.'&error=Something went wrong.');
    exit;
}

header('Location: ../browse.php');
exit;
