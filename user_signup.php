<?php
include ('config.php');
	$error=array();
	
	$fullname='';
	$email='';
	$password='';
	$status='';
	$profilepicture='';
					
		if(isset($_POST['click'])){
		extract($_POST);


		
		if($fullname==''){

			$error['fullname']='Full Name is required';
		}
		if($email==''){

			$error['email']='Email is required';
		}if($password==''){
			$error['password']='password is required';
		}if($status==''){
			$error['status']='Status is required';
		}
		/*here from starte*/
		
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["profilepicture"]["name"]); 
		$extension = strtolower(end($temp));
		if (
		(($_FILES["profilepicture"]["type"] == "image/gif")
		|| ($_FILES["profilepicture"]["type"] == "image/jpeg")
		|| ($_FILES["profilepicture"]["type"] == "image/jpg")
		|| ($_FILES["profilepicture"]["type"] == "image/pjpeg")
		|| ($_FILES["profilepicture"]["type"] == "image/x-png")
		|| ($_FILES["profilepicture"]["type"] == "image/png")) 
		&& ($_FILES["profilepicture"]["size"] <91938965) 
		&& in_array($extension, $allowedExts)

		) {
		if ($_FILES["profilepicture"]["error"] > 0) {
		 "Return Code: " . $_FILES["profilepicture"]["error"] . "<br>";
		} else {
		
		 "Upload: " . $_FILES["profilepicture"]["name"] . "<br>";
		 "Type: " . $_FILES["profilepicture"]["type"] . "<br>";
		 "Size: " . ($_FILES["profilepicture"]["size"] / 1024) . " kB<br>";
		 "Temp file: " . $_FILES["profilepicture"]["tmp_name"] . "<br>";
		$dist = "upload/" .time(). '.'.$extension;
		if (file_exists($dist)) {
		 $_FILES["profilepicture"]["name"] . " already exists. ";
		} else {
		$src = $_FILES["profilepicture"]["tmp_name"];

		$profilepicture="$dist";
		
		 move_uploaded_file($src,$dist);
		 "Stored in: " . "upload/" . $_FILES["profilepicture"]["name"];
		}
		}
		} else {
		echo "Invalid file";
		}
		
		/*here end*/
		if($profilepicture==''){
			$error['profilepicture']='Profile picture is required';
		}
		if(count($error)==0){
			if($con){
				$filed="";
				$filed.="fullname='$fullname'";
				$filed.=",email='$email'";
				$filed.=",password='$password'";
				$filed.=",status='$status'";
				$filed.=",profilepicture='$profilepicture'";	
				
				$sql="INSERT INTO user_info SET ".$filed;
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
<html>
	<head>
		<title>Sign Up</title>
	</head>
	<body>
	<?php include('without_login.php');?>
	
			<form action="" method="post" enctype="multipart/form-data">
			<table>
				<h2>Sign Up</h2>
				
				<tr>
					<td><b>Full Name:</b></td>
					<td><input type="text" name="fullname" value="<?php echo $fullname; ?>"/><?php if(!empty($error['fullname'])){ echo $error['fullname'];};?></td>
				</tr>
				<tr>
					<td><b>Email:</b></td>
					<td><input type="email" name="email" value="<?php echo $email; ?>"/><?php if(!empty($error['email'])){ echo $error['email'];};?></td>
				</tr>
				<tr>
					<td><b>Password:</b></td>
					<td><input type="password" name="password" value="<?php echo $password; ?>"/><?php if(!empty($error['password'])){ echo $error['password'];};?></td>
				</tr>
				<tr>
					<td><b>Stutus:</b></td>
					<td>
						<select name="status">
							<option  value="">Select</option>
							<option <?php if(!empty($status) AND $status=='active'){ echo 'selected'; };?> value="active">Active</option>
							<option <?php if(!empty($status) AND $status=='inactive'){ echo 'selected'; };?> value="inactive">Inactive</option>
						</select><?php if(!empty($error['status'])){ echo $error['status'];};?>
					</td>
				</tr>
				<tr>
					<td><b>Profile Picture:</b></td>
					<td><input type="file" name="profilepicture" value="<?php echo $profilepicture; ?>"/><?php if(!empty($error['profilepicture'])){ echo $error['profilepicture'];};?></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="click" value="submit"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>