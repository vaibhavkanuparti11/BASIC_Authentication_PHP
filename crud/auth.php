<?php
  include '../dbconnection.php';
  session_start();
  if($_POST['module']=='login'){  
    // print_r($_POST); 
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql=mysqli_query($conn,"SELECT * FROM user WHERE email='$email' AND password='$password'");   
    $row=mysqli_num_rows($sql);
    // print_r($row);
    if($row==1){ 
      $_SESSION['email']=$email;
      $_SESSION['status']=1;
      $_SESSION['message']="Welcome, $email";
      header('Location:../dashboard.php');
    }else{
      $_SESSION['status']=0;
      $_SESSION['message']="Invalid Username and Password";
      header('Location:../index.php');
    }    
   }
  else if($_POST['module']=='register'){
    print_r($_POST);
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $password=md5($_POST['password']);
    $confirmpassword=md5($_POST['confirmpassword']);  
    $result=mysqli_query($conn,"SELECT * FROM user WHERE email='$email'");
    if(mysqli_num_rows($result)>0){
      $_SESSION['status']=0;
      $_SESSION['message']="Email already Exist.";
      header('Location:../index.php');
    }else{
      if($password == $confirmpassword){
        $sql=mysqli_query($conn,"INSERT INTO user(email,phoneno,password) VALUES ('$email','$phoneno','$password')");      
        if($sql){
          $_SESSION['status']=1;
          $_SESSION['message']="User Registration Successful!!";
          header('Location:../index.php');
        }else{
          $_SESSION['status']=0;
          $_SESSION['message']="User Registration Failed.";
          header('Location:../register.php');
        }
      }else{
        $_SESSION['status']=0;
        $_SESSION['message']="Password and Confirm Password does not match";
        header('Location:../register.php');
      }          
    }    
  }
  
?>