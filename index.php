<?php

session_start();
require 'config.php';
include 'src/inc_index.php';
$title = "Home";
include 'layout/header.php';
$states = array_keys(json_decode(file_get_contents("src/location.json"), true));

?>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/main.jpg" class="d-block w-100" alt="Carousel image">
      <div class="carousel-caption d-none d-md-block">
        <h1>Welcome to webVillas</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/carousel1.jpg" class="d-block w-100" alt="Carousel image">
      <div class="carousel-caption d-none d-md-block">
        <h1>Find your dream Villa</h1>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/carousel3.jpg" class="d-block w-100" alt="Carousel image">
      <div class="carousel-caption d-none d-md-block">
        <h1>Explore Greece's Gems</h1>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<main class="bg-light py-4">
  <div class="container">
      <form method="GET" action="browse.php" class="mb-4 p-5 bg-white text-center border border-secondary rounded">
          <div class="text-center pb-4">
              <h4><i class="fas fa-search"></i>  Search</h4>
          </div>
          <div class="form-row mb-3 text-left">
              <div class="col-md">
                  <label for="location" class="font-weight-light"><i class="fas fa-search-location"></i>  Location</label>
                  <select class="custom-select" id="location" name="state">
                      <option value="" selected>Choose State</option>
                      <?php foreach($states as $state) : ?>
                          <option value="<?= $state ?>"><?= $state ?></option>
                      <?php endforeach; ?>
                  </select>
              </div>

              <div class="col-md">
                  <label for="capacity" class="font-weight-light"><i class="fas fa-male"></i><i class="fas fa-female"></i> Capacity</label>
                  <input id="capacity" type="number" name="max-capacity" class="form-control" placeholder="Add visitors">
              </div>

              <div class="col-md">
                  <label for="price" class="font-weight-light"><i class="fas fa-euro-sign"></i> Price</label>
                  <input id="price" type="number" name="max-price" class="form-control" placeholder="Add price">
              </div>
          </div>

          <button class="btn btn-secondary <?= (isset($_COOKIE['css']) && $_COOKIE['css'] == 'light') ? 'btn btn-light' : 'btn btn-secondary' ?> px-3" type="submit">Let's go!</button>
      </form>

      <h3 class="my-5 text-center">Latest Entries</h3>

      <div class="row">
          <?php foreach ($records as $record) : ?>
              <div class="col-md">
                  <div class="card w-100">
                  <img src="<?= $record['name'] ? 'img/uploads/'.$record['name'] : 'img/main.jpg' ?>" class="card-img-cover" alt="exotic villa">
                      <div class="card-body">
                          <h5 class="card-title"><?= $record['title'] ?></h5>
                          <p class="card-text"><?= $record['excerpt'] ?></p>
                          <a href="villa.php?id=<?= $record['id'] ?>" class="btn btn-link">See more</a>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>

      </div>
      <div class="d-flex mt-3">
        <form method="POST" action="src/inc_css_cookie.php">
            <label class=" pl-2" for="">Change theme</label><br>
            <button type="submit"  name="css" value="dark" class="btn btn-secondary">Dark</button>
            <button type="submit" name="css" value="light" class="btn btn-dark">Light</button>
        </form>
      </div>
  </div>

</main>

<?php include 'layout/footer.php'; ?>
<?php include 'layout/scripts.php'; ?>

