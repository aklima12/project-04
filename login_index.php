<?php
	include'admin_dbcon.php';
		if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $input_error=array();
    if(empty($username)){
        $input_error['username']="error";
    }
    if(empty($password)){
        $input_error['password']="error";
        
    }
if(count($input_error)==0){
    $username_check=mysqli_query($admin_dbcon,"SELECT * FROM `form` WHERE `username`='$username'");
    if(mysqli_num_rows($username_check)>0){
           $password_check=mysqli_query($admin_dbcon,"SELECT * FROM `form` WHERE `password`='$password'"); 
           if(mysqli_num_rows($password_check)>0){
            header("location:admin__dashboard.php");
                echo "ok";
           }else{
            echo "<script>
            alert('Your password not found');
        </script>";
           }

    }else{
        echo "<script>
            alert('Your username not found');
        </script>";
    }
}



}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="login_style.css">
    <title>login-form</title>
	</head>
	<body>
    <div class="login">
	<form class="login100-form validate-form" action="" method="POST" autocomplete="on">
					<span class="login100-form-title">
						অ্যাডমিন লগইন
					</span>
					
					<div class="wrap-input100 validate-input">
						<input class="input100 <?php if(isset($input_error['username'])){echo $input_error['username'];}?>" type="text" name="username" placeholder="ইউজারনেম">

                        <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100 <?php if(isset($input_error['password'])){echo $input_error['password'];}?>"  type="password" name="password" placeholder="পাসওয়ার্ড">

             

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
										
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
							লগইন
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							ভুলে গেছেন
						</span>
						<a class="txt2" href="admin/forgot_password">
							পাসওয়ার্ড?
						</a>
					</div>
				</form>
                </div>
    
</body>
</html>