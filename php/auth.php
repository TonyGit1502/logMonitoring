<?php
    require "../db.php";
    ini_set('display_errors','On');
    error_reporting('E_ALL');
    if(!isset($_COOKIE['userID'])){
        // if(isset($_POST['submit'])){
            $user_userlogin = mysql_real_escape_string(trim($_POST['login']));
            $user_userpassword = mysql_real_escape_string(trim($_POST['pass']));
            if(!empty($user_userlogin) && !empty($user_userpassword)){
                $query = "SELECT userID, userLogin FROM users WHERE
                userLogin = '$user_userlogin' AND userPassword = '$user_userpassword'";
                $data = mysql_query($query);
                if(mysql_num_rows($data) == 1){
                    $row = mysql_fetch_assoc($data);
                    setcookie('userID', $row['userID'], time() * 3600);
                    setcookie('userlogin', $row['userLogin'], time() * 3600);
                    if(isset($_COOKIE['userID']) && isset($_COOKIE['userlogin'])){
                        header('Location: main.php');
                        echo json_encode($_COOKIE['userID']);
                        echo json_encode($_COOKIE['userlogin']);
                    }
                }
                else{
                    echo "<script>alert('Вы неверно ввели логин или пароль');</script>";
                }
            }
            else{
                echo "<script>alert('Введите логин и пароль');</script>";
            }
        // }
    }
?>