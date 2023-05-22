<?php
session_start();
include 'dbconnection.php';
include 'includes/header.php';
?>

<div class="container mt-5">
<?php include 'session_message.php'; ?>
    <div class="card" style=" width: 30rem;margin-left:300px;">   
        <div class="card-header">
            <h5>Reset Password</h5>
        </div>
        <div class="card-body p-4">
            <form action="recoverymail.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="Enter email" required>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" name="submit" class="btn btn-primary">send password link</button>&nbsp;&nbsp;
                </div>

            </form>
        </div>
    </div>
</div>