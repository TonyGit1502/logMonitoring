<?php
    if(isset($_POST['taskID'])){
    	ini_set('display_errors','On');
        error_reporting('E_ALL');
    	$connection = mysql_connect("localhost","admin","admin");
        $db = mysql_select_db("log_monitoring");
        if(!$connection || !$db){
            exit(mysql_error());
        } 
        $task_id = $_POST['taskID'];
        $query = "DELETE FROM tasks WHERE taskID = '{$task_id}'";
        $result = mysql_query($query);
        mysql_close();
    }
?>