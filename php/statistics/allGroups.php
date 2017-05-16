<?php
    require "../../db.php";
    ini_set('display_errors','On');
    error_reporting('E_ALL');
    if(isset($_POST['id'])){
        $el_id = $_POST['id'];
        $user = $_POST['userID'];
        if($el_id == "tab-1"){
            $data = array();
            $query_1 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE groupID = 2"));
            $query_2 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE groupID = 3"));
            $query_3 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE groupID = 4"));
            $query_4 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (userGender = 'мужской') AND ((groupID = 2) OR (groupID = 3) OR (groupID = 4))"));
            $query_5 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (userGender = 'женский') AND ((groupID = 2) OR (groupID = 3) OR (groupID = 4))"));
            $data = array($query_1[0], $query_2[0], $query_3[0], $query_4[0], $query_5[0]);
            echo json_encode($data);
        }
        if($el_id == "tab-2"){
            $data = array();
            $query_1 = mysql_query("SELECT mark FROM `marks` WHERE subjectID = 1 AND userID = '{$_COOKIE['userID']}'");
            $query_2 = mysql_query("SELECT mark FROM `marks` WHERE subjectID = 2 AND userID = '{$_COOKIE['userID']}'");
            $query_3 = mysql_query("SELECT mark FROM `marks` WHERE subjectID = 3 AND userID = '{$_COOKIE['userID']}'");
            while ($row1 = mysql_fetch_array($query_1, MYSQL_NUM)) {
                $res1 = array($row1[0], $row1[1], $row1[2], $row1[3], $row1[4]);    
            }
            while ($row2 = mysql_fetch_array($query_2, MYSQL_NUM)) {
                $res2 = array($row2[0], $row2[1], $row2[2], $row2[3], $row2[4]);    
            }
            while ($row3 = mysql_fetch_array($query_3, MYSQL_NUM)) {
                $res3 = array($row3[0], $row3[1], $row3[2], $row3[3], $row3[4]);    
            }
            $data = array($res1, $res2, $res3);
            echo json_encode($data);
        }
        if($el_id == "dropdown1"){
            $data = array();
            $query_1 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (userGender = 'мужской') AND (groupID = 2)"));
            $query_2 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (userGender = 'женский') AND (groupID = 2)"));
            $q1 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (groupID = 2) AND (userCity = 'Самара')"));
            $q2 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (groupID = 2) AND (userCity = 'Новокуйбышевск')"));
            $q3 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (groupID = 2) AND (userCity != 'Самара') AND (userCity != 'Новокуйбышевск')"));
            $data = array($query_1[0], $query_2[0], $q1[0], $q2[0], $q3[0]);
            echo json_encode($data);
        }
        if($el_id == "dropdown2"){
            $data = array();
            $query_1 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (userGender = 'женский') AND (groupID = 3)"));
            $query_2 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (userGender = 'мужской') AND (groupID = 3)"));
            $q1 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (groupID = 3) AND (userCity = 'Самара')"));
            $q2 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (groupID = 3) AND (userCity = 'Новокуйбышевск')"));
            $q3 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (groupID = 3) AND (userCity != 'Самара') AND (userCity != 'Новокуйбышевск')"));
            $data = array($query_1[0], $query_2[0], $q1[0], $q2[0], $q3[0]);
            echo json_encode($data);
        }
        if($el_id == "dropdown3"){
            $data = array();
            $query_1 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (userGender = 'женский') AND (groupID = 4)"));
            $query_2 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (userGender = 'мужской') AND (groupID = 4)"));
            $q1 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (groupID = 4) AND (userCity = 'Самара')"));
            $q2 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (groupID = 4) AND (userCity = 'Новокуйбышевск')"));
            $q3 = mysql_fetch_array(mysql_query("SELECT COUNT(userID) FROM users WHERE (groupID = 4) AND (userCity != 'Самара') AND (userCity != 'Новокуйбышевск')"));
            $data = array($query_1[0], $query_2[0], $q1[0], $q2[0], $q3[0]);
            echo json_encode($data);
        } 
    }
?>