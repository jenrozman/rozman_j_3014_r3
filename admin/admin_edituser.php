<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	$id = $_SESSION['user_id'];
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);
	//echo $info;

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User</title>
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>
	<h2>Edit User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post">
		<label>First Name:</label>
		<input type="text" name="fname" class="input" value="<?php echo $info['user_fname'];  ?>"><br><br>
		<label>Username:</label>
		<input type="text" name="username" class="input" value="<?php echo $info['user_name'];  ?>"><br><br>
		<label>Password:</label>
		<input type="text" name="password" class="input" value="<?php echo $info['user_pass'];  ?>"><br><br>
		<label>Email:</label>
		<input type="text" name="email" class="input" value="<?php echo $info['user_email'];  ?>"><br><br>
		<input type="submit" name="submit" class="sub" value="Edit Account">
	</form>
	<a href="admin_index.php">Return to your account page</a>
</body>
</html>
