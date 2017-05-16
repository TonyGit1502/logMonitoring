<?php
    $issue_id = $_POST['issueID'];
    $complete = $_POST['complete'];
    $connection = mysql_connect("localhost","admin","admin");
    $db = mysql_select_db("log_monitoring");
    if(!$connection || !$db){
        exit(mysql_error());
    }
    $upTable = mysql_query("UPDATE issues SET issueComplete='{$complete}' WHERE issueID='{$issue_id}'");
    mysql_close();
?>