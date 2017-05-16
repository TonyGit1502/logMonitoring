<?php
    $connection = mysql_connect("localhost","admin","admin");
    $db = mysql_select_db("log_monitoring");
    if(!$connection || !$db){
        exit(mysql_error());
    }
