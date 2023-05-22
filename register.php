<?php
    include 'dbconnection.php';
    include 'includes/header.php';
    session_start();
?>
<style>
.error {
    color: red;
}
</style>
<div class="container mt-5">
    <?php include 'session_message.php'; ?>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Registration Page</h5>
                    <form action="crud/auth.php" method="post" id='register'>
                        <div class="row my-5 justify-content-around">                            
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email"
                                        aria-describedby="emailHelp" required>
                                    <span class="error"></span>
                                </div>                                                 
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Mobile No</label>
                                    <input type="text" class="form-control form-control-sm" id="phoneno" name="phoneno"
                                        maxlength="10" required>
                                    <span class="error"></span>
                                </div>                                          
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control form-control-sm" id="password"
                                        name="password" required>
                                    <span class="error"></span>
                                </div>                                                       
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control form-control-sm" id="confirmpassword"
                                        name="confirmpassword" required>
                                    <span class="error"></span>
                                </div>                            
                            <div class="text-center">
                                <input type="hidden" name="module" value="register">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <a href="index.php" class="btn btn-outline-primary">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php';?>
<script>
$('#register').validate({
    rules: {
        email: {
            required: true,
            email: true,
        },
        phoneno: {
            required: true,
            minlength: 10,
        },
        password: {
            required: true,
            minlength: 5,
        },
        confirmpassword: {
            required: true,
            minlength: 5,
        }
    },
    messages: {
        email: {
            required: "Please enter email",
            email: "Please enter valid email",
        },
        phoneno: {
            required: "Please enter Mobile No",
            minlength: "Mobile  must be 10 characters",
        },
        password: {
            required: "Please enter password",
            minlength: "Password must be 5 characters",
        },
        confirmpassword: {
            required: "Please enter confirmpassword",
            minlength: "Password must be 5 characters",
        }
    }
});
</script>