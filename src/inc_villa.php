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

//var_dump($record); die;
//print_r($record); die;
