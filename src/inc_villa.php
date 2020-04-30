<?php

$sql = 'SELECT title FROM villas WHERE id = :id';
$statement = $pdo->prepare($sql);
$statement->execute([
    ':id' => $_GET['id']
]);
$record = $statement->fetch();

//print_r($record); die;
