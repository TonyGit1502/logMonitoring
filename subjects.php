<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Дисциплины</title>
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <link rel="stylesheet" href="css/notyf.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/subjects.css">
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
                <div class="col-md-10 subjects-content">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="subject-content-title">
                        <label for="subject-select"><h4>Выберите дисциплину </h4></label>
                        <select name="subject_name" id="subject_select">
                            <option value="1" class="subject-item">Проектирование интерфейсов</option>
                            <option value="2" class="subject-item">Операционные системы</option>
                            <option value="3" class="subject-item">Введение в Qt</option>
                        </select>
                        <button type="submit" name="submit" class="subject-btn">Показать</button>
                    </form>
                    <div class="subject-nav">
                        <button class="task-button-add" data-toggle="modal" data-target="#modal-add">Добавить задание</button>
                        <!-- <button class="task-button-change" data-toggle="modal" data-target="#modal-change">Изменить задание</button> -->
                        <!-- <button class="task-button-del" data-toggle="modal" data-target="#modal-del">Удалить задание</button> -->
                    </div>
                    <div class="subject-info">
                    <?php
                    $subject_change = $_POST['subject_name'];
                    function table_output(){ 
                            $connection = mysql_connect("localhost","admin","admin");
                            $db = mysql_select_db("log_monitoring");
                            if(!$connection || !$db){
                                exit(mysql_error());
                            }
                            if(isset($_POST['submit'])){
                                global $subject_change;
                                $stud = $_COOKIE['userID'];
                                $first_query = "SELECT subjectName, subjectTeacher FROM subjects WHERE subjectID = '{$subject_change}'";
                                $first_result = mysql_query($first_query);
                                $second_query = "SELECT taskID, taskName, taskText, taskDate FROM tasks WHERE subjectID = '{$subject_change}'";
                                $second_result = mysql_query($second_query);
                                
                                $third_query = "SELECT userFIO, groupID FROM users WHERE userID = $stud";
                                $third_result = mysql_query($third_query);
                                $t_res = mysql_fetch_array($third_result);
                                $groupID = $t_res['groupID'];
                                $subject_mark = mysql_query("SELECT mark FROM marks WHERE (subjectID = '{$subject_change}') AND (userID = '{$stud}')");
                                $sub_mark_res = mysql_fetch_array($subject_mark);
                                // echo "<pre>";
                                // print_r($sub_mark_res);
                                // die();
                                // echo "<script>alert(".$sub_mark_res.")</script>";
                                $last_result = mysql_query("SELECT groupName FROM groups WHERE groupID = $groupID");
                                $l_res = mysql_fetch_array($last_result);
                                mysql_close($connection);
                                while($f_res = mysql_fetch_array($first_result)){
                                    echo "<div class='progress-table-head'>";
                                        echo "<div class='row'>";
                                        echo "<div class='col-md-5 col-md-offset-1'><h4 class='text-left'>Дисциплина: ".$f_res['subjectName']."</h4></div>";
                                        echo "<div class='col-md-4 col-md-offset-1'><h4 class='text-right'>Преподаватель: ".$f_res['subjectTeacher']."</h4></div>";
                                        echo "</div>";
                                        echo "<div class='row'>";
                                        echo "<div class='col-md-5 col-md-offset-1'><h4 class='text-left'>Имя студента: ".$t_res['userFIO']."</h4></div>";
                                        echo "<div class='col-md-3 col-md-offset-2 text-right'><h4>Группа: ".$l_res['groupName']."</h4></div>";
                                        echo "</div>";
                                    echo "</div>";
                                }
                                echo "<table class='table table-hover table-bordered'>";
                                    echo "<tr><th class='text-center'>№ КТ</th><th class='ver-align text-center'>Название КТ</th><th class='ver-align text-center' colspan='2'>Описание КТ</th><th class='text-center'>Дата выполнения</th><th class='ver-align text-center'>Оценка</th><th colspan='2'></th></tr>";
                                    // echo "<script>alert(".$a.")</script>";
                                    $i=1;
                                while($s_res = mysql_fetch_array($second_result)){
                                    echo "<tr>";
                                        echo "<td width='10' class='text-center'>".$i."</td>";
                                        echo "<td width='150'><textarea class='task-name' name='task-name' maxlength='200'>".$s_res['taskName']."</textarea></td>";
                                        echo "<td><textarea class='task-text' name='task-text' maxlength='200'>".$s_res['taskText']."</textarea></td><td width='5'><button class='changeTask-btn' onclick='change_task(".$s_res['taskID'].");'>&#9998;</button></td>";
                                        echo "<td width='10' class='text-center'>".$s_res['taskDate']."</td>";
                                        echo "<td class='progress'><input type='text' name='mark' value='".$sub_mark_res['mark']."'></td>";
                                        echo "<td width='5'><button class='confirm-btn' onclick='confirm_mark(".$s_res['taskID'].");'>Ok</button></td>";
                                        echo "<td width='5'><button class='delete-btn' onclick='delete_task(".$s_res['taskID'].");'>&#10008;</button></td>";
                                    echo "</tr>";
                                    $i++;  
                                }
                                echo "</table>";
                            }
                        }
                        table_output();
                    ?>
                </div>
            </div>
        </div>
    </div> 
    </section>
    
    <!-- Модальные окна -->
    <!-- Добавление Контрольной Точки -->
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close-x" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Добавление задания</h4>
          </div>
          <div class="modal-body text-center">
                <select name="modal-subject" id="">
                    <option value="1">Проектирование интерфейсов</option>
                    <option value="2">Операционные системы</option>
                    <option value="3">Введение в Qt</option>
                </select>
                <input type="text" name="task_name" placeholder="Введите название задания" required>
                <textarea name="task_desc" maxlength="5000" rows="20" placeholder="Описание задания" required></textarea>
                <input type="date" name="task_date" required>
                <button class="addTask-btn" onclick="add_task();">Добавить задание</button>
          </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/notyf.min.js"></script>
    <script>
        $("input[name='mark']").click(function() {
          $(this).addClass("current-mark");
        });
        $("textarea[name='task-text']").click(function() {
            $(this).addClass("changes");
        });
        $("textarea[name='task-name']").click(function() {
            $(this).addClass("new-name");
        });
    </script>
    <script>
        td_1 = $("textarea[name='task-text']").parent().css("padding", "0px");
        td_2 = $("textarea[name='task-name']").parent().css("padding", "0px");
    </script>
    <script>
        function add_task(){
            subject = $("select[name='modal-subject']").val();
            task_name = $("input[name='task_name']").val();
            task_description = $("textarea[name='task_desc']").val();
            task_date = $("input[name='task_date']").val();
            if(subject != "" &&  task_name != "" && task_description != "" && task_date != ""){
                $.ajax({
                    type: "POST",
                    data: {subject: subject,
                           name: task_name,
                           calendar: task_date,
                           description: task_description
                    },
                    url: "php/tasks/addtask.php",
                    success: function(){
                        $('.close').click();
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
                        $('.close').click();
                    }
                });
            }
        }
        function confirm_mark(id){
            var task_id = id;    
            mark = $("input.current-mark").val();
            subject = "<?php echo $subject_change;?>";
            userlog =  "<?php echo $_COOKIE['userID'];?>";
            if(mark != "" && userlog != "" && subject != "" && task_id != ""){
                $.ajax({
                    type: "POST",
                    data: {mark: mark,
                        taskID: task_id,
                        subject: subject,
                        userlog: userlog
                    },
                    url: "php/marks/confirmMark.php",
                    success: function(){
                        $("input.current-mark").removeClass("current-mark");
                        var notyf = new Notyf({
                            delay: 3000
                        });
                        notyf.confirm('Контрольная точка закрыта с оценкой '+mark+'!');
                    }
                });
            }
            else{
                var notyf = new Notyf({
                    delay: 3000
                });
                notyf.alert('Ошибка!');
            }
        }
        function delete_task(id){
            var task_id = id;
            alert(task_id); 
            $.ajax({
                type: "POST",
                data: {taskID: task_id},
                url: "php/tasks/deletetask.php",
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
        function change_task(id){
            var newTaskName =  $("textarea.new-name").val(); 
                textChanged = $("textarea.changes").val();
            alert(id);
            alert(textChanged);
            if(textChanged != ""){
                $.ajax({
                    type: "POST",
                    data: {taskID: id,
                        newName: newTaskName,
                        newText: textChanged
                    },
                    url: "php/tasks/changetask.php",
                    success: function(){
                        var notyf = new Notyf({
                            delay: 3000
                        });
                        notyf.confirm('Задание успешно изменено!');
                        $("textarea.new-name").removeClass("new-name");
                        $("textarea.changes").removeClass("changes");
                    },
                    error: function(){
                        var notyf = new Notyf({
                            delay: 3000    
                        });
                        notyf.alert('Ошибка! Задание не изменилось.');
                    }
                });
            } 
        }
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>       