<?php
	include('config.php');
	unset($_SESSION['user_info_fullname']);
	unset($_SESSION['user_info_id']);
	unset($_SESSION['user_info_email']);
	header('Location: index.php');
?>