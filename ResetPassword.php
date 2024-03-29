<?php 
require_once 'Init.php';
require_once 'Function.php';
require_once 'navbar.php';

if($_SESSION['email'] !="" && $_SESSION['status'] == 1)
{
	header("Location:Login.php");
}
if($_SESSION['email'] =="")
{
	header("Location:Login.php");
}

	$check = -5;
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email = $_SESSION['email'];
	$password = $_POST['newpass'];
	$confirm = $_POST['confirmpass'];

	if($password==$confirm)
	{
		$check = ResetPassword($email,$password);
	}
	else
	{
		$check = -3;
	}
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>RESET PASSWORD</title>
	<link rel="stylesheet" href="./style/login.css">
	<link class="pgcss" rel="stylesheet" href="./pageloading.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js.js"></script>
</head>
<body>
	<div class="container">
		<div class="login-form">
		<form action="" method="POST" role="form">
		<h3>Reset password</h3>
			<div class="form-group">
				<label for="">New Password</label>
				<input type="text" class="form-control" name ="newpass" id="newpass" placeholder="New Password">
			</div>
			<div class="form-group">
				<label for="">Confirm Password</label>
				<input type="password" class="form-control" name ="confirmpass" id="confirmpass" placeholder="Confirm Password">
			</div>	
		<button type="submit" class="btn btn-primary">Change password</button>

	
			
	<?php if(($_SERVER['REQUEST_METHOD'] == 'POST') && $check == 1): ?>
			<?php header("Refresh: 6;url=Login.php"); ?>
			<div class="alert alert-success" role="alert">;
			Đổi mật khẩu thành công. Vui lòng chờ 1 lát - hoặc ấn vào đây để <a href="Login.php">đăng nhập</a>
			</div>
		<?php elseif(($_SERVER['REQUEST_METHOD'] == 'POST') && $check == 0): ?>
			<div class="alert alert-danger" role="alert">
			  Vui lòng điền đầy đủ password..
			</div>
		<?php elseif(($_SERVER['REQUEST_METHOD'] == 'POST') && $check == -1): ?>
			<div class="alert alert-danger" role="alert">
			Email không tồn tại
			</div>
		<?php elseif(($_SERVER['REQUEST_METHOD'] == 'POST') && $check == -3): ?>
			<div class="alert alert-danger" role="alert">
			Xác nhận lại mật khẩu sai.
			</div>
		<?php endif; ?>
		</div>
	</form>
	</div>
	
</body>
</html>