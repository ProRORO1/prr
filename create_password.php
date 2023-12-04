<!DOCTYPE html>
<html>

<head>
    <title>login to your account</title>
    <meta charset="utv-8">
    <meta http-equiv="X-UA-Comptible" content="IE=edge">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <meta href="https://youtu.be/Dv39fDYei9A?si=61zIgrx7vdmrm5ai" rel="stylesheet">
    <link rel="stylesheet" href="https://youtu.be/Dv39fDYei9A?si=61zIgrx7vdmrm5ai">
    <link rel="stylesheet"  href="css/signin.css">
</head>

<body>
    <div class="signin-form">
        <form action="" method="POST">
            <div class="form-header">
                <h2>create new password</h2>
                <p>login to mychat</p>
            </div>
            <div class="form-group">
                <label> Enter password</label>
                <input type="password" class="form-control" name="pass1" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label>Confrim password</label>
                <input type="password" class="form-control" name="pass2" autocomplete="off" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">sign in</button>
            </div>
        </form>
    </div>
    <?php
        session_start();
        if (isset($_POST['change'])) {
            $user = $_SESSION['user_email'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];

            if ($pass1 !== $pass2) {
                echo "
                       <div class='alert alert-danger'>
                           <strong>Your new Password didn't match with confirm password</strong>
                        </div>
                    ";
            }

            if ($pass1 < 9 AND  $pass2 < 9) {
                echo "
                            <div class='alert alert-danger'>
                                <strong>Use 9 or more 0 charset</strong>
                            </div>
                        ";
            }

            if ($pass1 == $pass2) {
                $update_pass = mysqli_query($con, "UPDATE users SET user_pass='$pass1' WHERE user_email='$user'");
                session_destroy();
                echo "<script>alert('go ahead and sign')</script>";
                echo "<script>window.open('signin.php','_self')</script>";

            }
        }
    ?>

</body>

</html>