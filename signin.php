<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signin.css">
    <link rel="stylesheet" href="css/signup.css">
    <script src="https : //ajax . googleapis. com/ajax/l ibs/jquery/3.3.1/jquery .min.js"></script>
    <script src="https://cdnjs.cloudflare. com/ajax/libs/popper.js/1.14.3/umd/popper .min.js"></script>
    <script src="https: //maxcdn . bootstrapcdn . com/bootstrap/4.1.3/js/bootstrap .min.js"></script>
   
</head>
<body>
<div class="signin-form">
    <form action="" method="POST">
       <div class="form-header">
          <h2>Sign in</h2>
          <p>login to mychat</p>
       </div>
        <div class="form-group">
           <label>Email</label>
           <input type="email" class="form-control" name="email" autocomplete="off" required>
        </div>
        <div class="form-group">
           <label>password</label>
           <input type="password" class="form-control" name="pass" autocomplete="off" required>
        </div>
        <div class="small">Forgot password <a href="forgot_pass.php">clic here</a></div><br>
        <div class="form-group">
           <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">sign in</button>
        </div>
      <?php include("signin_user.php");?>
    </form>
      <div class="text-center small" style="color:#674288;">Dont have account? <a href="signup.php">create one</a></div>
</div> 
</body>
</html>