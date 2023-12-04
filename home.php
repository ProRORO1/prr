<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
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
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>

<body>
    <div class="container main-section">
        <div class="row">
            <div class="col-md-3 col-xs-12 left-sidebar">
                <div class="input-group searchbox">
                    <div class="input-group-btn">
                        <center><a href="find_friends.php"><button class="btn btn-default search-icon"
                                    name="search_user" type="submit">Add new user</button></a></center>

                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <?php include("include/get_user_data.php"); ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                <div class="row">
                    <!-- getting the user information-->
                    <?php
                    $user = $_SESSION['user_email'];
                    $get_user = "select * from users where user_email = '$user'";
                    $run_user = mysqli_query($con, $get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    ?>
                    <!-- gettingn the user data on click -->

                    <?php
                    if (isset($_GET['user_name'])) {
                        // print_r($_GET);
                        global $con;
                        $get_username = $_GET['user_name'];
                        // print_r($get_username);
                        $get_user = "select * from users where user_name = '$get_username'";
                        //  echo $get_user;
                        $run_user = mysqli_query($con, $get_user);
                        // print_r($run_user);
                        $row_user = mysqli_fetch_array($run_user);
                        // print_r($row_user);
                        $username = $row_user['user_name'];
                        $user_profile_image = $row_user['user_profile'];
                    }

                    $total_messages = "select * from users_chat where (sender_username = '$user_name' AND receiver_username ='$username')OR(receiver_username='$username'AND sender_username='$user_name')";
                    $run_messages = mysqli_query($con, $total_messages);
                    $total = mysqli_num_rows($run_messages);
                    echo "<script>alert($total)</script>";
                    ?>
                    
                    <div class="col-md-12 right-header">
                        <div class="right-header-img">
                            <img src="<?php echo $user_profile_image;?>">
                        </div>
                        <div class="right-header-detail">
                            <form method="post">
                                <p>
                                    <?php echo $username; ?>
                                </p>
                                <span>
                                    <?php echo $total . "messages"; ?>
                                </span>&nbsp &nbsp
                                <button name="logout" class="btn btn-danger">logout </button>
                            </form>
                            <?php
                            if (isset($_POST['logout'])) {
                                $update_msg = mysqli_query($con, "UPDATE users SET log_in='Offline' WHERE user_name='$user_name'");
                                header("location:logout.php");
                                exit();
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                        <?php
                        $update_msg = mysqli_query($con, "UPDATE users_chat SET msg_status='read' WHERE sender_username='$username' AND receiver_username='$user_name'");
                        $sel_msg = "select * from users_chat where (sender_username='$username' AND receiver_username='$user_name') OR (receiver_username='$username'
                        AND sender_username='$user_name') ORDER by 1 ASC ";
                        $run_msg = mysqli_query($con, $sel_msg);
                        // echo $run_msg;
                                                        
                                    while ($row = mysqli_fetch_array($run_msg)) {
                                    $name1 = $row['sender_username'];
                                    $name2 = $row['receiver_username'];
                                    $msg_content = $row['msg_content'];
                                    $msg_date = $row['msg_date'];

                                    // Check if the message is sent from user_name to username or vice versa
                                    if (($user_name == $name1 && $username == $name2) || ($user_name == $name2 && $username == $name1)) {
                                        // Display the message
                                        echo "
                                        <li>
                                            <div class='" . ($user_name == $name1 ? 'rightside-right-chat' : 'rightside-left-chat') . "'>
                                            <span>" . $username . " <small>" . $msg_date . "</small></span><br><br>
                                            <p>" . $msg_content . "</p>
                                            </div>
                                        </li>";
                                    }
                                    }

                                ?>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 right-chat-textbox">
                        <form method="post">
                            <input autocomplete="off" type="text" name="msg_content"
                                placeholder="write your message....">
                            <button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true">fgggggg</i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $msg = htmlentities($_POST['msg_content']);
        if ($msg == "") {
            echo "
               <div class='alert alert-danger'>
                   <strong><center>Message was unable to send </center></strong>
                </div>
            ";
        } elseif (strlen($msg) > 100) {
            echo "
               <div class='alert alert-danger'>
                   <strong><center>Message is too long.use only 100 characters</center></strong>
                </div>
            ";
        } else {

            $insert = "insert into users_chat(sender_username, receiver_username, msg_content,msg_status,msg_date) values('$user_name','$username','$msg','unread',NOW())";
            $run_insert = mysqli_query($con, $insert);
        }
    }
    ?>

    <script>
        $('#scrolling_to_bottom').animate({
            scrollTop:$('#scrolling_to_bottom').get(0).scrollHeight}, 1000);
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            var height = $(window).height();
            $('.left-chat').css('height',(height-92)+'px');
            $('.rght-header-contentChat').css('height',(height-163)+'px');
        });
    </script>
</body>

</html>