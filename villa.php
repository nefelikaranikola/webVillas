<?php

session_start();
require 'config.php';
include 'src/inc_villa.php';
$title = "Villa";
include 'layout/header.php';

$extras_json = json_decode(file_get_contents("src/extras.json"), true);
$extras = !is_null($record['extras']) ? json_decode($record['extras']) : [];

?>


<main class="bg-light">

    <nav class="p-0 breadcrumb" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb pb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="browse.php">Browse</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $record['title'] ?></li>
            </ol>
        </div>
    </nav>

    <div class="container py-4">

        <div class="row row-cols-4 my-5 justify-content-center">
            <?php foreach($photos as $photo) : ?>
                <div class="col p-2">
                    <a href="img/uploads/<?= $photo['name'] ?>" data-lightbox="roadtrip"><img src="img/uploads/<?= $photo['name'] ?>" class="w-100"></a>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="text-center mb-5">
            <h1><?= $record['title'] ?></h1>
            <h6 class="text-muted"><?= $record['capacity'] ?> guests · <?= $record['bedrooms'] ?> beds · <?= $record['bathrooms'] ?> bathrooms</h6>
        </div>

        <div class="m-3 pt-5">
            <h3><i class="fas fa-align-left"></i> Description</h3>
            <p><?= $record['description'] ?></p>
            <p><?= $record['title'] ?> is located in <?= $record['state'] ?>, <?= $record['city'] ?>. It is a <?= $record['style'] ?> villa in a <?= $record['zone'] ?> area.</p>
            <p>The building's area is <?= $record['building_area'] ?>m2 and plot area is <?= $record['plot_area'] ?>m2</p>
            <p><?= $record['type'] ?></p>
        </div>

        <div class="m-3 pt-5">
            <h3> Amenities</h3>
            <div class="row pt-3">
                <div class="col-md-4">
                    <div class="row row-cols-2">
                        <?php if(count($extras) != 0): ?>
                            <?php foreach($extras as $extra) : ?>
                                <div class="col">
                                    <label class="form-check-label py-2" for="<?= $extra ?>"><i class="<?= $extras_json[$extra] ?>"></i> <?= $extra ?></label><br>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col">
                                <label class="form-check-label py-2">-</label>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-8"></div>
            </div>
        </div>

        <div class="row align-items-center pt-5">
            <div class="col-md-8">
                <div>
                    <h3><i class="fas fa-map-marker-alt"></i> Great Location</h3>
                    <p>95% of recent guests gave the location a 5-star rating.</p>
                    <h6 class="text-muted"><?= $record['state'] ?> · <?= $record['city'] ?> · Greece</h6>
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Santorine&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://www.embedgooglemap.net/blog/nordvpn-coupon-code/">embedgooglemap.net</a>
                        </div>
                        <style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="m-3 mt-5 pt-5 text-center">
                    <h3><i class="fas fa-phone"></i> Contact Host</h3>
                    <p class="mt-5"><?= $record['name'] ?> <?= $record['surname'] ?></p>
                    <p class="mt-3"><?= $record['phone'] ?></p>
                    <p class="mt-3"><?= $record['email'] ?></p>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-secondary py-2 px-3">Book Here</button>
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-secondary py-2 px-3">Edit</button>
                        <button type="submit" class="btn btn-secondary py-2 px-3">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Google map
        <div id="map-container-google-1" class="z-depth-1-half map-container"   style="height: 500px">
            <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
            style="border:0" allowfullscreen></iframe>
        </div>-->
    </div>
</main>

<?php include 'layout/footer.php'; ?>
<?php include 'layout/scripts.php'; ?>

