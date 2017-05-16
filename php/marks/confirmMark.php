<?php 
	ini_set('display_errors','On');
    error_reporting('E_ALL');
    $connection = mysql_connect("localhost","admin","admin");
    $db = mysql_select_db("log_monitoring");
    if(!$connection || !$db){
        exit(mysql_error());
    }
    $mark = $_POST['mark'];
    $user_id = $_POST['userID'];
    $subject = $_POST['subject'];
    $task_id = $_POST['taskID'];
    $query = "INSERT INTO marks (userID, subjectID, taskID, mark) VALUES ('{$user_id}', '{$subject}', '{$task_id}', '{$mark}')";
    $result = mysql_query($query);

    mysql_close();
?> 