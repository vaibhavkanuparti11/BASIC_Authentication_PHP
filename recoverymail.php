<?php
session_start();
include 'dbconnection.php';
include 'includes/header.php';
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 

require 'vendor/autoload.php';  
include 'session_message.php';
if(isset($_POST['email']) ){     
    $email = $_POST['email']; 
    $result = mysqli_query($conn,"SELECT * FROM user WHERE email='" . $email. "'"); 
    $row= mysqli_fetch_array($result); 
        if($row)
        {
            $email = $_POST['email'];
            $link = "<a href='http://localhost/traning/BASIC_Authentication_PHP/changepwd.php?email=".$email."'>Click To Reset password<a>";
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 2;                                        
            $mail->isSMTP();                                             
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                              
            $mail->Username   = 'vaibhavkanuparti@gmail.com';                  
            $mail->Password   = 'plgaxgwovqsycqfn';                         
            $mail->SMTPSecure = 'tls';                               
            $mail->Port       = 587;     
            $mail->setFrom('vaibhavkanuparti@gmail.com', 'siva');   
            $mail->addAddress('vaibhavkanuparti@gmail.com');          
            $mail->isHTML(true);                                   
            $mail->Subject = 'Reset Password'; 
            $mail->Body    = 'Click On This Link to Reset Password '.$link.''; 
                if($mail->Send()){
                    $_SESSION['status']=1;
                    $_SESSION['message']="Check Your Email and Click on the link sent to your email.";
                    header('Location:../forget.php');                   
                    }else{
                    echo "Mail Error - >".$mail->ErrorInfo;
                }
        }else{
            echo "Invalid Email Address. Go back";
            }   
}
?> 