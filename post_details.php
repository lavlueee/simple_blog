<?php
include('config.php');
checkLogin();

			
	if(isset($_GET['id']) AND $_GET['id'] > 0 ){
			$id=intval($_GET['id']) ;
	}else{
		header('Location: post_list.php');
	}
	$post_details="SELECT * FROM post_info WHERE id=".$id;
	$post_details_result=mysqli_query($con,$post_details);
	if($post_details_result){
		$post_details_result_array=mysqli_fetch_array($post_details_result);
	}
					
	?>
	<html>
		<head>
			<title></title>
		</head>
		<body>
		<table border="1">
			<?php include('logedin_menu.php');?>
			<tr>
				<th>title</th>
				<th>description</th>
			</tr>
			<tr>
				<td><h2><?php echo $post_details_result_array['post_title']; ?> </h2></td>
				<td><p><?php echo $post_details_result_array['post_description']; ?> </p></td>
			</tr>
			
			
		
		</table>
		<?php 
		$error=array();
		$comment='';
		
		if(isset($_POST['Save1'])){
			
		extract($_POST);
		
			if($comment==''){
				$error['comment']='comment is required';
			}
			
			if(count($error)==0){
			if($con){
				$_SESSION['user_info_fullname'];
				$id1=$_SESSION['user_info_id'];
				$filed="";
				$filed .="user_id ='$id1'";
				$filed.=",post_id='$id'";
				$filed.=",comments='$comment'";
				
				
				
				$sql="INSERT INTO comment SET ".$filed;
				$result = mysqli_query($con,$sql);
				
				if($result){
					$error['common']='Data save successfully';

				}else{
			$error['common']='Data could not save Error is : '.mysqli_error($con);
			}
			}else{
			$error['common']='Database connection fail';
		}
	}
}
?>
<?php if(isset($error['common'])){echo $error['common'];};?>
			<form method="POST" action="">
			
				<label>Comment</label><br/>
				<textarea name="comment" value=""></textarea><br/><?php if(!empty($error['comment'])){ echo $error['comment'];};?>
				<input type="submit" value="Save" name="Save1"/>
			</form>
			
			<?php //list page?>
			
				<?php 
				echo $_SESSION['user_info_fullname'];
				$id1=$_SESSION['user_info_id'];
				
		$comment_info_array=array();
		$comment_info_array_counter=0;
		$comment_info_sql="SELECT * FROM comment where user_id='$id1' AND post_id = $id";
		$comment_info_sql_result=mysqli_query($con,$comment_info_sql);
		if($comment_info_sql_result){
		$comment_info_array_counter=mysqli_num_rows($comment_info_sql_result);
		while($comment_info_sql_result_obj=mysqli_fetch_object($comment_info_sql_result)){
		$comment_info_array[]=$comment_info_sql_result_obj;
		}
		mysqli_free_result($comment_info_sql_result); 
		}else{
		
		$error='comment_info_sql_result_is'.mysqli_error($con);
		}
				
				
				?>
			
			
			<table border="1">
			<tr>
				<th colspan="3"><h1>comment</h1></th>
			</tr>
			<tr>
				<th><b>id</b></th>
				<th><b>comment id</b></th>
				<th><b>comment:</b></th>			
			</tr>
			<?php
			for($i=0;$i<$comment_info_array_counter;$i++):?>
			<tr>
				<td><?php echo  $comment_info_array[$i]->id; ?></td>
				<td><?php echo  $comment_info_array[$i]->user_id; ?></td>
				<td><?php echo  $comment_info_array[$i]->comments; ?></td>
			</tr>
		
		<?php endfor;?>
			</table>
			
				

		</body>
	
	</html>