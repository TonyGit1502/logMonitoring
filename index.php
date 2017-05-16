<?php
    require "db.php";
    ini_set('display_errors','On');
    error_reporting('E_ALL');
    if(!isset($_COOKIE['userID'])){
        if(isset($_POST['submit'])){
            $user_userlogin = mysql_real_escape_string(trim($_POST['login']));
            $user_userpassword = mysql_real_escape_string(trim($_POST['pass']));
            if(!empty($user_userlogin) && !empty($user_userpassword)){
                $query = "SELECT userID, userLogin FROM users WHERE
                userLogin = '$user_userlogin' AND userPassword = '$user_userpassword'";
                $data = mysql_query($query);
                if(mysql_num_rows($data) == 1){
                    $row = mysql_fetch_assoc($data);
                    setcookie('userID', $row['userID'], time()+3600*24);
                    setcookie('userlogin', $row['userLogin'], time()+3600*24);
                    if(isset($_COOKIE['userID']) && isset($_COOKIE['userlogin'])){
                        header('Location: main.php');
                    }
                }
                else{
                    echo "<script>alert('Вы неверно ввели логин или пароль');</script>";
                }
            }
            else{
                echo "<script>alert('Введите логин и пароль');</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log Monitoring 2.0</title>
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <header id="main-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6 main-header-logo">
                    <img src="img/logo.png" alt="logotype">
                </div>
                <div class="col-md-6 main-header-title text-right">
                    <h2>Log Monitoring 2.0</h2>
                </div>
            </div>
        </div>
    </header>
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4 text-center">
                    <h2>Enter to the journal</h2>
                    <?php 
                        if(empty($_COOKIE['userlogin'])){
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="main-form">
                        <input type="text" name="login" placeholder="Enter your login">
                        <input type="password" name="pass" placeholder="Enter your password">
                        <button type="submit" class="main-form-btn" name="submit">Sign In</button>
                    </form>
                    <form action="signup.php">
                        <button type="submit" class="reg-btn">Sign Up</button>
                    </form>
                    <?php
                        }
                        else{
                            echo "<script>location.replace('main.php');</script>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>