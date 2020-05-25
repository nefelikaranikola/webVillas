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

        <form action="src/inc_publish.php" method="POST">
            <div class="row">
                <div class="col-md">
                    <div class="border border-secondary rounded bg-white p-5 my-3">
                        <div class="text-center mb-4 pb-4">
                            <h4><i class="fas fa-home"></i> Title</h4>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="" for="title">Title</label>
                            <input type="text" name="title" class="form-control w-75" id="title" placeholder="Enter Villa's Name">
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
                            <label class="">State</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect" name="state">
                                <option selected>Choose State</option>
                                <option value="Achaia">Achaia</option>
                                <option value="Arcadia">Arcadia</option>
                                <option value="Arta">Arta</option>
                                <option value="Argolida">Argolida</option>
                                <option value="Attica">Attica</option>
                                <option value="Boeotia">Boeotia</option>
                                <option value="Chania">Chania</option>
                                <option value="Chios">Chios</option>
                                <option value="Corinth">Corinth</option>
                                <option value="Corfu">Corfu</option>
                                <option value="Cyclades">Cyclades</option>
                                <option value="Dodecanese">Dodecanese</option>
                                <option value="Drama">Drama</option>
                                <option value="Evia">Evia</option>
                                <option value="Evros">Evros</option>
                                <option value="Etoloakarnania">Etoloakarnania</option>
                                <option value="Evritania">Evritania</option>
                                <option value="Florina">Florina</option>
                                <option value="Fokida">Fokida</option>
                                <option value="Fthiotida">Fthiotida</option>
                                <option value="Grevena">Grevena</option>
                                <option value="Halkidiki">Halkidiki</option>
                                <option value="Heraklion">Heraklion</option>
                                <option value="Ilia">Ilia</option>
                                <option value="Imathia">Imathia</option>
                                <option value="Ioannina">Ioannina</option>
                                <option value="Karditsa">Karditsa</option>
                                <option value="Kastoria">Kastoria</option>
                                <option value="Kavala">Kavala</option>
                                <option value="Kefallinias">Kefallinias</option>
                                <option value="Kilkis">Kilkis</option>
                                <option value="Kozani">Kozani</option>
                                <option value="Laconia">Laconia</option>
                                <option value="Larissa">Larissa</option>
                                <option value="Lassithi">Lassithi</option>
                                <option value="Lefkada">Lefkada</option>
                                <option value="Lesvos">Lesvos</option>
                                <option value="Magnesia">Magnesia</option>
                                <option value="Messinia">Messinia</option>
                                <option value="Pella">Pella</option>
                                <option value="Pieria">Pieria</option>
                                <option value="Preveza">Preveza</option>
                                <option value="Rethymnon">Rethymnon</option>
                                <option value="Rodopi">Rodopi</option>
                                <option value="Samos">Samos</option>
                                <option value="Serres">Serres</option>
                                <option value="Thesprotia">Thesprotia</option>
                                <option value="Thessaloniki">Thessaloniki</option>
                                <option value="Trikala">Trikala</option>
                                <option value="Xanthi">Xanthi</option>
                                <option value="Zakynthos">Zakynthos</option>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">City</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect" name="city">
                                <option selected>Choose City</option>
                                <option value="Agios_Nikolaos">Agios Nikolaos</option>
                                <option value="Alexandroupoli">Alexandroupoli</option>
                                <option value="Amfissa">Amfissa</option>
                                <option value="Arcadia">Arcadia</option>
                                <option value="Athens">Athens</option>
                                <option value="Arta">Arta</option>
                                <option value="Chania">Chania</option>
                                <option value="Chios">Chios</option>
                                <option value="Corinth">Corinth</option>
                                <option value="Corfu">Corfu</option>
                                <option value="Cyclades">Cyclades</option>
                                <option value="Dodecanese">Dodecanese</option>
                                <option value="Drama">Drama</option>
                                <option value="Edessa">Edessa</option>
                                <option value="Evia">Evia</option>
                                <option value="Etoloakarnania">Etoloakarnania</option>
                                <option value="Florina">Florina</option>
                                <option value="Grevena">Grevena</option>
                                <option value="Heraklion">Heraklion</option>
                                <option value="Igoumenitsa">Igoumenitsa</option>
                                <option value="Ioannina">Ioannina</option>
                                <option value="Kalamata">Kalamata</option>
                                <option value="Karditsa">Karditsa</option>
                                <option value="Kastoria">Kastoria</option>
                                <option value="Kavala">Kavala</option>
                                <option value="Kefallinias">Kefallinias</option>
                                <option value="Karpenisi">Karpenisi</option>
                                <option value="Kilkis">Kilkis</option>
                                <option value="Komotini">Komotini</option>
                                <option value="Kozani">Kozani</option>
                                <option value="Lamia">Lamia</option>
                                <option value="Larissa">Larissa</option>
                                <option value="Lefkada">Lefkada</option>
                                <option value="Livadia">Livadia</option>
                                <option value="Mitiline">Mitiline</option>
                                <option value="Nafplio">Nafplio</option>
                                <option value="Patra">Patra</option>
                                <option value="Pieria">Pieria</option>
                                <option value="Pirgos">Pirgos</option>
                                <option value="Poligiros">Poligiros</option>
                                <option value="Preveza">Preveza</option>
                                <option value="Rethymnon">Rethymnon</option>
                                <option value="Samos">Samos</option>
                                <option value="Sparta">Sparta</option>
                                <option value="Serres">Serres</option>
                                <option value="Thessaloniki">Thessaloniki</option>
                                <option value="Trikala">Trikala</option>
                                <option value="Veria">Veria</option>
                                <option value="Volos">Volos</option>
                                <option value="Xanthi">Xanthi</option>
                                <option value="Zakynthos">Zakynthos</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Address</label>
                            <input type="text" name="address" class="form-control w-75" id="colFormLabel" placeholder="Enter Address">
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
                                    <option selected>Choose Style</option>
                                    <option value="Newly-built">Newly built</option>
                                    <option value="Neoclassical">Neoclassical</option>
                                    <option value="Luxury">Luxury</option>
                                </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Zone</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect" name="zone">
                                <option selected>Choose Zone</option>
                                <option value="Residential">Residential</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Countryside">Countryside</option>
                                <option value="Rural">Rural</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Construction</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect" name="construction">
                                <option selected>Choose Range</option>
                                <option value="1980">1980</option>
                                <option value="1990">1990</option>
                                <option value="2000">2000</option>
                                <option value="2010">2010</option>
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
                            <label>Price</label>
                            <input type="text" name="price" class="form-control w-75" id="colFormLabel" placeholder="Set Price">
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label>Building Area</label>
                            <input type="text" name="building_area" class="form-control w-75" id="colFormLabel" placeholder="Set Building Area">
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label>Plot Area</label>
                            <input type="text" name="plot_area" class="form-control w-75" id="colFormLabel" placeholder="Set Plot Area">
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label>Type</label>
                            <select class="custom-select w-75" id="inlineFormCustomSelect" name="type">
                                <option selected>Choose Type</option>
                                <option value="Duplex">Duplex</option>
                                <option value="Maisonette">Maisonette</option>
                                <option value="Split_Level">Split Level</option>
                                <option value="Ground_Floor">Ground Floor</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class="">Rooms</label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect" name="rooms">
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
                            <select class="custom-select w-50" id="inlineFormCustomSelect" name="rooms">
                                <option selected>Choose Bathrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect" name="rooms">
                                <option selected>Choose WC</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect" name="rooms">
                                <option selected>Choose Kitchen</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <div class="form-group d-flex justify-content-between align-items-baseline">
                            <label class=""></label>
                            <select class="custom-select w-50" id="inlineFormCustomSelect" name="rooms">
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
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="wifi" id="wifi">
                                        <label class="form-check-label" for="wifi"><i class="fas fa-wifi"></i> Wifi</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="pool" id="pool">
                                        <label class="form-check-label" for="pool"><i class="fas fa-swimming-pool"></i> Pool</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="sea_view" id="sea_view">
                                        <label class="form-check-label" for="pool"><i class="fas fa-water"></i> Sea View</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="aircondition" id="aircondition">
                                        <label class="form-check-label" for="pool"><i class="fas fa-fan"></i> Air Condition</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="fireplace" id="fireplace">
                                        <label class="form-check-label" for="pool"><i class="fas fa-fire-alt"></i> Fireplace</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="playroom" id="playroom">
                                        <label class="form-check-label" for="pool"><i class="fas fa-gamepad"></i> Playroom</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="jacuzzi" id="jacuzzi">
                                        <label class="form-check-label" for="pool"><i class="fas fa-hot-tub"></i> Jacuzzi</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="elevator" id="elevator">
                                        <label class="form-check-label" for="pool"><i class="fas fa-angle-double-up"></i> Elevator</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="internal_stairway" id="internal_stairway">
                                        <label class="form-check-label" for="stairway"><i class="fas fa-shoe-prints"></i> Stairway</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="balcony" id="balcony">
                                        <label class="form-check-label" for="pool"><i class="fas fa-grip-lines"></i> Balcony</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="parking" id="parking">
                                        <label class="form-check-label" for="pool"><i class="fas fa-warehouse"></i> Parking</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="garden" id="garden">
                                        <label class="form-check-label" for="garden"><i class="fab fa-pagelines"></i> Garden</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="storage" id="storage">
                                        <label class="form-check-label" for="storage"><i class="fas fa-archive"></i> Storage</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="safety_door" id="safety_door">
                                        <label class="form-check-label" for="door"><i class="fas fa-door-closed"></i> Safety Door</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="furnished" id="furnished">
                                        <label class="form-check-label" for="furnished"><i class="fas fa-couch"></i> Furnished</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="attic" id="attic">
                                        <label class="form-check-label" for="attic"><i class="fas fa-angle-up"></i> Attic</label>
                                    </div>
                                    <div class="form-check py-3">
                                        <input class="form-check-input" name="extras[]" type="checkbox" value="solar_panel" id="solar_panel">
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
                        <textarea class="form-control" name="description" aria-label="With textarea" placeholder="Add Description"></textarea>
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
                            <input type="email" name="email" class="form-control w-75" id="colFormLabel" placeholder="Enter Email">
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
