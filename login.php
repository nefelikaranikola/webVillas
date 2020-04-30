<?php

session_start();
require 'config.php';
$title = "Login";
include 'layout/header.php';

?>

<!-- HTML -->
<main class="bg-light py-4">
    <div class="container py-5" style="height: 85vh;">
        <div class="row">
            <div class="col-6 offset-3 p-5 my-5 bg-white border border-secondary rounded">
                <h3 class="mb-4 text-center">Login You</h3>

                <form class="">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
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
