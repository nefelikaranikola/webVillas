<?php

session_start();
require 'config.php';

// Check if user is logged in
if(empty($_SESSION['user_id'])) {
    header("Location: ../login.php?error=Please log in.");
    exit();
}

/*
try {
    // Check if user already has an active villa
    $check_active_villa_SQL = "SELECT * FROM villas WHERE `user_id` = :user_id";
    $statement = $pdo->prepare($check_active_villa_SQL);
    $statement->execute([
        ':user_id' => $_SESSION['user_id']
    ]);

    if($statement->rowCount() > 0) {
        header('Location: browse.php?error=Already active villa');
        exit();
    }
} catch (PDOException $e) {
    $message = 'PDO Exception: <strong>'.$e->getMessage().'</strong>';
    exit($message);
}
*/

$title = "Publish";
include 'layout/header.php';

// Get the contents of the JSON file as associative array
$locations = json_decode(file_get_contents("src/location.json"), true);
$locations_json_obj = file_get_contents("src/location.json");
$extras_json = json_decode(file_get_contents("src/extras.json"), true);

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$inputs = isset($_SESSION['inputs']) ? $_SESSION['inputs'] : [];

if(isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}

if(isset($_SESSION['inputs'])) {
    unset($_SESSION['inputs']);
}

?>

<!-- HTML -->
<main class="bg-light">

    <img src="https://irenes-villas.gr/wp-content/uploads/2020/01/cropped-site-header-new-2-1536x255.jpg" class="img-fluid w-100" alt="white and brown concrete houses">

    <nav class="p-0 breadcrumb" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb pb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="login.php">Login</a></li>
                <li class="breadcrumb-item active" aria-current="page">Publish</li>
            </ol>
        </div>
    </nav>

    <div class="container py-5">

        <div class="text-center mb-3">
            <h1>Publish your Villa!</h1>
            <?php if(isset($errors['general'])) : ?>
                <div class="alert alert-danger text-center" role="alert">
                    <?= $errors['general'] ?>
                </div>
            <?php endif; ?>
        </div>

        <form action="src/inc_publish.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                        <div class="text-center mb-4 pb-4">
                            <h4><i class="fas fa-home"></i> Title</h4>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="" for="title">Title *</label>
                            <input type="text" name="title" value="<?= isset($inputs['title']) ? $inputs['title'] : '' ?>" class="form-control w-75 <?= isset($errors['title']) ? 'is-invalid' : '' ?>"  id="title" placeholder="Enter Villa's title">
                            <?php if(isset($errors['title'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['title'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label for="excerpt">Excerpt *</label>
                            <input type="text" name="excerpt" value="<?= isset($inputs['excerpt']) ? $inputs['excerpt'] : '' ?>" class="form-control w-75 <?= isset($errors['excerpt']) ? 'is-invalid' : '' ?>"  id="excerpt" placeholder="Add excerpt">
                            <?php if(isset($errors['excerpt'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['excerpt'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                        <div class="text-center mb-4 pb-4">
                            <h4><i class="fas fa-search-location"></i> Location</h4>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">State *</label>
                            <select class="custom-select w-75" id="states" name="state">
                                <option selected>Choose State</option>
                                <?php foreach($locations as $state => $cities) : ?>
                                    <option value="<?= $state ?>" <?= (isset($inputs['state']) && $state == $inputs['state']) ? "selected" : "" ?>><?= $state ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">City *</label>
                            <select class="custom-select w-75" id="cities" name="city">
                                <option selected>Choose City</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Address</label>
                            <input type="text" name="address" value="<?= isset($inputs['address']) ? $inputs['address'] : '' ?>" class="form-control w-75 <?= isset($errors['address']) ? 'is-invalid' : '' ?>" id="address" placeholder="Enter Address">
                            <?php if(isset($errors['address'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['address'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                        <div class="text-center mb-4 pb-4">
                            <h4><i class="fas fa-chart-area"></i> Area</h4>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                                <label class="">Style</label>
                                <select class="custom-select w-75" id="inlineFormCustomSelect" name="style">
                                    <option value="">Choose Style</option>
                                    <option value="Newly built" <?= (isset($inputs['style']) && $inputs['style'] == 'Newly built;') ? 'selected' : '' ?>>Newly built</option>
                                    <option value="Neoclassical" <?= (isset($inputs['style']) && $inputs['style'] == 'Neoclassical;') ? 'selected' : '' ?>>Neoclassical</option>
                                    <option value="Luxury" <?= (isset($inputs['style']) && $inputs['style'] == 'Luxury;') ? 'selected' : '' ?>>Luxury</option>
                                </select>
                                <?php if(isset($errors['style'])) : ?>
                                    <div class="invalid-feedback">
                                        <?= $errors['style'] ?>
                                    </div>
                                <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Zone</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect" name="zone">
                                <option value="">Choose Zone</option>
                                <option value="Residential" <?= (isset($inputs['zone']) && $inputs['zone'] == 'Residential;') ? 'selected' : '' ?>>Residential</option>
                                <option value="Commercial" <?= (isset($inputs['zone']) && $inputs['zone'] == 'Commercial;') ? 'selected' : '' ?>>Commercial</option>
                                <option value="Countryside" <?= (isset($inputs['zone']) && $inputs['zone'] == 'Countryside;') ? 'selected' : '' ?>>Countryside</option>
                                <option value="Rural" <?= (isset($inputs['zone']) && $inputs['zone'] == 'Rural;') ? 'selected' : '' ?>>Rural</option>
                            </select>
                            <?php if(isset($errors['zone'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['zone'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Construction</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect" name="construction">
                                <option value="">Choose Decade</option>
                                <option value="1980" <?= (isset($inputs['construction']) && $inputs['construction'] == 1980) ? 'selected' : '' ?>>1980</option>
                                <option value="1990" <?= (isset($inputs['construction']) && $inputs['construction'] == 1990) ? 'selected' : '' ?>>1990</option>
                                <option value="2000" <?= (isset($inputs['construction']) && $inputs['construction'] == 2000) ? 'selected' : '' ?>>2000</option>
                                <option value="2010" <?= (isset($inputs['construction']) && $inputs['construction'] == 2010) ? 'selected' : '' ?>>2010</option>
                            </select>
                            <?php if(isset($errors['construction'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['construction'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="border border-secondary rounded bg-white p-5 my-3">

                        <div class="text-center mb-4 pb-4">
                            <h4><i class="fas fa-check-circle"></i> Basic Features</h4>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label>Capacity *</label>
                            <input type="number" name="capacity" value="<?= isset($inputs['capacity']) ? $inputs['capacity'] : '' ?>"  class="form-control w-75 <?= isset($errors['capacity']) ? 'is-invalid' : '' ?>" id="capacity" placeholder="Set Capacity">
                            <?php if(isset($errors['capacity'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['capacity'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label>Building Area *</label>
                            <input type="number" name="building_area"  value="<?= isset($inputs['building_area']) ? $inputs['building_area'] : '' ?>" class="form-control w-75 <?= isset($errors['building_area']) ? 'is-invalid' : '' ?>" id="building_area" placeholder="Set Building Area">
                            <?php if(isset($errors['building_area'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['building_area'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label>Plot Area *</label>
                            <input type="number" name="plot_area" value="<?= isset($inputs['plot_area']) ? $inputs['plot_area'] : '' ?>" class="form-control w-75 <?= isset($errors['plot_area']) ? 'is-invalid' : '' ?>" id="plot_area" placeholder="Set Plot Area">
                            <?php if(isset($errors['plot_area'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['plot_area'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label>Type</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect" name="type">
                                <option value="">Choose Type</option>
                                <option value="Duplex" <?= (isset($inputs['type']) && $inputs['type'] == 'Duplex;') ? 'selected' : '' ?>>Duplex</option>
                                <option value="Maisonette" <?= (isset($inputs['type']) && $inputs['type'] == 'Maisonette;') ? 'selected' : '' ?>>Maisonette</option>
                                <option value="Split_Level" <?= (isset($inputs['type']) && $inputs['type'] == 'Split_Level;') ? 'selected' : '' ?>>Split Level</option>
                                <option value="Ground_Floor" <?= (isset($inputs['type']) && $inputs['type'] == 'Ground_Floor;') ? 'selected' : '' ?>>Ground Floor</option>
                            </select>
                            <?php if(isset($errors['type'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['type'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Rooms</label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect" name="bedrooms">
                                <option value="">Choose Bedrooms *</option>
                                <option value="1" <?= (isset($inputs['bedrooms']) && $inputs['bedrooms'] == 1) ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= (isset($inputs['bedrooms']) && $inputs['bedrooms'] == 2) ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= (isset($inputs['bedrooms']) && $inputs['bedrooms'] == 3) ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= (isset($inputs['bedrooms']) && $inputs['bedrooms'] == 4) ? 'selected' : '' ?>>4</option>
                                <option value="5" <?= (isset($inputs['bedrooms']) && $inputs['bedrooms'] == 5) ? 'selected' : '' ?>>5</option>
                                <option value="6" <?= (isset($inputs['bedrooms']) && $inputs['bedrooms'] == 6) ? 'selected' : '' ?>>6</option>
                            </select>
                            <?php if(isset($errors['bedrooms'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['bedrooms'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect" name="bathrooms">
                                <option value="">Choose Bathrooms *</option>
                                <option value="1" <?= (isset($inputs['bathrooms']) && $inputs['bathrooms'] == 1) ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= (isset($inputs['bathrooms']) && $inputs['bathrooms'] == 2) ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= (isset($inputs['bathrooms']) && $inputs['bathrooms'] == 3) ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= (isset($inputs['bathrooms']) && $inputs['bathrooms'] == 4) ? 'selected' : '' ?>>4</option>
                            </select>
                            <?php if(isset($errors['bathrooms'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['bathrooms'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect" name="WC">
                                <option value="">Choose WC</option>
                                <option value="1" <?= (isset($inputs['WC']) && $inputs['WC'] == 1) ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= (isset($inputs['WC']) && $inputs['WC'] == 2) ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= (isset($inputs['WC']) && $inputs['WC'] == 3) ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= (isset($inputs['WC']) && $inputs['WC'] == 4) ? 'selected' : '' ?>>4</option>
                            </select>
                            <?php if(isset($errors['WC'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['WC'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect" name="kitchen">
                                <option value="">Choose Kitchen</option>
                                <option value="1" <?= (isset($inputs['kitchen']) && $inputs['kitchen'] == 1) ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= (isset($inputs['kitchen']) && $inputs['kitchen'] == 2) ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= (isset($inputs['kitchen']) && $inputs['kitchen'] == 3) ? 'selected' : '' ?>>3</option>
                            </select>
                            <?php if(isset($errors['kitchen'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['kitchen'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect" name="living_room">
                                <option value="">Choose Living Room</option>
                                <option value="1" <?= (isset($inputs['living_room']) && $inputs['living_room'] == 1) ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= (isset($inputs['living_room']) && $inputs['living_room'] == 2) ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= (isset($inputs['living_room']) && $inputs['living_room'] == 3) ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= (isset($inputs['living_room']) && $inputs['living_room'] == 4) ? 'selected' : '' ?>>4</option>
                            </select>
                            <?php if(isset($errors['living_room'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['living_room'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label>Price *</label>
                            <input type="number" name="price" value="<?= isset($inputs['price']) ? $inputs['price'] : '' ?>" class="form-control w-75 <?= isset($errors['price']) ? 'is-invalid' : '' ?>" id="price" placeholder="Set Price">
                            <?php if(isset($errors['price'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['price'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                            <div class="text-center mb-4 pb-4">
                                <h4><i class="far fa-check-circle"></i> Extra Features</h4>
                            </div>

                            <div class="row row-cols-2 px-5">
                                <?php foreach($extras_json as $extra => $icon) : ?>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="<?= $extra ?>" id="<?= $extra ?>">
                                        <label class="form-check-label" for="<?= $extra ?>"><i class="<?= $icon ?>"></i> <?= $extra ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="col-md mt-5">
                                <div class="text-center mb-4">
                                    <h4><i class="fas fa-star"></i> Rating *</h4>
                                </div>
                                <select name="rating" class="form-control form-control-sm">
                                    <option value="">Choose Stars</option>
                                    <option value="1" <?= (isset($_GET['rating']) && $_GET['rating'] == 1) ? 'selected' : '' ?>>1</option>
                                    <option value="2" <?= (isset($_GET['rating']) && $_GET['rating'] == 2) ? 'selected' : '' ?>>2</option>
                                    <option value="3" <?= (isset($_GET['rating']) && $_GET['rating'] == 3) ? 'selected' : '' ?>>3</option>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                        <div class="text-center pb-4">
                            <h4><i class="fas fa-file-alt"></i> Description *</h4>
                        </div><br>
                        <textarea class="form-control" name="description" aria-label="With textarea" placeholder="Add Description"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                        <div class="text-center mb-4">
                            <h4><i class="fas fa-camera"></i> Photos</h4>
                        </div>
                        <div class="custom-file pb-5">
                            <input type="file" name="photos[]" class="custom-file-input" id="customFile" accept=".jpg, .jpeg" multiple>
                            <label class="custom-file-label" for="customFile">Choose photos</label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md">
                    <div class="border border-secondary rounded bg-white p-5 my-3">

                        <div class="text-center mb-4 pb-4">
                            <h4><i class="fas fa-phone"></i> Contact Info</h4>
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <label class="">Name *</label>
                                <input type="text" name="name" value="<?= isset($inputs['name']) ? $inputs['name'] : '' ?>" class="form-control w-75 <?= isset($errors['name']) ? 'is-invalid' : '' ?>" id="name" placeholder="Enter Name">
                            </div>

                            <?php if(isset($errors['name'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['name'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Surname *</label>
                            <input type="text" name="surname" value="<?= isset($inputs['surname']) ? $inputs['surname'] : '' ?>" class="form-control w-75 <?= isset($errors['surname']) ? 'is-invalid' : '' ?>" id="surname" placeholder="Enter Surname">
                            <?php if(isset($errors['surname'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['surname'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Email *</label>
                            <input type="email" name="email" value="<?= isset($inputs['email']) ? $inputs['email'] : '' ?>" class="form-control w-75 <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" placeholder="Enter Email">
                            <?php if(isset($errors['email'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['email'] ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Phone *</label>
                            <input type="text" name="phone" value="<?= isset($inputs['phone']) ? $inputs['phone'] : '' ?>" class="form-control w-75 <?= isset($errors['phone']) ? 'is-invalid' : '' ?>" id="phone" placeholder="Enter Phone">
                            <?php if(isset($errors['phone'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['phone'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

            </div>
            <div class="ml-3 text-right">
                <button type="submit" class="btn btn-secondary py-2 px-3">Publish</button>
            </div>
        </form>
    </div>

</main>

<?php include 'layout/footer.php'; ?>

<script type="text/javascript">
    var locations = <?php echo $locations_json_obj; ?>;
    var states_element = document.getElementById("states");
    var cities_element = document.getElementById("cities");

    states.addEventListener("change", getStateCities);

    function getStateCities() {
        var cities = locations[states.value]; // Array OR String

        if(Array.isArray(cities)) {
            // Array
            cities_element.options.length = 1;

            cities.forEach(function (city) {
                var option = document.createElement("option");
                option.text = city;
                option.value = city;
                cities_element.appendChild(option);
            });
        } else {
            // Anything else
            cities_element.options.length = 1;
        }
    }
</script>

<?php include 'layout/scripts.php'; ?>
