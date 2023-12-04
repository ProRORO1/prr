<?php
    include("include/connection.php");
    if (isset($_POST['sign_up'])) {
        $name = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
        $country = htmlentities(mysqli_real_escape_string($con, $_POST['user_country']));
        $gender = htmlentities(mysqli_real_escape_string($con, $_POST['user_gender']));
        $rand = rand(1, 2);
        if ($name == '') {
            echo "<script>alert('we can not verify your name')</script>";
        }
        if (strlen($pass) < 8) {
            echo "<script>alert('password should be minmum 8 characters !')</script>";
            exit();
        }
        $check_email = "select * from users where user_email = '$email'";
        $run_email = mysqli_query($con, $check_email);
        $check = mysqli_num_rows($run_email);
        if ($check == 1) {
            echo "<script>alert('email should be minmum 8 characters !')</script>";
            echo "<script>window.open('signup.php','_self)</script>";
            exit();
        }
        if ($rand == 1)
            $profile_pic = "images/codingcafel.png";
        elseif ($rand == 2)
            $profile_pic = "images/codingcafe2.png";

        $insert = "insert into users (user_name, user_email, user_pass, user_country, user_profile, user_gender) values('$name', '$email', '$pass', '$profile_pic', '$country' ,'$gender')";
        $query = mysqli_query($con, $insert);
        if ($query) {
            echo "<script>alert('congraelated')</script>";
            echo "<script>window.open('signin.php','_self)</script>";
        } else {
            echo "<script>alert('Register try,agin it')</script>";
            echo "<script>window.open('signup.php','_self)</script>";
        }
    }
    ?>