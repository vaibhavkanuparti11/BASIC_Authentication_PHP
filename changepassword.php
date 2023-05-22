<?php
session_start();
include 'dbconnection.php';
include 'includes/header.php';
echo 'profile';
?>
<p><b>Welcome</b> <?php echo $_SESSION['email'];?></p>
<div class="container">
   <a href="dashboard.php" class="btn btn-outline-primary">Back</a>   
    <?php include 'session_message.php';?>
    <?php 
        $email=$_SESSION['email'];
        $sql=$conn->query("SELECT * FROM user WHERE email='$email'");
        $row=$sql ->fetch_assoc();
    ?>
    <div class="row justify-content-center">   
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5><div class="card-title text-center">Profile</div></h5>                   
                    <form action="crud/update.php" method="POST" id="cpwd" enctype="multipart/form-data">
                        <div class="text-center">
                                <img src="images/<?= $row['image'];?>" width="50" height="50"></img><br>
                        </div>                              
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Image</label>
                            <input type="file" class="form-control" placeholder="Recovery Mail" name="image">
                        </div>                                     
                        <div class="mb-3">                             
                           <label for="pwd" class="form-label">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="password">
                        </div>  
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" placeholder="Enter Confirm Password" name="confirmpassword">
                        </div>                          
                        <input type="hidden" name="module" value="changepassword"> 
                        <input type="hidden" name="email" value="<?= $row['email'];?>"> 
                        <input type="hidden" name="old_image" value="<?= $row['image'];?>">                       
                        <button type="submit" class="btn btn-primary">Submit</button>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php';?>
<script>
$('#cpwd').validate({
    rules: {
        password: {
            required: true,
            firstname: true,
        },
        confirmpassword: {
            required: true,
            lastname: true,
        },           
    },
    messages: {
        password: {
            required: "Please enter new password",           
        },
        confirmpassword: {
            required: "Please enter confirmpassword",           
        },         
    }
});
</script>