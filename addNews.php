<?php
    ini_set('display_errors','On');
    error_reporting('E_ALL');
    $connection = mysql_connect("localhost","admin","admin");
    $db = mysql_select_db("log_monitoring");
    if(!$connection || !$db){
        exit(mysql_error());
    }
    $author = $_COOKIE['userlogin'];
    $title = $_POST['title'];
    $date = $_POST['calendar'];
    $news_text = $_POST['description'];

    $query = "INSERT INTO news (newsAuthor, newsTitle, newsText, newsDate) VALUES ('{$author}','{$title}', '{$news_text}', '{$date}')";
    if($result = mysql_query($query)){
      echo "<script>alert('Успех');</script>";
    }
    else {
        echo "Ошибка".mysql_error(); 
    }
    mysql_close();
?>