<?php

session_start();
require 'config.php';
$title = "Login";
include 'layout/header.php';

?>

<!-- HTML -->
<main style="background-image: url(../img/bg.png);">
    <div class="container py-5" style="height: 85vh;">
        <div class="row my-5">
            <div class="col-6 offset-3 p-5 bg-light border border-secondary rounded">
                <h3 class="mb-4 text-center">Login You</h3>

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

                <form action="src/inc_login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            </div>
                            <input id="email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="from-group text-right">
                        <a href="#" class="btn btn-link">Forgot Password?</a>
                    </div>

                    <div class="form-group text-center my-3">
                        <button class="btn btn-secondary px-3" type="submit">Login</button>
                    </div>

                    <div class="from-group text-center mb-0">
                        <a href="register.php" class="btn btn-link">Don't have an account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include 'layout/footer.php'; ?>
