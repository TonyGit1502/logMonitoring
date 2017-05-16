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
                    <h2>Регистрация нового пользователя</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                       <input class="reg-input" type="text" name="user_login" placeholder="Логин">
                       <input class="reg-input" type="text" name="user_password" placeholder="Пароль">
                       <input class="reg-input" type="text" name="user_FIO" placeholder="Фамилия Имя Отчество">
                       <input class="reg-input" type="date" name="user_date_birth" placeholder="Дата рождения">
                       <input id="signup-tel" class="reg-input" type="tel" name="user_phonenumber" placeholder="Номер телефона">
                       <input class="reg-input" type="text" name="user_city" placeholder="Город">
                       <input class="reg-input" type="email" name="user_email" placeholder="Email">
                       <input class="reg-input" type="text" name="user_group" placeholder="ID группы">
                       <button type="submit" name="submit" class="reg-btn">Зарегистрироваться</button>
                    </form>
                    <form action="index.php">
                    	<button class="main-form-btn">Войти в журнал</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
        require "db.php";
        ini_set('display_errors','On');
        error_reporting('E_ALL');
        $user_login = $_POST['user_login'];
        $user_pass = $_POST['user_password'];
        $user_name = $_POST['user_FIO'];
        $user_date = $_POST['user_date_birth'];
        $user_phonenumber = $_POST['user_phonenumber'];
        $user_city = $_POST['user_city'];
        $user_email = $_POST['user_email'];
        $user_group = $_POST['user_group'];
        if(isset($_POST['submit'])){
            $errors = array();
            if($user_login == ''){
                $errors[] = 'Введите логин!';
            }
            if($user_pass == ''){
                $errors[] = 'Введите пароль!';
            }
            if($user_name == ''){
                $errors[] = 'Введите имя!';
            }
            if($user_date == ''){
                $errors[] = 'Введите дату рождения!';
            }
            if($user_phonenumber == ''){
                $errors[] = 'Введите номер телефона!';
            }
            if($user_city == ''){
                $errors[] = 'Укажите город!';
            }
            if($user_email == ''){
                $errors[] = 'Введите Email!';
            }
            if($user_group == ''){
                $errors[] = 'Введите ID группы!';
            }
            if(!empty($errors)){
                echo "<div style='color: red;'>".array_shift($errors)."</div><hr>";
            }
            else{
                $query = "INSERT INTO users (userLogin, userPassword, userFIO, userDateBirth, userPhoneNumber, userCity, userEmail, groupID) 
                VALUES ('${user_login}','{$user_pass}','{$user_name}','{$user_date}','{$user_phonenumber}','{$user_city}','{$user_email}', '{$user_group}')";
                if($rec = mysql_query($query)){
                    echo "<script>alert('Вы успешно прошли регистрацию!');</script>";
                }
                else {
                    echo "Ошибка".mysql_error(); 
                }
            }
            mysql_close();
        }
    ?>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script>
		jQuery(function($){
			$('#signup-tel').mask("+7 (999)-999-99-99");
		});
	</script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
    