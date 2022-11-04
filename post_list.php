<?php
include('config.php');
checkLogin();
				echo $_SESSION['user_info_fullname'];
				$id1=$_SESSION['user_info_id'];
				
$post_info_array=array();
		$post_info_array_counter=0;
		$post_info_sql="SELECT * FROM post_info where user_id='$id1' ";
		$post_info_sql_result=mysqli_query($con,$post_info_sql);
		if($post_info_sql_result){
		$post_info_array_counter=mysqli_num_rows($post_info_sql_result);
		while($post_info_sql_result_obj=mysqli_fetch_object($post_info_sql_result)){
		$post_info_array[]=$post_info_sql_result_obj;
		}
		mysqli_free_result($post_info_sql_result); 
		}else{
		
		$error='post_info_sql_result_is'.mysql_error($con);
		}
	?>
	<html>
		<head>
			<title>this is index page</title>
		</head>
		<body>
			<?php include('logedin_menu.php');?>
			<table border="1">
			<tr>
				<th colspan="9"><h1>view all user sign up </h1></th>
			</tr>
			<tr>
				<th><b>id</b></th>
				<th><b>user id</b></th>
				<th><b>post subtitle:</b></th>
				<th><b>post title</b></th>
				<th><b>post short description</b></th>
				<th><b>post description</b></th>
				<th><b>post status</b></th>
				<th><b>post created_date</b></th>
				<th><b>Action</b></th>
			
			</tr>
			<?php
			for($i=0;$i<$post_info_array_counter;$i++):?>
			<tr>
				<td><?php echo  $post_info_array[$i]->id; ?></td>
				<td><?php echo  $post_info_array[$i]->user_id; ?></td>
				<td><?php echo  $post_info_array[$i]->post_subtitle; ?></td>
				<td><?php echo  $post_info_array[$i]->post_title; ?></td>
				<td><?php echo  $post_info_array[$i]->post_short_description; ?></td>
				<td><?php echo  $post_info_array[$i]->post_description; ?></td>
				<td><?php echo  $post_info_array[$i]->post_status; ?></td>
				<td><?php echo  $post_info_array[$i]->post_created_date; ?></td>
				<td>
				<a href="post_details.php?id=<?php echo $post_info_array[$i]->id; ?>">Details</a>&nbsp; |&nbsp;
				<a href="post_edit.php?id=<?php echo $post_info_array[$i]->id; ?>">Edit</a>&nbsp; |&nbsp;
				<a href="post_delete.php?id=<?php echo $post_info_array[$i]->id; ?>">Delete</a>
				</td>
			</tr>
		
		<?php endfor;?>
			</table>
		
		</body>
	
	</html>
	