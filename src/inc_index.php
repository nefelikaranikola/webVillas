<?php

$sql = 'SELECT id , title, excerpt FROM villas ORDER BY id DESC LIMIT 4';
$sql = 'SELECT DISTINCT V.id AS id, title, excerpt, M.name AS name FROM villas V LEFT JOIN media M ON V.id = M.villa_id GROUP BY V.id DESC LIMIT 4' ;

$statement = $pdo->query($sql);
$records = $statement->fetchAll();


