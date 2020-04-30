<?php

session_start();
require 'config.php';
$title = "Publish";
include 'layout/header.php';

?>


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
        </div>

        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                        <div class="text-center mb-4 pb-4">
                            <h4><i class="fas fa-search-location"></i>  Location</h4>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">State</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect">
                                <option selected>Choose State</option>
                                <option value="1">Magnisia</option>
                                <option value="2">Thessaloniki</option>
                                <option value="3">Chania</option>
                                <option value="4">Cyclades</option>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">City</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect">
                                <option selected>Choose City</option>
                                <option value="1">Volos</option>
                                <option value="2">Thessaloniki</option>
                                <option value="3">Chania</option>
                                <option value="4">Santorine</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Address</label>
                            <input type="text" class="form-control w-75" id="colFormLabel" placeholder="Enter Address">
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
                                <select class="custom-select w-75" id="inlineFormCustomSelect">
                                    <option selected>Choose Style</option>
                                    <option value="1">Newly built</option>
                                    <option value="2">Neoclassical</option>
                                    <option value="3">Luxury</option>
                                </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Zone</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect">
                                <option selected>Choose Zone</option>
                                <option value="1">Residential</option>
                                <option value="2">Commercial</option>
                                <option value="3">Countryside</option>
                                <option value="4">Rural</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Construction</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect">
                                <option selected>Choose Range</option>
                                <option value="1">1980</option>
                                <option value="2">1990</option>
                                <option value="3">2000</option>
                                <option value="4">2010</option>
                            </select>
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
                            <label class="">Price</label>
                            <input type="text" class="form-control w-75" id="colFormLabel" placeholder="Set Price">
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Building Area</label>
                            <input type="text" class="form-control w-75" id="colFormLabel" placeholder="Set Building Area">
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Plot Area</label>
                            <input type="text" class="form-control w-75" id="colFormLabel" placeholder="Set Plot Area">
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Type</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect">
                                <option selected>Choose Type</option>
                                <option value="1">Duplex</option>
                                <option value="2">Maisonette</option>
                                <option value="3">Split Level</option>
                                <option value="4">Ground Floor</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Rooms</label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect">
                                <option selected>Choose Bedrooms</option>
                                <option value="1">2</option>
                                <option value="2">3</option>
                                <option value="3">4</option>
                                <option value="4">5</option>
                                <option value="5">6 +</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect">
                                <option selected>Choose Bathrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect">
                                <option selected>Choose WC</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect">
                                <option selected>Choose Kitchen</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect">
                                <option selected>Choose Living Room</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                            <div class="text-center mb-4 pb-4">
                                <h4><i class="far fa-check-circle"></i> Extra Features</h4>
                            </div>

                            <div class="row px-5">
                                <div class="col-md-6">
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="wifi">
                                        <label class="form-check-label" for="pool"><i class="fas fa-wifi"></i> Wifi</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="pool">
                                        <label class="form-check-label" for="pool"><i class="fas fa-swimming-pool"></i> Pool</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="sea view">
                                        <label class="form-check-label" for="pool"><i class="fas fa-water"></i> Sea View</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="aircondition">
                                        <label class="form-check-label" for="pool"><i class="fas fa-fan"></i> Air Condition</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="fireplace">
                                        <label class="form-check-label" for="pool"><i class="fas fa-fire-alt"></i> Fireplace</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="playroom">
                                        <label class="form-check-label" for="pool"><i class="fas fa-gamepad"></i> Playroom</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="jacuzzi">
                                        <label class="form-check-label" for="pool"><i class="fas fa-hot-tub"></i> Jacuzzi</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="elevator">
                                        <label class="form-check-label" for="pool"><i class="fas fa-angle-double-up"></i> Elevator</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="internal stairway">
                                        <label class="form-check-label" for="stairway"><i class="fas fa-shoe-prints"></i> Stairway</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="balcony">
                                        <label class="form-check-label" for="pool"><i class="fas fa-grip-lines"></i> Balcony</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="parking">
                                        <label class="form-check-label" for="pool"><i class="fas fa-warehouse"></i> Parking</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="garden">
                                        <label class="form-check-label" for="garden"><i class="fab fa-pagelines"></i> Garden</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="storage">
                                        <label class="form-check-label" for="storage"><i class="fas fa-archive"></i> Storage</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="safety door">
                                        <label class="form-check-label" for="door"><i class="fas fa-door-closed"></i> Safety Door</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="furnished">
                                        <label class="form-check-label" for="furnished"><i class="fas fa-couch"></i> Furnished</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="attic">
                                        <label class="form-check-label" for="attic"><i class="fas fa-angle-up"></i> Attic</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" type="checkbox" value="" id="solar panel">
                                        <label class="form-check-label" for="solar"><i class="fas fa-solar-panel"></i>  Solar Panel System</label>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                        <div class="text-center pb-4">
                            <h4><i class="fas fa-file-alt"></i> Description</h4>
                        </div><br>
                        <textarea class="form-control" aria-label="With textarea" placeholder="Add Description"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                        <div class="text-center mb-4">
                            <h4><i class="fas fa-camera"></i> Photos</h4>
                        </div>
                        <div class="custom-file pb-5">
                            <input type="file" class="custom-file-input" id="customFile">
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

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Name</label>
                            <input type="text" class="form-control w-75" id="colFormLabel" placeholder="Enter Name">
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Surname</label>
                            <input type="text" class="form-control w-75" id="colFormLabel" placeholder="Enter Surname">
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Email</label>
                            <input type="email" class="form-control w-75" id="colFormLabel" placeholder="Enter Email">
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Phone</label>
                            <input type="email" class="form-control w-75" id="colFormLabel" placeholder="Enter Phone">
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
