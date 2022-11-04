<?php
	include('config.php');
	checkLogin();
	//$id=0;
		if(isset($_GET['id']) AND $_GET['id'])
		{
			$id=intval($_GET['id']);
			
		}else{
		die('Url is error');
		}
		$post_info_sql='DELETE FROM post_info WHERE id='.$id;
		$post_info_sql_result = mysqli_query($con,$post_info_sql);
		if($post_info_sql_result){
		echo "Delete post info successfully";
		}else{
		$error ='post_info_sql error '.mysqli_error($con);
		echo $error;
		
		}

?><br><a href="post_list.php">List</a></h4>