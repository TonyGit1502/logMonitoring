<?php
    $task_id = $_POST['taskID'];
    $new_name = $_POST['newName'];
    $new_text = $_POST['newText'];
    $connection = mysql_connect("localhost","admin","admin");
    $db = mysql_select_db("log_monitoring");
    if(!$connection || !$db){
        exit(mysql_error());
    }
    $upTable = mysql_query("UPDATE tasks SET taskName = '{$new_name}', taskText='{$new_text}' WHERE taskID ='{$task_id}'");
    mysql_close();
?>