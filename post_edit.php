<?php
	include('config.php');
	checkLogin();
		if(isset($_GET['id']) AND $_GET['id']>0){
		$id=intval($_GET['id']);
		}else{
			die('url is incorrected');
		}
		
		$error=array();
			
			$day='';
			$month='';
			$year='';
			
			$post_subtitle='';
			$post_title='';
			$post_short_description='';
			$post_description='';
			$post_status='';
			$post_created_date='';
					
						
				if(isset($_POST['submitBtn'])){
						extract($_POST);


						if($day==''){
							$error['day']= '<span style="color:red;">day is required</span>';
						}
						if($month==''){
							$error['month']= '<span style="color:red;">month is required</span>';
						}
						if($year==''){
							$error['year']= '<span style="color:red;">year is required</span>';
						}
						if($post_title==''){

							$error['post_title']='post_title is required';
						}if($post_description==''){

							$error['post_description']='post description is required';
						}if($post_status==''){

							$error['post_status']='post status is required';
						}if($post_created_date==''){

							$error['post_created_date']='post created date is required';
						}
						if(count($error==0)){
							if($con){

								$post_created_date=$day.'-'.$month.'-'.$year;
								$filed="";
								$filed.="post_subtitle='$post_subtitle'";
								$filed.=",post_title='$post_title'";
								$filed.=",post_short_description='$post_short_description'";
								$filed.=",post_description='$post_description'";
								$filed.=",post_status='$post_status'";	
								$filed.=",post_created_date='$post_created_date'";	
								
								//echo $user_id;
								
								$updatesql="UPDATE post_info SET ".$filed."WHERE id=".$id;
								$result2 = mysqli_query($con,$updatesql);
								
								if($result2){
									$error['common']='Data save successfully';
									
									
								}else{
							$error['common']='Data could not save Error is : '.mysqli_error($con);
							}
							}else{
							$error['common']='Database connection fail';
						}
					}
				}

					$post_edit_sql="SELECT * FROM post_info WHERE id=".$id;
					$post_edit_sql_result=mysqli_query($con,$post_edit_sql);
					if($post_edit_sql_result){
						$post_edit_sql_result_array=mysqli_fetch_array($post_edit_sql_result);
						
						$day='';
						$month='';
						$year='';
						$post_created_date='';
						extract($post_edit_sql_result_array);
					}
		?>
		
		
		<html>
	<head>
		<title></title>
	</head>
	
	<body>
		<?php include('logedin_menu.php');?>
		
		<form method="post" action="" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Post Subtitle:</td>
					<td><input type="text" name="post_subtitle" value="<?php echo $post_subtitle;?>" /><?php if(!empty($error['post_subtitle'])){ echo $error['post_subtitle']; }?></td>
				</tr>
				<tr>
					<td>post title:</td>
					<td><input type="text" name="post_title" value="<?php echo $post_title;?>" /><?php if(!empty($error['post_title'])){ echo $error['post_title']; }?></td>
				</tr>				
				<tr>
					<td>post short description:</td>
					<td>
						<textarea name="post_short_description" rows="4" cols="50"><?php echo $post_short_description;?>
						</textarea><?php if(!empty($error['post_short_description'])){ echo $error['post_short_description']; }?>
					</td>
				</tr>
				<tr>
					<td>post description:</td>
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
				<tr>
				</tr>
			</table>
		</form>
	</body>
</html>

