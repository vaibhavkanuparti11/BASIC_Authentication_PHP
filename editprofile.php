<?php
session_start();
include 'dbconnection.php';
include 'includes/header.php';
?>
<style>
.error {
    color: red;
}
</style>
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
                    <form name="profile" action="crud/update.php" method="POST" id="profile" enctype="multipart/form-data" onsubmit="return validations();">    
                        
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">First Name</label>
                            <input type="text"  class="form-control" placeholder="Enter First Name" name="firstname" value="<?= $row['firstname'];?>">
                            <span id="letter" class="error">
                           
                        </div>                                     
                        <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Last Name</label>
                           <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" value="<?= $row['lastname'];?>">
                        </div>                        
                        <div class="mb-3 mt-3">
                        
                            <label for="email" class="form-label">User Name</label>
                            <input type="email" class="form-control" placeholder="Enter User Name" name="username" value="<?= $row['email'];?>">
                            <!-- value="<?php //echo $_SESSION['email'];?> -->
                        </div>                                                                                    
                        <div class="mb-3">   
                            <label for="pwd" class="form-label">Date of Birth:</label>
                            <input id="datepicker" class="form-control" width="276" name="dob" value="<?= $row['dateofbirth'];?>" autocomplete="off" />                             
                        </div>
                        <div class="form-check">
                        <label for="pwd" class="form-label">Gender:</label><br>
                            <input type="radio" class="form-check-input" id="radio1" name="gender" value="male"<?php echo ($row['gender']=='male') ? 'checked':"";?>>
                            <label class="form-check-label" for="radio1">Male</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio2" name="gender" value="female" <?php echo ($row['gender']=='female') ? 'checked':"";?>>
                            <label class="form-check-label" for="radio2">Female</label>
                        </div>  
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Mobile Number:</label>
                            <input type="text" class="form-control" placeholder="Enter Mobile Mumber" name="mobilenumber" maxlength="10" value="<?= $row['mobilenumber'];?>">
                            <span id="numloc" class="error">
                        </div>   
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Recovery Mail:</label>
                            <input type="email" class="form-control" placeholder="Recovery Mail" name="recoverymail" value="<?= $row['recoverymail'];?>">
                        </div> 
                        <input type="hidden" name="module" value="editprofile">   
                        <input type="hidden" name="id" value="<?= $row['id'];?>">                                                                                                  
                        <button type="submit" class="btn btn-primary">Submit</button>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="script.js"></script>
<script>
         jQuery('#datepicker').datepicker({
            format: 'mm-dd-yyyy',
            autoclose:true,
            endDate: "today",

        }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });               
    </script> 
    <?php include 'includes/footer.php';?>
    <script>
$('#profile').validate({
    rules: {
        firstname: {
            required: true,
            firstname: true,           
            accept: "[a-zA-Z]+" ,                 
        },
        lastname: {
            required: true,
            lastname: true,
        },
        username: {
            required: true,
            username: true,
        },
        dob: {
            required: true,
            dob: true,
        },
        // gender: {
        //     required: true,
        //     gender: true,
        // },        
        mobilenumber: {
            required: true,
            minlength: 10,
        }, 
        recoverymail: {
            required: true,
            recoverymail: true,
        },     
    },
    messages: {
        firstname: {
            required: "Please enter firstname",  
            accept:" alphabet letters only",       
        },
        lastname: {
            required: "Please enter lastname",           
        },
        username: {
            required: "Please enter username",           
        },
        dob: {
            required: "Please enter dateofbirth",           
        },
        // gender: {
        //     required: "Please select gender",           
        // },
        mobilenumber: {
            required: "Please enter Mobile No",
            minlength: "Mobile  must be 10 characters",
        },  
        recoverymail: {
            required: "Please enter recoverymail",           
        },     
    }
});
</script>


   