<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Статистика</title>
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/statistics.css">
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
                <div class="col-md-10 statistics-content">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="tabtog active"><a href="#tab-1" aria-controls="tab-1" role="tab" data-toggle="tab">Общая статистика</a></li>
                        <li role="presentation" class="tabtog"><a href="#tab-2" aria-controls="tab-2" role="tab" data-toggle="tab">Динамика успеваемости</a></li>
                        <li role="presentation" class="dropdown"><a href="#" class="dropdown-toggle" id="myTabDrop1" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">Статистика по группам
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                            <li class="tabtog">
                                <a href="#dropdown1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">ГИП-113</a>
                            </li>
                            <li class="tabtog">
                                <a href="#dropdown2" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">ГИП-114</a>
                            </li>
                            <li class="tabtog">
                                <a href="#dropdown3" role="tab" id="dropdown3-tab" data-toggle="tab" aria-controls="dropdown3">ГИП-115</a>
                            </li>
                        </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="tab-1">
                            <div class="row statistics-box">
                                <div class="col-md-6">
                                    <canvas id="myBarChart" width="400" height="400"></canvas>
                                </div>
                                <div class="col-md-6">
                                    <h3>Название диаграммы</h3>
                                    <p>Описание и прочее</p>
                                </div>
                            </div>
                            <div class="row statistics-box">
                                <div class="col-md-6">
                                    <h3>Название диаграммы</h3>
                                    <p>Описание и прочее</p>
                                </div>
                                <div class="col-md-6">
                                    <canvas id="myPieChart" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane statistics-box" id="tab-2">
                            <div class="row statistic-box">
                                <div class="col-xs-12">
                                    <h4>Название диаграммы</h4>
                                    <canvas id="subLineChart_1" width="300" height="300"></canvas>
                                    <h4>Название диаграммы</h4>
                                    <canvas id="subLineChart_2" width="300" height="300"></canvas>
                                    <h4>Название диаграммы</h4>
                                    <canvas id="subLineChart_3" width="300" height="300"></canvas>
                                    <h4>Название диаграммы</h4>
                                    <canvas id="mainLineChart" width="300" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="dropdown1" aria-labelledby="dropdown1-tab">
                            <div class="row statistic-box">
                                <div class="col-md-6">
                                    <canvas id="graphChart1" width="300" height="300"></canvas>
                                </div>
                                <div class="col-md-6">
                                    <canvas id="graphChart2" width="300" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane statistics-box" id="dropdown2" aria-labelledby="dropdown2-tab">
                            <div class="row statistic-box">
                                <div class="col-md-6">
                                    <canvas id="graphChart3" width="400" height="400"></canvas>
                                </div>
                                <div class="col-md-6">
                                    <canvas id="graphChart4" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane statistics-box" id="dropdown3" aria-labelledby="dropdown3-tab">
                            <div class="row statistic-box">
                                <div class="col-md-6">
                                    <canvas id="graphChart5" width="400" height="400"></canvas>
                                </div>
                                <div class="col-md-6">
                                    <canvas id="graphChart6" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div> 
    </section>
        <?php
        require "db.php";
            $data = array();
            $res1 = array();
            $res2 = array();
            $res3 = array();
            
            $query_1 = mysql_query("SELECT mark FROM `marks` WHERE subjectID = 1 AND userID = {$_COOKIE['userID']}");
            $query_2 = mysql_query("SELECT mark FROM `marks` WHERE subjectID = 2 AND userID = '{$_COOKIE['userID']}'");
            $query_3 = mysql_query("SELECT mark FROM `marks` WHERE subjectID = 3 AND userID = '{$_COOKIE['userID']}'");
            while ($row1 = mysql_fetch_array($query_1, MYSQL_NUM)) {
                $res1 = array($row1[0], $row1[1], $row1[2], $row1[3], $row1[4]);    
            }
            while ($row2 = mysql_fetch_array($query_2, MYSQL_NUM)) {
                $res2 = array($row2[0], $row2[1], $row2[2], $row2[3], $row2[4]);    
            }
            while ($row3 = mysql_fetch_array($query_3, MYSQL_NUM)) {
                $res3 = array($row3[0], $row3[1], $row3[2], $row3[3], $row3[4]);    
            }
            // for($i=0; $i<count($row1 = mysql_fetch_array($query_1, MYSQL_NUM)); $i++){
            //     array_push($res1, $row1[$i]);
            // }
            // foreach($res1 as $value){
            //     array_push($row1, $value);
            // }
        
            $data = json_encode(array($res1, $res2, $res3));
            
            echo "<pre>";
            print_r($data);
            die();
        ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script>
        $('#myTabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
        })
    </script>
    <script src="js/statistics/tab1.js"></script>
    <script src="js/statistics/tab2.js"></script>
    <script src="js/statistics/tab3.js"></script>
    <script src="js/statistics/tab4.js"></script>
    <script src="js/statistics/tab5.js"></script>
</body>
</html>       