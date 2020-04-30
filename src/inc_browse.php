<?php

$sql = 'SELECT id , title, excerpt FROM villas ORDER BY id DESC LIMIT 6';
$statement = $pdo->query($sql);
$records = $statement->fetchAll();

//print_r($records); die;
