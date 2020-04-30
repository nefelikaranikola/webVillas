<?php

session_start();
require 'config.php';
$title = "Register";
include 'layout/header.php';

?>


<main class="bg-light py-4">

<div class="container py-5" style="height: 85vh;">
        <div class="row">
            <div class="col-6 offset-3 p-5 my-5 bg-white border border-secondary rounded">
                <h3 class="mb-4 text-center">Create your Account</h3>

                <form action="src/inc_register.php"  method="POST">
                    <div class="form-group">
                        <label for="username">Enter username</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input id="username" type="text" name="username" value="" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Enter your email</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            </div>
                            <input id="email" type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Enter your Password</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input id="password" type="password" name="password" class="form-control" placeholder="Password">
                            <small id="passwordHelpBlock" class="form-text text-muted mb-0">
                                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters except '_', or emoji.
                            </small>
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

                    <div class="form-group text-center mt-5">
                        <button class="btn btn-secondary px-3" type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</main>

<?php include 'layout/footer.php'; ?>
