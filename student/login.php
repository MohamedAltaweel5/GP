<?php
ob_start();
session_start();

?>




				
				<?php
				$con = new mysqli("localhost","root","","PostGrad");
				$user=(isset($_POST['username']))?$con->real_escape_string(trim($_POST['username'])):'';
				$pass=(isset($_POST['password']))?$con->real_escape_string(trim($_POST['password'])):'';
				// $pass=$sanjay->hashPass($pass);
				
				if(isset($_POST['submit'])){
					
					$query="select * from student where student_username='$user'";
					$query=$con->query($query) or die($con->error);
					$count=$query->num_rows;
					$row = $query->fetch_assoc();
					
					
				
				if($count<1){
						   echo '<div data-alert class="alert-box warning radius">';
						   echo  '<b>User</b> not exist';
						   // echo  '<a href="#" class="close">&times;</a>';
						   echo '</div>';
				}
				else{	
					   
						
						  // if($row['u_access']=='0'){
							 //  echo '<div data-alert class="alert-box alert radius">';
							 //   echo  '<b>User</b> access is blocked by Admin...';
							 //   echo  '<a href="#" class="close">&times;</a>';
							 //   echo '</div>';
						  // }
						  
						  // if($row['u_access']=='1'){
							 

							
							 if($row['student_password']==$pass){
								  
								  $_SESSION['user']=$user;
								  $_SESSION['userlogged']='1';
								  $query2="update student set student_lastlogin=now() where student_username=$user";
								  $query3=$con->query($query2) or die($con->error);

								header("Location:home.php");	
								  
							 }else{
								 echo '<div data-alert class="alert-box warning radius">';
								   echo  '<b>Error !</b> Wrong Password...';
								   // echo  '<a href="#" class="close">&times;</a>';
								   echo '</div>';
								
								 
							 }						
						
					// }
					
					
				 }	
				}
				?>

				<!DOCTYPE html>
<html lang="en">
<head>
	<title>Post Graduate System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(Login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						<h1>Post Graduate System</h1>
					</span>
					<span class="login100-form-title-1">
						<small>Sign In</small>
					</span>
				</div>


				<form class="login100-form validate-form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<!-- <div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						 <div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>  -->

					<div class="container-login100-form-btn">
						<button type="submit" name="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/bootstrap/js/popper.js"></script>
	<script src="Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Login/js/main.js"></script>

</body>
</html>
				   
								
				  