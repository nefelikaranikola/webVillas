<?php

session_start();
require 'config.php';
$title = "Browse";
include 'layout/header.php';

$filters = false;
$existing_filter = false;
$filter_values = [];
$locations = json_decode(file_get_contents("src/location.json"), true);
$states = array_keys($locations);
$sql = 'SELECT DISTINCT V.id AS id, title, excerpt, capacity, bedrooms, rating, price, M.name AS name FROM villas V LEFT JOIN media M ON V.id = M.villa_id';

if(isset($_GET['min-price']) && !empty($_GET['min-price'])) {
    $min_price = trim($_GET['min-price']);
    $filters = true;
} else {
    $min_price = null;
}

if(isset($_GET['max-price']) && !empty($_GET['max-price'])) {
    $max_price = trim($_GET['max-price']);
    $filters = true;
} else {
    $max_price = null;
}

if(isset($_GET['min-capacity']) && !empty($_GET['min-capacity'])) {
    $min_capacity = trim($_GET['min-capacity']);
    $filters = true;
} else {
    $min_capacity = null;
}

if(isset($_GET['max-capacity']) && !empty($_GET['max-capacity'])) {
    $max_capacity = trim($_GET['max-capacity']);
    $filters = true;
} else {
    $max_capacity = null;
}

if(isset($_GET['rating']) && in_array($_GET['rating'], [1, 2, 3])) {
    $rating = trim($_GET['rating']);
    $filters = true;
} else {
    $rating = null;
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

if(!is_null($min_price)) {
    $sql .= ' price >= :min_price';
    $filter_values[':min_price'] = $min_price;
    $existing_filter = true;
}

if(!is_null($max_price)) {
    $sql .= $existing_filter ? ' AND price <= :max_price' : ' price <= :max_price';
    $filter_values[':max_price'] = $max_price;
    $existing_filter = true;
}

if(!is_null($min_capacity)) {
    $sql .= $existing_filter ? ' AND capacity >= :min_capacity' : ' capacity >= :min_capacity';
    $filter_values[':min_capacity'] = $min_capacity;
    $existing_filter = true;
}

if(!is_null($max_capacity)) {
    $sql .= $existing_filter ? ' AND capacity <= :max_capacity' : ' capacity <= :max_capacity';
    $filter_values[':max_capacity'] = $max_capacity;
    $existing_filter = true;
}

if(!is_null($rating)) {
    $sql .= $existing_filter ? ' AND rating = :rating' : ' rating = :rating';
    $filter_values[':rating'] = $rating;
    $existing_filter = true;
}

if(!is_null($state)) {
    $sql .= $existing_filter ? ' AND state = :state' : ' state = :state';
    $filter_values[':state'] = $state;
    $existing_filter = true;
}

$sql .= ' GROUP BY V.id ORDER BY V.id DESC LIMIT 10';

$statement = $pdo->prepare($sql);
$statement->execute($filter_values);
$records = $statement->fetchAll();

//var_dump($records); die;

?>

<main class="bg-light">

    <img src="https://buyandsell.gr/wp-content/uploads/2017/11/Agios_Nikolaos_banner_cropped.jpg" class="img-fluid w-100" alt="white and brown concrete houses">

    <nav class="p-0 breadcrumb" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb pb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Browse</li>
            </ol>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md mx-5">
                <?php if(!empty($_GET['success'])) : ?>
                    <div class="alert alert-success text-center" role="alert">
                        <?= $_GET['success'] ?>
                    </div>
                <?php endif; ?>

                <?php if(!empty($_GET['error'])) : ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row py-5">
            <div class="col-md-3 mx-4">
                <form method="GET" action="browse.php">
                    <div class="form-group p-4 border border-secondary rounded bg-white">
                        <label for="formControlRange" class="mb-3" style="font-weight: bold;"><i class="fas fa-euro-sign"></i>  Set price</label>
                        <input type="number" name="min-price" class="form-control mb-2" placeholder="Min" value="<?= $_GET['min-price'] ?? '' ?>">
                        <input type="number" name="max-price" class="form-control" placeholder="Max" value="<?= $_GET['max-price'] ?? '' ?>">
                    </div>

                    <div class="p-4 mt-3 border border-secondary rounded bg-white">
                        <p class="mb-3" style="font-weight: bold;"><i class="fas fa-male"></i><i class="fas fa-female"></i>  Capacity</p>
                        <input type="number" name="min-capacity" class="form-control mb-2" placeholder="Min" value="<?= $_GET['min-capacity'] ?? '' ?>">
                        <input type="number" name="max-capacity" class="form-control" placeholder="Max" value="<?= $_GET['max-capacity'] ?? '' ?>">
                    </div>

                    <div class="p-4 mt-3 border border-secondary rounded bg-white">
                        <p class="mb-3" style="font-weight: bold;"><i class="fas fa-star"></i>  Rating</p>
                        <select name="rating" class="form-control form-control-sm">
                            <option value="">Choose Rating</option>
                            <option value="1" <?= (isset($_GET['rating']) && $_GET['rating'] == 1) ? 'selected' : '' ?>>1</option>
                            <option value="2" <?= (isset($_GET['rating']) && $_GET['rating'] == 2) ? 'selected' : '' ?>>2</option>
                            <option value="3" <?= (isset($_GET['rating']) && $_GET['rating'] == 3) ? 'selected' : '' ?>>3</option>
                        </select>
                    </div>

                    <div class="p-4 mt-3 border border-secondary rounded bg-white">
                        <p class="mb-3" style="font-weight: bold;"><i class="fas fa-map"></i>  State</p>
                        <select name="state" class="form-control form-control-sm">
                            <option value="">Choose State</option>
                            <?php foreach($locations as $state => $cities) : ?>
                                <option value="<?= $state ?>" <?= (isset($_GET['state']) && $_GET['state'] == $state) ? 'selected' : '' ?>><?= $state ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mt-3 text-right">
                        <input type="submit" class="form-control btn btn-secondary <?= (isset($_COOKIE['css']) && $_COOKIE['css'] == 'light') ? 'btn btn-light btn-outline-dark' : 'btn btn-secondary' ?>" value="Submit">
                    </div>
                </form>
            </div>

            <div class="col-md-8 py-4 border border-secondary rounded bg-white">
                <h3 class="pb-3 text-center">Luxury Villas</h3>

                <?php foreach ($records as $record) : ?>
                    <div class="card mb-3" style="max-width: 1080px;">
                        <div class="row no-gutters">

                            <div class="col-md-4 p-3">
                                <img src="<?= $record['name'] ? 'img/uploads/'.$record['name'] : 'img/main.jpg' ?>" class="card-img-cover" alt="exotic villa">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="stretched-link text-secondary" style = "text-decoration: none;" href="villa.php?id=<?= $record['id'] ?>"><?= $record['title'] ?></a></h5>
                                    <p class="card-text"><?= $record['excerpt'] ?>.</p>

                                    <div class="d-flex justify-content-right">
                                        <p class="pr-4"><i class="fas fa-male"></i><i class="fas fa-female"></i> <?= $record['capacity'] ?></p>
                                        <p class="pr-4"><i class="fas fa-bed"></i> <?= $record['bedrooms'] ?></p>
                                        <p class="pr-4"><i class="fas fa-star"></i> <?= $record['rating'] ?></p>
                                        <p class="pr-4"><i class="fas fa-euro-sign"></i> <?= $record['price'] ?> / night</p>
                                    </div>

                                    <div class="d-flex">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>

                <nav aria-label="navigation">
                    <ul class="pagination justify-content-end mb-0 mt-3">
                        <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>



</main>

<?php include 'layout/footer.php'; ?>
<?php include 'layout/scripts.php'; ?>
