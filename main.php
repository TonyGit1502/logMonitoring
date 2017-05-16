<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <link rel="stylesheet" href="css/notyf.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
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
                <div class="col-md-10 main-content">
                    <div class="col-md-6 news-block">
                        <h3>Последние новости</h3>
                        <?php 
                            $connection = mysql_connect("localhost","admin","admin");
                            $db = mysql_select_db("log_monitoring");
                            if(!$connection || !$db){
                                exit(mysql_error());
                            }
                            $query = "SELECT * FROM news ORDER BY newsID DESC LIMIT 3";
                            $result = mysql_query($query); 
                            mysql_close();
                            while($row = mysql_fetch_array($result)){
                                echo "<div class='news-block-item'>";
                                    echo "<h2 class='text-left'>".$row['newsTitle']."</h2>";
                                    echo "<p>".$row['newsText']."</p>";
                                    echo "<hr class='slash'>";
                                    echo "<h4 class='text-left'>Автор новости: ".$row['newsAuthor']."</h4>";
                                    echo "<h4 class='text-left'>Дата публикации: ".$row['newsDate']."</h4>";
                                echo "</div>";       
                            }
                            echo "<a href='news.php' class='more-news'>Посмотреть все новости</a>"; 
                        ?>
                    </div>
                    <div class="col-md-5 col-md-offset-1 refinement">
                       <div class="row">
                            <h3>Доработки</h3>
                            <table id="ref-table" class="table table-bordered">
                               <tr class="new_task_row">
                                   <td class="task-desc" colspan="2"><input type="text" id="issue" name="task_name" placeholder="Введите задачу"></td>
                                   <td width='5'><button class="addTask-btn" onclick="add_task();">Добавить задачу</button></td>
                               </tr>
                               <?php
                                $connection = mysql_connect("localhost","admin","admin");
                                $db = mysql_select_db("log_monitoring");
                                if(!$connection || !$db){
                                    exit(mysql_error());
                                }
                                $result = mysql_query("SELECT * FROM issues ORDER BY issueID DESC");
                                //  echo "<pre>";
                                // print_r($sub_mark_res);
                                // die();
                                while($res = mysql_fetch_array($result)){
                                    if($res['issueComplete'] == 1){
                                        echo "<tr class='task-completed'>";
                                        echo "<td width='5'><input type='checkbox' checked name='task-status' onclick='complete_task(this,".$res['issueID'].");'></td>";
                                    }
                                    else{
                                        echo "<tr>";
                                        echo "<td width='5'><input type='checkbox' name='task-status' onclick='complete_task(this,".$res['issueID'].");'></td>";
                                    } 
                                    echo "<td><span>".$res['issueText']."</span></td>";
                                    echo "<td width='5' class='text-center'><button class='delete-btn' onclick='delete_task(".$res['issueID'].");'>&#10008;</button></td>";
                                    echo "</tr>";
                                }
                               ?>
                           </table>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/notyf.min.js"></script>
    <script>
        function add_task(){
            var taskText = $("input[name='task_name']").val();
            if(taskText != ""){
                $.ajax({
                    type: "POST",
                    data: {task: taskText},
                    url: "php/issues/addIssue.php",
                    success: function(){
                        var notyf = new Notyf({
                            delay: 3000
                        });
                        notyf.confirm('Задание успешно добавлено!');
                        function update_page(){
                            window.location.reload();
                        }
                        setTimeout(update_page, 3500);
                    },
                    error: function(){
                        var notyf = new Notyf({
                            delay: 3000    
                        });
                        notyf.alert('Ошибка! Задание не добавлено.');
                    }
                });
            }
        }
        function delete_task(id){
            var task_id = id;
            $.ajax({
                type: "POST",
                data: {taskID: task_id},
                url: "php/issues/deleteIssue.php",
                success: function(){
                    var notyf = new Notyf({
                        delay: 3000
                    });
                    notyf.confirm('Задание успешно удалено!');
                    function update_page(){
                        window.location.reload();
                    }
                    setTimeout(update_page, 3500);
                },
                error: function(){
                    var notyf = new Notyf({
                        delay: 3000    
                    });
                    notyf.alert('Ошибка! Задание не удалено.');
                }
            });
        }
        function complete_task(el, id){
            var issue_id = id;
            row = $(el).parent().parent();
            complete = 0;
            if(!$(row).hasClass("task-completed")){
                $(row).addClass("task-completed");
                complete = 1;
            } else {
                $(row).removeClass("task-completed");
                complete = 0;
            }
            $.ajax({
                type: "POST",
                data: {issueID: issue_id,
                    complete: complete},
                url: "php/issues/updateTable.php",
            });
        }
    </script>
</body>
</html>