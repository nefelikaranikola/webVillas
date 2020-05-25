<?php

session_start();
require 'config.php';
include 'src/inc_browse.php';
$title = "Browse";
include 'layout/header.php';

?>

<main class="bg-light">

    <img src="https://buyandsell.gr/wp-content/uploads/2017/11/Agios_Nikolaos_banner_cropped.jpg" class="img-fluid w-100" alt="white and brown concrete houses">

    <nav class="p-0 breadcrumb" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb pb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="login.php">Login</a></li>
                <li class="breadcrumb-item active" aria-current="page">Publish</li>
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

        <div class="row">
            <div class="col-md-3 mx-4">
                <div class="form-group p-4 mt-5 border border-secondary rounded bg-white">
                    <label for="formControlRange" class="mb-3" style="font-weight: bold;"><i class="fas fa-euro-sign"></i>  Set price</label>
                    <input type="range" class="form-control-range" id="formControlRange">
                </div>

                <div class="p-4 mt-3 border border-secondary rounded bg-white">
                    <p class="mb-3" style="font-weight: bold;"><i class="fas fa-male"></i><i class="fas fa-female"></i>  Capacity</p>
                    <select class="form-control form-control-sm">
                        <option>Choose</option>
                        <option>2</option>
                        <option>4</option>
                        <option>6</option>
                        <option>8 +</option>
                    </select>
                </div>

                <div class="from-row p-4 mt-3 border border-secondary rounded bg-white">
                    <label for="col" class="mb-3" style="font-weight: bold;"><i class="fas fa-home"></i> Building Area</label>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="min m2">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="max m2">
                        </div>
                    </div>
                </div>

                <div class="p-4 mt-3 border border-secondary rounded bg-white">
                    <p class="mb-3" style="font-weight: bold;"><i class="fas fa-male"></i><i class="fas fa-female"></i>  Bedrooms</p>
                    <select class="form-control form-control-sm">
                        <option>Choose</option>
                        <option>2</option>
                        <option>4</option>
                        <option>6</option>
                        <option>8</option>
                    </select>
                </div>

                <div class="p-4 mt-3 border border-secondary rounded bg-white">
                    <p class="mb-3" style="font-weight: bold;"><i class="fas fa-star"></i>  Rating</p>
                    <select class="form-control form-control-sm">
                        <option>Choose</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>

                <div class="p-4 mt-3 border border-secondary rounded bg-white">
                    <p class="mb-3" style="font-weight: bold;"><i class="far fa-circle"></i> Features</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="wifi">
                        <label class="form-check-label" for="pool"><i class="fas fa-wifi"></i> Wifi</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pool">
                        <label class="form-check-label" for="pool"><i class="fas fa-swimming-pool"></i> Pool</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="sea view">
                        <label class="form-check-label" for="pool"><i class="fas fa-water"></i> Sea View</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="aircondition">
                        <label class="form-check-label" for="pool"><i class="fas fa-fan"></i> Air Condition</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="fireplace">
                        <label class="form-check-label" for="pool"><i class="fas fa-fire-alt"></i> Fireplace</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="playroom">
                        <label class="form-check-label" for="pool"><i class="fas fa-gamepad"></i> Playroom</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="jacuzzi">
                        <label class="form-check-label" for="pool"><i class="fas fa-hot-tub"></i> Jacuzzi</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="elevator">
                        <label class="form-check-label" for="pool"><i class="fas fa-angle-double-up"></i> Elevator</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="balcony">
                        <label class="form-check-label" for="pool"><i class="fas fa-grip-lines"></i> Balcony</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="solar panel">
                        <label class="form-check-label" for="pool"><i class="fas fa-solar-panel"></i>  Solar Panel System</label>
                    </div>
                </div>

                <div class="mt-3 text-right">
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </div>

            </div>

            <div class="col-md-8 py-4 my-5 border border-secondary rounded bg-white">
                <h3 class="pb-3 text-center">Luxury Villas</h3>

                <?php foreach ($records as $record) : ?>
                    <div class="card mb-3" style="max-width: 1080px;">
                        <div class="row no-gutters">

                            <div class="col-md-4 p-3">
                                <img src="img/pelion.jpg" class="card-img" alt="exotic villa">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $record['title'] ?></h5>
                                    <p class="card-text"><?= $record['excerpt'] ?>.</p>
                                    <a href="villa.php?id=<?= $record['id'] ?>" class="btn btn-link">See more</a>
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
