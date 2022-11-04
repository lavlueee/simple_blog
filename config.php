<?php session_start();

	$con=mysqli_connect('localhost','root','','blog2');
	if(!$con){
		die("database connection fail");
	}
	function pd($data=array(), $die=false){

		echo '<pre>';
		print_r($data);
		echo '</pre>';

		if($die){
			die('<b> die at pd()</b>');
		}
	}

	function checkLogin(){

		if(isset($_SESSION['user_info_id']) AND isset($_SESSION['user_info_fullname']) AND isset($_SESSION['user_info_email'])){
			// user logedin 
		}else{
			//user not logged in
			header('Location: index.php');
		}	
	}


?>