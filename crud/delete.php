<?php
include '../dbconnection.php';
session_start();

if($_GET['module']=='user'){
    $id=$_GET['id'];
    $sql=mysqli_query($conn,"DELETE FROM user WHERE id='$id'");
    if($sql){
        unlink('../img/'.$row['image']);
    $_SESSION['status']="deleted successfully";
    header('Location:../index.php');
    }else{      
        $_SESSION['message']="Not deleted";
        header('Location:../index.php');
    }
}