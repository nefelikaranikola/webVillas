<?php

session_start();
require '../config.php';

$locations = json_decode(file_get_contents("location.json"), true);
$states = array_keys($locations);
$extras_json = json_decode(file_get_contents("extras.json"), true);

// Check if user is logged in
if(empty($_SESSION['user_id'])) {
    header("Location: ../login.php?error=Please log in.");
    exit();
}

// Save Post Data into Variables
$id = $_POST['id'];
$title = trim($_POST['title']);
$excerpt = trim($_POST['excerpt']);

$state = $_POST['state'];
$city = $_POST['city'];
$address = (isset($_POST['address']) && !empty($_POST['address'])) ? trim($_POST['address']) : null;

$style = $_POST['style'] ?? null;
$zone = $_POST['zone'] ?? null;
$construction = $_POST['construction'] ?? null;

$capacity = trim($_POST['capacity']);
$building_area = trim($_POST['building_area']);
$plot = trim($_POST['plot_area']);
$bedrooms = $_POST['bedrooms'];
$bathrooms = $_POST['bathrooms'];
$WC = $_POST['WC'] ?? null;
$kitchen = $_POST['kitchen'] ?? null;
$living_room = $_POST['living_room'] ?? null;
$price = trim($_POST['price']);

$extras = (isset($_POST['extras']) && count($_POST['extras']) > 0) ? $_POST['extras'] : null; // array
$rating = $_POST['rating'];

$description = trim($_POST['description']);

$photos = (isset($_FILES['photos']) && !empty($_FILES['photos']['name'][0])) ? $_FILES['photos'] : null;

$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);

$errors = [];
$inputs = [];

//Check if title is valid - permitted characters
if(!isset($title) || strlen($title) > 150) {
    $errors['title'] = 'Please a valid title, less than 150 characters.';
} else {
    $inputs['title'] = $excerpt;
}

//Check if excerpt is valid - permitted characters
if(!isset($excerpt) || !preg_match("/\w/", $excerpt) || strlen($excerpt) > 150) {
    $errors['excerpt'] = 'Please a valid excerpt, less than 150 characters.';
} else {
    $inputs['excerpt'] = $excerpt;
}
// Check if state is one of the array elements
if(!in_array($state, $states) || empty($state)) {
    $errors['state'] = 'Your state is not valid.';
} else {
    $inputs['state'] = $state;
}

// Check if city is one of the array elements
if(!is_array($locations[$state]) || !in_array($city, $locations[$state]) || empty($city)) {
    $errors['city'] = 'Your city is not valid.';
} else {
    $inputs['city'] = $state;
}

//Check if address is valid - permitted characters
if(!is_null($address) && !preg_match("/\w/", $address)) {
    $errors['address'] = 'Your address is not valid.';
} else {
    $inputs['address'] = $address;
}

//Style
if(!is_null($style) && !in_array($style, ["Newly built", "Neoclassical", "Luxury", ""])) {
    $errors['style'] = 'Style is not valid.';
} else {
    $inputs['style'] = $style;
}

//Zone
if(!is_null($zone) && !in_array($zone, ["Residential", "Commercial", "Countryside", "Rural", ""])) {
    $errors['zone'] = 'Zone is not valid.';
} else {
    $inputs['zone'] = $zone;
}

//Construction
if(!is_null($construction) && !in_array($construction, ["1980", "1990", "2000", "2010", ""])) {
    $errors['construction'] = 'construction is not valid.';
} else {
    $inputs['construction'] = $construction;
}

// Check if numeric inputs are valid
//Villa's capacity
if(!is_numeric($capacity) || empty($capacity)) {
    $errors['capacity'] = 'The capacity is not valid.';
} else {
    $inputs['capacity'] = $capacity;
}

//Villa's building area
if(!is_numeric($building_area) || empty($building_area)) {
    $errors['building_area'] = 'The building area is not valid.';
} else {
    $inputs['building_area'] = $building_area;
}

//Villa's plot area
if(!is_numeric($plot) || empty($plot)) {
    $errors['plot'] = 'The plot area is not valid.';
} else {
    $inputs['plot'] = $plot;
}

//Villa's price
if(!is_numeric($price) || empty($price)) {
    $errors['price'] = 'Price is not valid.';
} else {
    $inputs['price'] = $price;
}

//Villa's bedrooms
if(!isset($bedrooms) || !in_array($bedrooms, ["1", "2", "3", "4", "5", "6"])) {
    $errors['bedrooms'] = 'Bedrooms are not valid.';
} else {
    $inputs['bedrooms'] = $bedrooms;
}

//Villa's bathrooms
if(!isset($bathrooms) || !in_array($bathrooms, ["1", "2", "3", "4"])) {
    $errors['bathrooms'] = 'Bathrooms are not valid.';
} else {
    $inputs['bathrooms'] = $bathrooms;
}

//Villa's WC
if(!is_null($WC) && !in_array($WC, ["1", "2", "3", "4", ""])) {
    $errors['WC'] = 'WC is not valid.';
} else {
    $inputs['WC'] = $WC;
}

//Villa's Kitchen
if(!is_null($kitchen) && !in_array($kitchen, ["1", "2", "3", ""])) {
    $errors['kitchen'] = 'Kitchen is not valid.';
} else {
    $inputs['kitchen'] = $kitchen;
}

//Villa's Living room
if(!is_null($living_room) && !in_array($living_room, ["1", "2", "3", "4", ""])) {
    $errors['living_room'] = 'Living room is not valid.';
} else {
    $inputs['living_room'] = $living_room;
}

//Villa's Rating
if(!isset($rating) || !in_array($rating, ["1", "2", "3"])) {
    $errors['rating'] = 'Rating is not valid.';
} else {
    $inputs['rating'] = $rating;
}

//Check if description is valid - permitted characters
if(!isset($description) || !preg_match("/\w/", $description)) {
    $errors['description'] = 'Please add a description.';
} else {
    $inputs['description'] = $description;
}

//Villa's extras
if(!is_null($extras) && is_array($extras)) {
    /* Για το function: Η τιμή ('found' or 'not_found') του αποτελέσματος του αν υπαρχει ενα συγκεκριμένο extra
    μέσα στο πίνακα extras του json. */
    // χολι σιτ
    /**
     * Τσεκάρει ενα ένα τα στοιχεία που επέλεξε ο χρήστης
     * Στο κάθε στοιχείο απο αυτά τρέχει την απο πάνω λογική
     * Το τελικό αποτέλεσμα είναι ένας πίνακας με στοιχεία όσα αυτά που εχει τσεκάρει
     * ο χρήστης, με τιμές στο κάθε στοιχείο του το αποτέλεσμα της απο πάνω λογικής
     * δηλαδή true or false
     */
    $checked_extras_values = array_map(function($extra) use ($extras_json) {
        if(in_array($extra, array_keys($extras_json))) {
            $found = 'found';
        } else {
            $found = 'not_found';
        }

        return $found;
    }, $extras);

    if(in_array('not_found', $checked_extras_values)) {
        $errors['extras'] = 'Extras are not valid.';
    } else {
        $inputs['extras'] = $extras;
    }
}

//Check if name is valid - permitted characters
if(!preg_match("/\w/", $name) || empty($name)) {
    $errors['name'] = 'Your name is not valid.';
} else {
    $inputs['name'] = $name;
}

//Check if surname is valid - permitted characters
if(!preg_match("/\w/", $surname) || empty($surname)) {
    $errors['surname'] = 'Your surname is not valid.';
} else {
    $inputs['surname'] = $surname;
}

// Check if phone is valid
if(!is_numeric($phone) || strlen($phone) != 10 || empty($phone))  {
    $errors['phone'] = 'The phone is not valid.';
} else {
    $inputs['phone'] = $phone;
}

// Check if email is valid
if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
    $errors['email'] = 'Your email is not valid.';
} else {
    $inputs['email'] = $email;
}

$photo_max_size = 512000; //500KB

if(!is_null($photos)) {
    foreach($photos['type'] as $photo_type) {
        if($photo_type != 'image/jpeg') {
            $errors['photos'] = 'Choose only jpeg type photos.';
        }

        break;
    }

    foreach($photos['size'] as $photo_size) {
        if($photo_size > $photo_max_size) {
            $errors['photos'] .= 'Max allowed photos size is 500KB.';
        }

        break;
    }
}

//print_r($photos); die;

if(count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header('Location: ../edit_villa.php?id='.$id);
    exit();
}

try {
    // Insert data into villas table
    $sql = "UPDATE villas SET title = :title, excerpt = :excerpt, state = :state, city = :city, address = :address, style = :style, zone = :zone, construction = :construction, capacity = :capacity, building_area = :building_area, plot_area = :plot_area, bedrooms = :bedrooms, bathrooms = :bathrooms, WC = :WC, kitchen = :kitchen, living_room = :living_room, rating = :rating, price = :price, extras = :extras, description = :description, name = :name, surname = :surname, phone = :phone, email = :email WHERE id = :id";
    $values = [
        ':id' => $id,
        ':title' => $title,
        ':excerpt' => $excerpt,
        ':state' => $state,
        ':city' => $city,
        ':address' => $address,
        ':style' => $style,
        ':zone' => $zone,
        ':construction' => $construction,
        ':capacity' => $capacity,
        ':building_area' => $building_area,
        ':plot_area' => $plot,
        ':bedrooms' => $bedrooms,
        ':bathrooms' => $bathrooms,
        ':WC' => $WC,
        ':kitchen' => $kitchen,
        ':living_room' => $living_room,
        ':rating' => $rating,
        ':price' => $price,
        ':extras' => !is_null($extras) ? json_encode($extras) : null,
        ':description' => $description,
        ':name' => $name,
        ':surname' => $surname,
        ':phone' => $phone,
        ':email' => $email
    ];

    $statement = $pdo->prepare($sql);
    $insert_data = $statement->execute($values);

    if(!$insert_data) {
        $errors['general'] = 'Something went wrong. Please try again!';
    }

    // Photos insert to db and save to server
    if(!is_null($photos)) {
        $sql = "DELETE FROM media WHERE villa_id = :villa_id";
        $values = [
            ':villa_id' => $id,
        ];

        $statement = $pdo->prepare($sql);
        $insert_data = $statement->execute($values);

        foreach($photos['tmp_name'] as $index => $photo_tmp_name) {
            $photo_final_name = time().uniqid(mt_rand(100,999)).'.jpg';

            $sql = "INSERT INTO media (villa_id, name, description) VALUES (:villa_id, :name, :description)";
            $values = [
                ':villa_id' => $id,
                ':name' => $photo_final_name,
                ':description' => 'desc'
            ];

            $statement = $pdo->prepare($sql);
            $insert_data = $statement->execute($values);

            if(!$insert_data) {
                $errors['general'] .= $photos['name'][$index].' error saving to database.';
            }

            if(!move_uploaded_file($photo_tmp_name, '../img/uploads/'.$photo_final_name)) {
                $errors['general'] .= $photos['name'][$index].' uploading error!';
            }
        }
    }

    $statement->closeCursor();
    $pdo = null;

    if(!array_key_exists('general', $errors)) {
        header('Location: ../browse.php?success=Your Villa was submitted succesfully!');
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header('Location: ../edit_villa.php?id='.$id);
        exit();
    }
} catch(PDOException $e) {
    $message = 'PDO Exception: <strong>'.$e->getMessage().'</strong>';
    exit($message);
}
?>
