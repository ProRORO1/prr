<!DOCTYPE html>
<html>

<head>
    <title>login to your account</title>
    <meta charset="utv-8">
    <meta http-equiv="X-UA-Comptible" content="IE=edge">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <meta href="https://youtu.be/Dv39fDYei9A?si=61zIgrx7vdmrm5ai" rel="stylesheet">
    <script src="https://youtu.be/Dv39fDYei9A?si=h7KYy3_O7LuTpJQb"></script>
    <script src="https://youtu.be/Dv39fDYei9A?si=h7KYy3_O7LuTpJQb"></script>
    <script src="https://youtu.be/Dv39fDYei9A?si=h7KYy3_O7LuTpJQb"></script>
    <link rel="stylesheet" href="css/signin.css">
</head>

<body>
    <div class="signin-from">
        <form action="" method="post">
            <div class="form-hrader">
                <h2>create new password</h2>
                <p>MyChat</p>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="someone@site.com" autocomplete="off" required>
                <div class="form-group">
                    <label>Bestfrinde Name</label>
                    <input type="text" class="form-control" name="bf" placeholder="Someone..." autocomplete="off" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-lg" name="submit">Submit</button>
                </div>
                <?php include("signin_user.php"); ?>
        </form>
        <div class="text-center small" style="color:#67428B">Back to signin?<a href="signup.php">create one</a></div>
    </div>
    <?php
    session_start();
    include("include/connection.php");
    if (isset($_POST['submit'])) {
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
        $recovery_account = htmlentities(mysqli_real_escape_string($con, $_POST['bf']));
        $select_user = "select * from users where user_email='$email' AND forgotten_answer='$recovery_account'";
        $query = mysqli_query($con, $select_user);
        $check_user = mysqli_num_rows($query);
        if ($check_user == 1) {
            $_SESSION['user_email'] = $email;
            echo "<script>window.open('create_password.php', '_self')</script>";
        } else {
            echo "<script>alert('your eamil or bestfrind name is incorrect.')</script>";
            echo "<script>window.open('forgot_pass.php', '_self')</script>";
        }
    }
    ?>
</body>
</head>

</html>