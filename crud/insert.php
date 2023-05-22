<?php
include '../dbconnection.php';
session_start();


if($_POST['module']=='profile'){
  print_r($_POST);
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $username=$_POST['username'];
  // $password=md5($_POST['password']);
  // $confirmpassword=md5($_POST['confirmpassword']);
  $dob=$_POST['dob'];
  $gender=$_POST['gender'];
  $mobilenumber=$_POST['mobilenumber'];
  $recoverymail=$_POST['recoverymail'];
  $image=$_FILES['image']['name'];
  $path='../images/'.basename($image);
    if(move_uploaded_file($_FILES['image']['tmp_name'],$path)){ 
    $sql=mysqli_query($conn,"INSERT INTO `user`(`firstname`, `lastname`,`dateofbirth`, `gender`, `mobilenumber`, `recoverymail`, `image`) VALUES ('$firstname','$lastname','$dob','$gender','$mobilenumber','$recoverymail','$image')");
        if($sql){
          $_SESSION['status']=1;
          $_SESSION['message']="Profile Added Successfully!..";
          header('Location:../profile.php');
        }else{
          $_SESSION['status']=0;
          $_SESSION['message']="Profile Not Added";
          header('Location:../editprofile.php');
        }
     }
}


    
  

  
  

