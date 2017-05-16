<?php
	if(isset($_POST['task'])){
        $task_text = $_POST['task'];
        $connection = mysql_connect("localhost","admin","admin");
        $db = mysql_select_db("log_monitoring");
        if(!$connection || !$db){
            exit(mysql_error());
        }
        $query = "INSERT INTO issues (issueText) VALUES ('{$task_text}')";
        $result = mysql_query($query);
        mysql_close();
    }

?>