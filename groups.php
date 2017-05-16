<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Группы</title>
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/groups.css">
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
                <div class="col-md-2 main-dashboard">
                    <h3 class="text-center">Пользователь: <h5 class="text-center"><?php echo $_COOKIE['userlogin'];?></h5></h3>
                    <form action="exit.php" class="text-center">
                        <button class="exit-btn">Выйти</button>
                    </form>
                    <hr>
                    <h3 class="text-center">Панель навигации</h3>
                    <hr>
                    <div class="main-menu">
                        <ul class="menu">
                            <li class="main-menu-item">
                                <a href="main.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;На главную</a>
                            </li>
                            <li class="main-menu-item">
                                <a href="news.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp;Новости</a>
                            </li>
                            <li class="main-menu-item">
                                <a href="statistics.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>&nbsp;Статистика</a>
                            </li>
                            <li class="main-menu-item menu-list">
                                <a href="groups.php"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Группы</a>
                            </li>
                            <li class="main-menu-item menu-list">
                                <a href="subjects.php"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;Дисциплины</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 groups-content">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="groups-content-title">
                        <label for="group-select"><h4>Выберите группу</h4></label>
                        <select name="group_name" id="group-select">
                            <option value="2" class="group-item">ГИП-113</option>
                            <option value="3" class="group-item">ГИП-114</option>
                            <option value="4" class="group-item">ГИП-115</option>
                        </select>
                        <button type="submit" name="submit" class="group-btn">Показать</button>
                    </form>
                    <div class="groups-info">
                        <?php
                            $connection = mysql_connect("localhost","admin","admin");
                            $db = mysql_select_db("log_monitoring");
                            if(!$connection || !$db){
                                exit(mysql_error());
                            }
                            if(isset($_POST['submit'])){
                                $uchange = $_POST['group_name'];
                                $query = "SELECT userFIO, userDateBirth, userPhoneNumber, userCity, userEmail FROM users WHERE groupID = $uchange";
                                $row = mysql_query($query);
                                $sql = "SELECT groupName FROM groups WHERE groupID = $uchange";
                                $tableName = mysql_query($sql);
                                mysql_close();
                                if(!$tableName) exit(mysql_error());
                                $myrow = mysql_fetch_array($tableName); 
                                echo "<table class='table table-hover'>";
                                    echo "<caption class='text-center'><h3>Группа ".$myrow['groupName']."</h3></caption>";
                                    echo "<tr>";
                                        echo "<th>№</th><th>ФИО студента</th><th>Дата рождения</th><th>Телефон</th><th>Город</th><th>Email</th>";
                                    echo "</tr>";
                                    $i=1;
                                    while($result = mysql_fetch_array($row)){
                                        echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$result['userFIO']."</td>";
                                        echo "<td>".$result['userDateBirth']."</td>";
                                        echo "<td>".$result['userPhoneNumber']."</td>";
                                        echo "<td>".$result['userCity']."</td>";
                                        echo "<td>".$result['userEmail']."</td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                echo "</table>";
                            }       
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>