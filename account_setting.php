<!DOCTYPE html>
<?php
session_start();
include ("include/find_friends_function.php") ;

 if(!isset ($_SESSION[ 'user_email'])){
header("location: signin.php");
}
 else {}?>
<html>
<head>

<title>Search For Friends</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial -scale=1">
<link rel="stylesheet" href="https://maxcdn . bootstrapcdn . com/bootstrap/4.1 .3/css/
bootstrap.min.css">
<link rel="stylesheet" type="text/css" href=". ./css/find_ people. css">
<script src="https : //ajax . googleapis. com/ajax/l ibs/jquery/3.3.1/jquery .min.js"></script>
<script src="https://cdnjs.cloudflare. com/ajax/libs/popper.js/1.14.3/umd/popper .min.js"></script>
<script src="https: //maxcdn . bootstrapcdn . com/bootstrap/4.1.3/js/bootstrap .min.js"></script>

</head>
<body>
    <div class="row">
        <div class="col-sm-2">

        </div>
        <?php
        $user = $_SESSION['user_email'];
        $get_user = "select * from users where user_email='$user'";
        $run_user = mysqli_query($con, $get_user);
        $row = mysqli_fetch_array($run_user);
        $user_name=$row['user_name'];
        $user_pass = $row['user_pass'];
        $user_email = $row['user_email'];
        $user_profile = $row['user_profile'];
        $user_country = $row['user_country'];
        $user_gender = $row['user_gender'];
        ?>
        <div class="col-sm-8">
            <form action="" method="post" encrypt="multipart/form-data">
                <table class="table table-bordered table-hover">
                    <tr align="center">
                        <td colspan="6" class="active">Change account settings</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Change your Username</td>
                        <td>
                            <input type="text" name="u_name" class="form-control" required value="<?php echo $user_name;?>"/>
                        </td>
                    </tr>
                    <tr><td><a class="btn btn-default" style="text-decoration: none; font-size:15px;" _href="upload.php">change profile<i class="fa fa-user" aria-hidden="true"></i></a></td></tr>
                    <tr>
                        <td style="font-weight: bold;">Change your email</td>
                        <td><input type="email" name="u_email" class="form-control" required value= "<?php echo $user_email;?>"></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Country</td>
                        <td>
                            <select  class="form-control" name="u_country">
                                <option><?php echo $user_country;?></option>
                                <option>USA</option>
                                <option>UK</option>
                                <option>UAE</option>
                                <option>Saudi Arabia</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Gender</td>
                        <td>
                            <select  class="form-control" name="u_gender">
                                <option><?php echo $user_gender;?></option>
                                <option>Mela</option>
                                <option>female</option>
                                <option>others</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">foeget password</td>
                        <td>
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myMoldal">forget password</button>
                            <div id="muModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="recovery.php?id=<?php echo $user_id;?>" method="post" id="f">
                                                 <strong>what is your school best friends</strong>
                                                 <textarea class="from-control" cols="83" rows="4" name="content" placeholder="someone"></textarea><br>
                                                 <input class="btn btn-default" type="submit" name="sub" value="submit" style="width: 100px;"><br>
                                                <!--   <pre>Answer the above question</pre><br>-->
                                                 
                                            </form>
                                            <?php
                                            if(isset($_POST['sub'])){
                                               $btn = htmlentities($_POST['content']);
                                               if($btn == ''){
                                                // echo "<script>alert('please Enter something .')</script>";
                                                echo "<script>window.open('account_setting.php','_self')</script>";
                                                exit();
                                               }
                                               else{
                                                $update = "update users set forgotten_answer ='$btn' where user_email ='$user'";
                                                $run = mysqli_query($con,$update);
                                                if ($run){
                                                    echo "<script>alert('working...')</script>";
                                                    echo "<script>window.open('account_setting.php','_self')</script>";
                                                }
                                                else {
                                                    echo "<script>alert('error while upadting information.')</script>";
                                                    echo "<script>window.open('account_setting.php','_self')</script>";
                                                }
                                               }
                                            }
                                            ?>
                                        </div>
                                       <!-- <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                          
                        </td>
                    </tr>
                    <tr><td></td></tr><a class="btn btn-default" style="text-decoration: none;font-size:15px;" href="change_password.php"><i class="fa fa-fw" aria-hidden="true"></i>Change password</a>
                  <!--  <tr align="center">
                        <td colspan="6">
                            <input type="submit" value="Update" name="update" class="btn btn-info">
                        </td>
                    </tr>-->
                
                </table>
            </form>
            <?php
            if(isset($_POST['update'])){
                $user_name = htmlentities($_POST['u_name']);
                $email = htmlentities($_POST['u_email']);
                $u_country = htmlentities($_POST['u_country']);
                $u_gender = htmlentities($_POST['u_gender']);
                $update = "update users set user_email='$email', user_name='$user_name', user_country='$u_country', user_gender='$u_gender' where user_email='$user'";
                $run = mysqli_query($con,$update);
                if($run){
                    echo "<script>window.open('account_setting.php','_self')</script>";
                }
            }
            ?>
        </div>
        <div class="col-sm-2"></div>
    </div>
</body>
</html>