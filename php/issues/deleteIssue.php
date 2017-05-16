<?php
	if(isset($_POST['taskID'])){
        ini_set('display_errors','On');
        error_reporting('E_ALL');
        $issue_id = $_POST['taskID'];
        $connection = mysql_connect("localhost","admin","admin");
        $db = mysql_select_db("log_monitoring");
        if(!$connection || !$db){
            exit(mysql_error());
        }
        $query = "DELETE FROM issues WHERE issueID = '{$issue_id}'";
        $result = mysql_query($query);
        mysql_close();
    }
?>