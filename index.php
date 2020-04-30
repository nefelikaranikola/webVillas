<?php

session_start();
require 'config.php';
include 'src/inc_index.php';
$title = "Home";
include 'layout/header.php';

?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img style="height: 50vh;" src="https://www.zakynthos-villas.com/images/accommodation/tambouros-boutique-villas/main.jpg" class="d-block w-100" alt="Carousel image">
            <div class="carousel-caption d-md-block">
                <h1>Welcome to webVillas</h1>
            </div>
        </div>

        <div class="carousel-item">
            <img style="height: 50vh;" src="img/carousel1.jpg" class="d-block w-100" alt="Carousel image">
            <div class="carousel-caption d-sm-block">
                <h1>Find your dream Villa</h1>
            </div>
        </div>

        <div class="carousel-item">
            <img style="height: 50vh;" src="img/carousel3.jpg" class="d-block w-100" alt="Carousel image">
            <div class="carousel-caption d-sm-block">
                <h1>Explore Greece's Gems</h1>
            </div>
        </div>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<main class="bg-light py-4">
    <div class="container">
        <form class="mb-4 p-5 bg-white text-center border border-secondary rounded">
            <div class="text-center pb-4">
                <h4><i class="fas fa-search"></i>  Search</h4>
            </div>
            <div class="form-row mb-3 text-left">
                <div class="col-md">
                    <label for="location" class="font-weight-light"><i class="fas fa-search-location"></i>  Location</label>
                    <input type="text" class="form-control" placeholder="Choose state">
                </div>

                <div class="col-md">
                    <label for="capacity" class="font-weight-light"><i class="fas fa-male"></i><i class="fas fa-female"></i> Capacity</label>
                    <input type="text" class="form-control" placeholder="Add visitors">
                </div>

                <div class="col-md">
                    <label for="price" class="font-weight-light"><i class="fas fa-euro-sign"></i> Price</label>
                    <input type="text" class="form-control" placeholder="Enter Price">
                </div>
            </div>

            <button class="btn btn-secondary px-3" type="submit">Let's go!</button>
        </form>

        <h3 class="my-5 text-center">Latest Entries</h3>

        <div class="row">
            <?php foreach ($records as $record) : ?>
                <div class="col-md">
                    <div class="card w-100">
                        <img src="img/pelion.jpg" class="card-img-top" alt="exotic">
                        <div class="card-body">
                            <h5 class="card-title"><?= $record['title'] ?></h5>
                            <p class="card-text"><?= $record['excerpt'] ?></p>
                            <a href="villa.php?id=<?= $record['id'] ?>" class="btn btn-link">See more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>



</main>

<?php include 'layout/footer.php'; ?>

