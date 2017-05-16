<?php
	unset($_COOKIE['userID']);
	unset($_COOKIE['userlogin']);
	setcookie('userID', '', -1, '/');
	setcookie('userlogin', '', -1, '');
	header('Location: index.php');
?>