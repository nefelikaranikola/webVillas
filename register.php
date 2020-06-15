<?php
session_start();
require 'config.php';

// Activation

$title = "Register";
include 'layout/header.php';
//vardump();
/*
    if(isset($_SESSION['errors']))
        $errors = $_SESSION['errors'];
    else
        $errors = null;
*/
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
<main style="background-image: url(../img/bg.png);">

    <div class="container py-5" style="height: 100vh;">
        <div class="row my-5">
            <div class=" bg-light col-6 offset-3 p-5 border border-secondary rounded">
                <h3 class="mb-4 text-center">Create your Account</h3>

                <?php if(isset($errors['general'])) : ?>
                    <div class="alert alert-danger text-center" role="alert">
                        <?= $errors['general'] ?>
                    </div>
                <?php endif; ?>

                <form action="src/inc_register.php" method="POST">
                    <div class="form-group">
                        <label for="username">Enter Username *</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="username" type="text" name="username" value="<?= isset($inputs['username']) ? $inputs['username'] : '' ?>" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" placeholder="Username">
                            <?php if(isset($errors['username'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['username'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Enter Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            </div>
                            <input id="email" type="email" name="email" value="<?= isset($inputs['email']) ? $inputs['email'] : '' ?>" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" placeholder="Email">
                            <?php if(isset($errors['email'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['email'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Enter Password *</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" placeholder="Password">
                            <?php if(isset($errors['password'])) : ?>
                                <div class="invalid-feedback">
                                    <?= $errors['password'] ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="con_password">Confirm Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="con_password" type="password" name="con_password" class="form-control" placeholder="Password">
                        </div>
                    </div>

                    <div class="g-recaptcha  text-center mt-4 px-3" data-sitekey="6LdRGvwUAAAAAOWd4aEqW200GY_CLwHJ6hPsU8Yv"></div>

                    <div class="form-group text-center mt-5">
                        <button class="btn btn-secondary px-3" type="submit">Sign Up</button>
                    </div>

                    <small class="form-text text-muted mt-5 mb-0 text-center">
                        *Username and password must contain letters, numbers and '_'.
                        <br>
                        *Username must be 25 characters long max and password at least 8.
                    </small>
                </form>
            </div>
        </div>
    </div>

</main>

<?php include 'layout/footer.php'; ?>
<?php include 'layout/scripts.php'; ?>
