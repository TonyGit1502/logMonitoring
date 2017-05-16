<?php
	ini_set('display_errors','On');
    error_reporting('E_ALL');
	$connection = mysql_connect("localhost","admin","admin");
    $db = mysql_select_db("log_monitoring");
    if(!$connection || !$db){
        exit(mysql_error());
    } 
    $subject = $_POST['subject'];
    $title = $_POST['name'];
    $date = $_POST['calendar'];
    $task_text = $_POST['description'];

    $query = "INSERT INTO tasks (subjectID, taskName, taskText, taskDate) VALUES ('{$subject}', '{$title}', '{$task_text}', '{$date}')";
    if($result = mysql_query($query)){
      echo "<script>alert('Успех');</script>";
    }
    else {
        echo "Ошибка".mysql_error(); 
    }
    mysql_close();
?>