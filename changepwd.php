<?php
include 'dbconnection.php';
include 'includes/header.php';
session_start();
?>
<div class="container">
    <?php include 'session_message.php';?>
    <div class="row"> 
        <?php
        if(isset($_GET['email']))  {
        $email=$_GET['email'];
        $sql=mysqli_query($conn,"SELECT * FROM user WHERE email='$email'");
        $row=mysqli_fetch_assoc($sql);
       // print_r($row);
    }
        ?>
<div class="card mt-5 justify-content-center" style="width:40rem;margin-left:17rem;">
    <div class="card-body">
     <h5 class="card-title text-center">Reset Password</h5>
        <form action="crud/update.php" method="post">      
            <div class="form-group">
                <label class="control-label" for="validationCustom02">New Password</label>
                <input type="password" class="form-control form-control-sm" id="newpassword" name="newpassword" placeholder="New Password" required>
                <span class="error"></span>
            </div><br>
            <div class="form-group">
                <label class="control-label" for="validationCustom01">Confirm New Password</label>
                <input type="password" class="form-control form-control-sm" id="cpassword" name="cpassword" placeholder="Confirm New Password" required>
                <span class="error"></span>
            </div>           
            <div class="text-center mt-5">
            <input type="hidden" class="form-control" name="module" value="changepwd">
            <input type="hidden" name="email" value="<?= $row['email'];?>">                                
            <button class="btn btn-danger" type="submit" name="submit">Update Password</button>
            <a href="index.php" class="btn btn-outline-primary">Login</a>
            </div>
        </form>
    </div>
</div>        
