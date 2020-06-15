<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $title ?></title>

    <meta name="description" content="Explore the best villas in Greece and find your dream house here!">
    <meta name="keywords" content="villas, webvillas, Greece, seaside, luxury">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_dark.css">
    <link href="css/lightbox.css" rel="stylesheet"/>

    <? if($_COOKIE['css'] == 'light') : 'css/style_light.css' ?>


    <script src="https://kit.fontawesome.com/1afd2f5de6.js" crossorigin="anonymous"></script>

    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>
<body>


    <header>
        <!-- Menu -->
        <nav class="navbar navbar-expand-lg <?= (isset($_COOKIE['css']) && $_COOKIE['css'] == 'light') ? 'navbar-light bg-light' : 'navbar-dark bg-dark' ?> py-3">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="https://artisweb.gr/wp-content/uploads/2020/04/ArtisWeb-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                    webVillas
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="browse.php">Browse</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="greece.php" tabindex="-1" aria-disabled="true">Greece</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <?php if(empty($_SESSION['user_id'])) : ?>
                                <a class="nav-link" href="login.php">Login</a>
                            <?php else : ?>
                                <a class="nav-link" href="logout.php">Logout</a>
                            <?php endif; ?>
                        </li>

                        <li class="nav-item ml-0 ml-md-2">
                            <a class="nav-link btn btn-outline-secondary" href="publish.php">Publish</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
