<?php
	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if(isset($_POST['submit'])){
		//echo "Works";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== ""){
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill out the required fields.";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Panel Login</title>
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>
	<?php if(!empty($message)){ echo $message;} ?>
	<form class="form" action="admin_login.php" class="input" method="post">
		<label>Username:</label>
		<input type="text" name="username" class="input" value="">
		<br>
		<label>Password</label>
		<input type="password" name="password" class="input" value="">
		<br><br>
		<input type="submit" name="submit" class="sub" value="Sign In">
	</form>

</body>
</html>
