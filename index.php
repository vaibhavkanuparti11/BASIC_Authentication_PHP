<?php
session_start();
    include 'dbconnection.php';
    include 'includes/header.php';     
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <h6 class="card-subtitle mb-2 text-muted text-white">Enter Username & Password</h6>
                    <?php include 'session_message.php'; ?>
                    <form action="crud/auth.php" method="post">
                        <div class="mb-3 mt-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control form-control-sm" id="email"
                                placeholder="Enter email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control form-control-sm" id="password"
                                placeholder="Enter password" name="password">
                        </div>
                        <input type="hidden" name="module" value="login">
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>

                        <a href="register.php" class="btn btn-outline-primary  btn-sm">Register</a>
                        <a href="forget.php" class="btn btn-link">Forgot password</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
