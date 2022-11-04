<?php
include ('config.php');

$error=array();
$email='';
$password='';

if(isset($_POST['click'])){
	extract($_POST);
	
	if($email==''){
		$error['email']='Email must be required';
	}if($password==''){
		$error['password']='password must be required';
	}
		if(count($error)==0){
			
			$result = mysqli_query($con, "select * from user_info where email = '$email' AND password ='$password'");
			
			if($result){
				$count=mysqli_num_rows($result);
				if($count>0){
					$row=mysqli_fetch_array($result);
					$_SESSION['user_info_id'] = $row['id'];
					$_SESSION['user_info_fullname'] = $row['fullname'];
					$_SESSION['user_info_email'] = $row['email'];
					
					
					header('Location: post_list.php');
				}else{
					$error['common']='Email/Password you entered is incorrect';
				}
			}else{
				$error['common']='Data could not save Error is : '.mysqli_error($con);
			}
		}    
}
?>
<html>
	<head>
		<title>Welcome to Black & white</title>
	</head>
	<body>
		<?php include('without_login.php');?>
		<form action="" method="post">
			<table>
				<tr>
					<td><b>Email:</b></td>
					<td><input type="email" name="email" value="<?php echo $email; ?>"/><?php if(!empty($error['email'])){ echo $error['email'];};?></td>
				</tr>
				<tr>
					<td><b>Password:</b></td>
					<td><input type="password" name="password" value="<?php echo $password; ?>"/><?php if(!empty($error['password'])){ echo $error['password'];};?></td>
				</tr>
				<tr>
					<td><input type="submit" name="click" value="Login"/></td>
				</tr>
			</table>
			
		</form>		
	</body>

</html>