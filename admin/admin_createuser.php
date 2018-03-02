<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$lvllist = $_POST['lvllist'];
		if(empty($lvllist)){
			$message = "Please select a user level.";
		}else{
			$result = createUser($fname, $username, $password, $email, $lvllist);
			$message = $result;
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create User</title>
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>
	<h2>Create User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_createuser.php" method="post">
		<label>First Name:</label>
		<input type="text" name="fname"  class="input" value=""><br><br>
		<label>Username:</label>
		<input type="text" name="username"  class="input" value=""><br><br>
		<label>Password:</label>
		<input type="text" name="password"  class="input" value=""><br><br>
		<label>Email:</label>
		<input type="text" name="email"  class="input" value=""><br><br>
		<select name="lvllist" class="select">
			<option value="">Select User Level</option>
			<option value="2">Web Admin</option>
			<option value="1">Web Master</option>
		</select><br><br>
		<input type="submit" class="sub" name="submit" value="Create User">
	</form>
</body>
</html>
