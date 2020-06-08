<?php

$sql = 'SELECT * FROM villas WHERE id = :id';
$statement = $pdo->prepare($sql);
$statement->execute([
    ':id' => $_GET['id']
]);
$record = $statement->fetch();

$sql = 'SELECT * FROM media WHERE villa_id = :id';
$statement = $pdo->prepare($sql);
$statement->execute([
    ':id' => $_GET['id']
]);
$photos = $statement->fetchAll();

//print_r($record); die;
