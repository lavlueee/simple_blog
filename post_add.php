<?php
	include ('config.php');
	checkLogin();
    $user_info_id = $_SESSION['user_info_id'];
				echo $_SESSION['user_info_fullname'];

	$error=array();
	
	$post_subtitle='';
	$post_title='';
	$post_short_description='';
	$post_description='';
	$post_status='';
	$post_created_date='';
			
				
		if(isset($_POST['submitBtn'])){
		extract($_POST);

		if($post_title==''){
			$error['post_title']='post title is required';
		}if(trim($post_description)==''){
			$error['post_description']='post description is required';
		}if($post_status==''){
			$error['post_status']='post status is required';
		}
		if(count($error)==0){
	
				$post_created_date = date('d-m-Y');
				$filed="";
				$filed .="user_id ='$user_info_id'";
				$filed.=",post_subtitle='$post_subtitle'";
				$filed.=",post_title='$post_title'";
				$filed.=",post_short_description='$post_short_description'";
				$filed.=",post_description='$post_description'";
				$filed.=",post_status='$post_status'";	
				$filed.=",post_created_date='$post_created_date'";	
				
				$sql="INSERT INTO post_info SET ".$filed;
				$result = mysqli_query($con,$sql);

				if($result){
					$error['common']='Data saved successfully ';
				}else{
					$error['common']='Data could not save Error is : '.mysqli_error($con);
				}		
	}
}
?>

<html>
	<head>
		<title></title>
	</head>

	<body>
	<?php include('logedin_menu.php');?>
	<h1>Bangladesh cricket history</h1>

		<form method="post" action="" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Post Subtitle:</td>
					<td><input type="text" name="post_subtitle" value="<?php echo $post_subtitle;?>" /></td>
				</tr>
				<tr>
					<td>post title:</td>
					<td><input type="text" name="post_title" value="<?php echo $post_title;?>" /><?php if(!empty($error['post_title'])){ echo $error['post_title']; }?></td>
				</tr>				
				<tr>
					<td>post short description:</td>
					<td>
						<textarea name="post_short_description" rows="4" cols="50"><?php echo $post_short_description;?>
						</textarea>
					</td>
				</tr>
				<tr>
					<td>post description: </td>
					<td>
						<textarea name="post_description" rows="8" cols="100"><?php echo $post_description;?>
						</textarea><?php if(!empty($error['post_description'])){ echo $error['post_description']; }?>
					</td>
				</tr>
					<td>Post Stutus:</td>
					<td>
						<select name="post_status">
							<option  value="">Select</option>
							<option <?php if(!empty($post_status) AND $post_status=='draft'){ echo 'selected'; };?> value="draft">Draft</option>
							<option <?php if(!empty($post_status) AND $post_status=='publish'){ echo 'selected'; };?> value="publish">Publish</option>
						</select><?php if(!empty($error['post_status'])){ echo $error['post_status'];};?>
					</td>
				<tr>
				<td></td>
					<td>
						<button name="submitBtn" type="submit" value="Submit">Save</button>
					</td>
				</tr>
			</table>
		</form>


	
	</body>
</html>
