<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
include("include/header.php");
if(!isset($_SESSION['user_email'])){
   header("location:signin.php");
}
?>
<html>
<head>
   <title>Account Settings</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, inital-scale=1">
   <script src="https://youtu.be/Dv39fDYei9A?si=h7KYy3_O7LuTpJQb"></script>
   <script src="https://youtu.be/Dv39fDYei9A?si=h7KYy3_O7LuTpJQb"></script>
   <script src="https://youtu.be/Dv39fDYei9A?si=h7KYy3_O7LuTpJQb"></script>
</head>
<style>
   .card{
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    max-width: 400px;
    margin: auto;
    text-align: center;
    font-family: arial;
   }
   .card img{
    height: 200px;
   }
   button{
    border:none;
    outline: 0;
    display: inline-block;
    padding: 8px;
    color:white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
   }
   a{
    text-decoration: none;
    font-size: 22px;
    color:black;
   }
   #update_profile{
      position: absolute;
      cursor: pointer;
      padding: 10px;
      border-radius:4px ;
      color:white;
      background-color: #000;
   }
   label{
      padding: 7px;
      display:table ;
      color:#fff;
   }
   input[type='file']{
      display: none;
   }

</style>
<body>
   <?php
   global $con;
   $user = $_SESSION['user_email'];
   $get_user = "select * from users where user_email='$user'";
   $run_user = mysqli_query($con, $get_user);
   $row = mysqli_fetch_array($run_user);
   $user_name = $row['user_name'];
   $user_profile = $row['user_profile'];
   
   echo "
      <div class='card'>
       <img src='$user_profile'>
       <h1>$user_name</h1>
         <form method='post' enctype='multipart/form-data'>
             <label id='update_profile'><i class='fa fa-circle-o' aria-hidden='true'></i>select profile
                 <input type='file' name='u_image' size='60'>
             </label>
            <button id='button_profile' name='update'>&nbsp&nbsp&nbsp<i class='fa fa-heart' aria-hidden='true'></i> Update profile</button>
         </form>  
      </div>
   ";
   if(isset($_POST['update'])){
      $u_image = $_FILES['u_image']['user_name'];
      $image_tmp = $_FILES['u_image']['tmp_name'];
      $random_number = rand(1,100);
      if($u_image == ''){
         echo "<script>alert('please select profile')</script>";
         echo "<script>window.open('upload.php','_self')</script>";
         exit();
      }else{
         move_uploaded_file($image_tmp,"image/$u_image.$random_number");
         $update = "update users set user_profile='images/$u_image.$random_number' where user_email='$user'";
         $run = mysqli_query($con, $update);
         if($run){
            echo "<script>alert('your profile update')</script>";
            echo "<script>window.open('upload.php','_self')</script>";
         }
      }
   }
   ?>
</body>
</html>
