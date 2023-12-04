<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
include("include/header.php");
if(!isset($_SESSION['user_email'])){
   header("location:signin.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signup.css">
    <script src="https : //ajax . googleapis. com/ajax/l ibs/jquery/3.3.1/jquery .min.js"></script>
    <script src="https://cdnjs.cloudflare. com/ajax/libs/popper.js/1.14.3/umd/popper .min.js"></script>
    <script src="https: //maxcdn . bootstrapcdn . com/bootstrap/4.1.3/js/bootstrap .min.js"></script>
</head>
<body>
    <style>
      body{
         overflow-x: hidden;
         background:white; 
         color:black;
        }  
    </style>
    <div class="row">
        <div class="col-sm-2"></div>
    </div> 
    <div class="col-sm-8">
       <from  action ="" method='post' enctype='multipart/from-data'>
          <label class ="table table-bordered table-hover">
               <tr align="center">
                  <td colspan="6" class="active"><h2>Chage Acccount Setting</h2></td>
                </tr>
               <tr>
                   <td style="font-weight: bold;">Change Account Username</td>
                   <td>
                      <input type="password" name="current_pass"  id="mypass" class="form-control" required placeholder="cuurent Password"/>
                    </td>
                </tr>
                <tr>
                   <td style="font-weight:bold;">New Password</td>
                   <td>
                      <input type="password" name="u_pass1" id="mypass" class="form-control" required placeholder="New Password" />
                    </td>
                </tr>
                <tr>
                   <td style="font-weight:bold;">confirm Password</td>
                   <td>
                      <input type="password" name="u_pass2" id="mypass" class="form-control" required placeholder="New Password" />
                    </td>
                </tr>

                <tr align ="center">
                   <td colspan="6">
                      <td>
                        <input type="submit" name="change"  value ="change" class="btn btn=info" /> 
                    </td>
                   
                </tr>
            </label>
        </from>
       <?php
          if (isset($_POST['change'])) {
            $c_pass = $_POST['current_pass'];
            $pass1 = $_POST['u_pass1'];
            $pass2 = $_POST['u_pass2'];
        
            $user = $_SESSION['user_email'];
            $get_user = "SELECT * FROM user WHERE user_email='$user'";
            $run_user = mysqli_query($con, $get_user);
            $row = mysqli_fetch_array($run_user);
            $user_password = $row['user_pass'];
        
            if ($c_pass !== $user_password) {
                echo "
                <div class='alert alert-danger'>
                    <strong>Your old Password didn't match</strong>
                </div>
                ";
            }
        
            if ($pass1 !== $pass2) {
                echo "
                <div class='alert alert-danger'>
                    <strong>Your new Password didn't match with confirm password</strong>
                </div>
                ";
            }
        
            if ($pass1 < 9 AND $pass2 < 9) {
                echo "
                <div class='alert alert-danger'>
                    <strong>Use 9 or more 0 charset</strong>
                </div>
                ";
            }
        
            if ($pass1 == $pass2 AND $c_pass == $user_password) {
                $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
                echo "
                <div class='alert alert-success'>
                    <strong>Your Password is Changed</strong>
                </div>
                ";
            }
        }
        
        ?>
    </div>

</body>
</html>