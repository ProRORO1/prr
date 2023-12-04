<!DOCTYPE html>
<?php
session_start();
include("include/find_friends_function.php");
// print_r($_SESSION);
if (!isset($_SESSION['user_email'])) {
    header("location: signin.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https : //ajax . googleapis. com/ajax/l ibs/jquery/3.3.1/jquery .min.js"></script>
    <script src="https://cdnjs.cloudflare. com/ajax/libs/popper.js/1.14.3/umd/popper .min.js"></script>
    <script src="https: //maxcdn . bootstrapcdn . com/bootstrap/4.1.3/js/bootstrap .min.js"></script>
    <link rel="stylesheet" href="css/find_people.css">
    <title>Document</title>
</head>

<body>
   <nav class=" navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">
        <?php
        $user = $_SESSION['user_email'];
        $get_user="select * from users where user_email='$user'";
        $run_user= mysqli_query($con,$get_user);
        $row = mysqli_fetch_array($run_user);
        $user_name = $row['user_name'];
        echo "<a href='../home.php?user_name=$user_name'>Mychat</a>";
        ?>
    </a>
    <ul class="navbar-brand">
            <li><a style="color:black;text-decoration:none;font-size:20px;" href="account_setting.php">settings</a></li>
        </ul>
   </nav><br>
   <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form class="search_form" action="">
            <input type="text" name="search_query" placeholder="search friends" autocomplete="off"required>
            <button class="btn" type="submit" name="search_btn">search</button>

        </form> 
    </div>
   </div><br><br>
   <?php search_user();?>
</body>
</html>
