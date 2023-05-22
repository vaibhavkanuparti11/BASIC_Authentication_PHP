<?php
session_start();
include 'dbconnection.php';
include 'includes/header.php';
echo 'profile';
?>
<p><b>Welcome</b> <?php echo $_SESSION['email'];?></p>
<?php 
$email=$_SESSION['email'];
print_r($_SESSION);
echo "SELECT * FROM user WHERE email='$email'";
$sql=$conn->query("SELECT * FROM user WHERE email='$email'");
$row=$sql ->fetch_assoc();
?>
<div class="container">
   <a href="dashboard.php" class="btn btn-outline-primary">Back</a>   
    <?php include 'session_message.php';?>
    <div class="row justify-content-center">   
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5><div class="card-title text-center">Profile</div></h5>    
                     <div class="text-center">
                            <img src="images/<?= $row['image'];?>" width="50" height="50"></img><br>
                    </div>                 
                    First Name:&nbsp;&nbsp;<?= $row['firstname'];?><br>
                    Last Name:&nbsp;&nbsp;<?= $row['lastname'];?><br>
                    Email:&nbsp;&nbsp;<?= $row['email'];?><br>
                    User Name:&nbsp;&nbsp;<?= $row['email'];?><br>
                    Date of Birth:&nbsp;&nbsp;<?= $row['dateofbirth'];?><br>
                    Gender:&nbsp;&nbsp;<?= $row['gender'];?><br>
                    Mobile Nimber:&nbsp;&nbsp;<?= $row['mobilenumber'];?><br>
                    Recovery Mail:&nbsp;&nbsp;<?= $row['recoverymail'];?>                                     
                </div>
            </div>
        </div>
    </div>
</div>

