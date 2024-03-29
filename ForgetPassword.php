<?php 

require_once 'Init.php';
require_once 'navbar.php';
require_once 'Function.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email = $_POST['email'];
	$_SESSION['email'] = $email;
	$check = Forget($email);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register Page</title>
	<link rel="stylesheet" href="./style/login.css">
	<link class="pgcss" rel="stylesheet" href="./pageloading.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="./js.js"></script>
	<link class="pgcss" rel="stylesheet" href="./pageloading.css">
	<script src="./loading.js"></script>
</head>
<body>
	<div class="container">
		<div class="login-form">
		<form action="" method="POST" role="form">
		<h3>Reset Your Password</h3>
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" name ="email" id="" placeholder="John@yahoo.com.vn">
			</div>
		<button type="submit" class="btn btn-primary">Continue</button>
	</form>
		<?php if(($_SERVER['REQUEST_METHOD'] == 'POST') && $check == 0): ?>
		<div class="alert alert-danger" role="alert">
		  Vui lòng điền email ..
		</div>
		<?php elseif(($_SERVER['REQUEST_METHOD'] == 'POST') && $check == -1): ?>
		<div class="alert alert-danger" role="alert">
		  Email không tồn tại..
		</div>
		<?php elseif(($_SERVER['REQUEST_METHOD'] == 'POST') && $check == 1): ?>
		<div class="alert alert-success" role="alert">
		 Vui lòng kiểm tra email để đổi lại mật khẩu mới.
		</div>
	<?php endif; ?>
		</div>
	</div>
	
</body>
</html>

