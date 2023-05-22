<?php
include '../dbconnection.php';
session_start();
echo "hi";
if($_POST['module']=='changepwd'){
    print_r($_POST);   
    $email=$_POST['email'];
    $newpassword=md5($_POST['newpassword']);
    $cpassword=md5($_POST['cpassword']);  
         if($newpassword == $cpassword){  
              $sql=mysqli_query($conn,"UPDATE user SET password='$newpassword' WHERE email='$email'");
              if($sql){      
                    $_SESSION['status']=1;
                    $_SESSION['message']="Updated Successfully..!}";
                    header('Location:../changepwd.php');
              }else{
                    $_SESSION['status']=0;
                    $_SESSION['message']="Not Updated.";
                    header('Location:../changepwd.php');
              }  
          }else{
              $_SESSION['status']=0;
                  $_SESSION['message']="Password and Confirm Password does not match";
                  header('Location:../changepwd.php');
          }    
}else if($_POST['module']=='editprofile'){
  print_r($_POST);  
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
//   $email=$_POST['email'];
  $username=$_POST['username'];
  $dob=$_POST['dob'];
  $gender=$_POST['gender'];
  $mobilenumber=$_POST['mobilenumber'];
  $recoverymail=$_POST['recoverymail'];
  $id=$_POST['id'];
//   $image=$_FILES['image']['name'];
//   $source=$_FILES['image']['tmp_name'];
//   $dest='../images/'.basename('$image');
//   move_uploaded_file($source,$dest);

        $sql=mysqli_query($conn,"UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`dateofbirth`='$dob',`gender`='$gender',`mobilenumber`='$mobilenumber',`recoverymail`='$recoverymail' WHERE id=$id");
        //print_r($sql);
                if($sql){      
                      $_SESSION['status']=1;
                      $_SESSION['message']="Updated Successfully..!}";
                      header('Location:../profile.php');
                }else{
                      $_SESSION['status']=0;
                      $_SESSION['message']="Not Updated.";
                      header('Location:../editprofile.php');
                }                   
    }
    if($_POST['module']=='changepassword'){
      $email=$_POST['email'];
      $password=md5($_POST['password']);
      $confirmpassword=md5($_POST['confirmpassword']);
      $image=$_FILES['image']['name'];
      $source=$_FILES['image']['tmp_name'];
      $dest='images/'.basename('$image');
      if(move_uploaded_file($source,$dest)){
            $old_image=$image;
            unlink('images'.$_POST['old_image']);
            }
      if($password == $confirmpassword){
            $sql=$conn->query("UPDATE user SET password='$password',image='$old_image' WHERE email='$email'");
            print_r($sql);
            if($sql){
                  $_SESSION['status']=1;
                  $_SESSION['messahe']="Updated Successfully";
                  header('Location:../index.php');
            }else{
                  $_SESSION['status']=0;
                  $_SESSION['messahe']=" Not Updated";
                  header('Location:../changepassword.php');
            }
      }else{
            $_SESSION['status']=0;
            $_SESSION['message']="Password and Confirm Password does not match";
            header('Location:../changepassword.php');

      }

}
    
