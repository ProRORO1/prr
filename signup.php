<!DOCTYPE html>
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
<div class="signup-form">
    <form action="" method="post">
        <div class="form-header">
          <h2>Sign up</h2>
          <p>login to al</p>
        </div>
        <div class="form-group">
          <label>username</label>
          <input type="text" class="form-control" name="user_name" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label>password</label>
          <input type="password" class="form-control" name="user_pass" autocomplete="off" required>
        </div>
        <div class="form-group">
          <label>email add</label>
          <input type="email" class="form-control" name="user_email" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label>country</label>
          <select class="form-control" name="user_country" required>
              <option disabled="">select a country</option>
              <option>pakistanUnited states of america</option>
              <option>India</option>
              <option>UK</option>
              <option>Bangadesh</option>
              <option>france</option>
            </select>
        </div>
        <div class="form-group">
           <label>Gender</label>
           <select class="form-control" name="user_gender" required>
               <option disabled="">select a gender</option>
               <option>male</option>
               <option>female</option>
               <option>others</option>
            </select>
        </div>
        <div class="form-group">
            <label class="checkbox"><input type="checkbox" name="" required>accept the <a href="#">Terms of user</a>$amp; <a href="#">privacy policy</a></label>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">sign in</button>
        </div>
        <?php include("signup_user.php");?>
    </form>
    <div class="text-center small" style="color:#674288;">Dont have account? <a href="signup.php">already</a></div>
</div>

</body>


<li>
      <div class='chat-left-img'>
         <img src='$user_profile'>
        </div>
        <div class='chat-left-details'>
           <p><a href='home.php?user_name=$user_name'>$user_name</a></p>";
           if($login == "Online"){
            echo "<span><i class='fa fa-circle' aria-hidden='true'></i>online</span>";
           }else{
            echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i>offline</span>";
           }
           "
        </div>
    </li>




</html>