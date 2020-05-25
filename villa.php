<?php

session_start();
require 'config.php';
include 'src/inc_villa.php';
$title = "Villa";
include 'layout/header.php';

?>

<main class="bg-light">

    <nav class="p-0 breadcrumb" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb pb-0">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="browse.php">Browse</a></li>
                <li class="breadcrumb-item active" aria-current="page">Villa</li>
            </ol>
        </div>
    </nav>

    <div class="container py-4">

        <div class="row row-cols-4 my-5">
            <div class="col p-2">
                <a href="img/oia.jpg" data-lightbox="roadtrip"><img src="img/oia.jpg" class="w-100"></a>
            </div>
            <div class="col p-2">
                <a href="img/santorini.jpg" data-lightbox="roadtrip" ><img src="img/santorini.jpg" class="w-100"></a>
            </div>
            <div class="col p-2">
                <a href="img/view.jpg" data-lightbox="roadtrip"><img src="img/view.jpg" class="w-100"></a>
            </div>
            <div class="col p-2">
                <a href="img/stonevilla.jpg" data-lightbox="roadtrip"><img src="img/stonevilla.jpg" class="w-100"></a>
            </div>
            <div class="col p-2">
                <a href="img/case.jpg" data-lightbox="roadtrip" ><img src="img/case.jpg" class="w-100"></a>
            </div>
            <div class="col p-2">
                <a href="img/view.jpg" data-lightbox="roadtrip"><img src="img/view.jpg" class="w-100"></a>
            </div>
            <div class="col p-2">
                <a href="img/lux.jpg" data-lightbox="roadtrip"><img src="img/lux.jpg" class="w-100"></a>
            </div>
            <div class="col p-2">
                <a href="img/santorini.jpg" data-lightbox="roadtrip" ><img src="img/santorini.jpg" class="w-100"></a>
            </div>

        </div>

        <div class="text-center mb-5">
            <h1><?= $record['title'] ?></h1>
            <h6 class="text-muted">2 guests · 1 bed · 1 bathroom</h6>
        </div>




        <div class="m-3 pt-5">
            <h3><i class="fas fa-align-left"></i> Description</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod atque minus eius sint blanditiis deserunt delectus ipsum ex voluptates cum. Harum a delectus dolorem? Vel, obcaecati modi impedit quia consectetur doloremque fugiat aliquam deserunt enim nobis tempora libero minima architecto! <br>
            - 3 minutes walking distance to the beach   <br>
            - 17 minutes walking distance to the city<br>
            - 8 minutes walking distance to the chappel</p>

        </div>

        <div class="m-3 pt-5">
            <h3> Amenities</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <label class="form-check-label py-2" for="wifi"><i class="fas fa-wifi"></i> Wifi</label><br>
                            <label class="form-check-label py-2" for="playroom"><i class="fas fa-gamepad"></i> Playroom</label><br>
                            <label class="form-check-label py-2" for="pool"><i class="fas fa-swimming-pool"></i> Pool</label><br>
                            <label class="form-check-label py-2" for="fireplace"><i class="fas fa-fire-alt"></i> Fireplace</label><br>
                            <label class="form-check-label py-2" for="aircondition"><i class="fas fa-fan"></i> Air Condition</label>
                        </div>
                        <div class="col-md-3">
                            <label class="form-check-label py-2" for="pool"><i class="fas fa-hot-tub"></i> Jacuzzi</label><br>
                            <label class="form-check-label py-2" for="pool"><i class="fas fa-grip-lines"></i> Balcony</label><br>
                        </div>
                    </div>

                </div>
                <div class="col-md-6"></div>
            </div>
        </div>

        <div class="row align-items-center pt-5">
            <div class="col-md-8">
                <div>
                    <h3><i class="fas fa-map-marker-alt"></i> Great Location</h3>
                    <p>95% of recent guests gave the location a 5-star rating.</p>
                    <h6 class="text-muted">Santorine · Cyclades · Greece</h6>
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
                    <p class="mt-5">+30 6946946571</p>
                    <p class="mt-3">host@gmail.com</p>
                    <div class="text-center mt-5">
                            <button type="submit" class="btn btn-secondary py-2 px-3">Book Here</button>
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
