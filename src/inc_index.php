<?php

$sql = 'SELECT id , title, excerpt FROM villas ORDER BY id DESC LIMIT 4';
$statement = $pdo->query($sql);
$records = $statement->fetchAll();

/*$filters = false;
$existing_filter = false;
$filter_values = [];
$locations = json_decode(file_get_contents("src/location.json"), true);
$states = array_keys($locations);


if(isset($_GET['max-price']) && !empty($_GET['max-price'])) {
    $max_price = trim($_GET['max-price']);
    $filters = true;
} else {
    $max_price = null;
}

if(isset($_GET['capacity']) && !empty($_GET['capacity'])) {
    $capacity = trim($_GET['capacity']);
    $filters = true;
} else {
    $capacity = null;
}


if(isset($_GET['state']) && in_array($_GET['state'], $states)) {
    $state = trim($_GET['state']);
    $filters = true;
} else {
    $state = null;
}

if($filters) {
    $sql .= ' WHERE';
}

if(!is_null($max_price)) {
    $sql .= ' price <= :max_price';
    $filter_values[':max_price'] = $max_price;
    $existing_filter = true;
}

if(!is_null(capacity)) {
    $sql .= $existing_filter ? ' AND capacity <= :max_capacity' : ' capacity <= :max_capacity';
    $filter_values[':capacity'] = $capacity;
    $existing_filter = true;
}

if(!is_null($state)) {
    $sql .= $existing_filter ? ' AND state = :state' : ' state = :state';
    $filter_values[':state'] = $state;
    $existing_filter = true;
}

$sql .= ' ORDER BY id DESC LIMIT 10';

$statement = $pdo->prepare($sql);
$statement->execute($filter_values);
$records = $statement->fetchAll(); */


