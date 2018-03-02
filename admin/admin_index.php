<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
<link rel="stylesheet" href="css/main.css">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>
	<h2>Hello <?php echo $_SESSION['user_name'];?>!</h2>
	<a href="admin_createuser.php">Create User</a>
	<a href="admin_edituser.php">Edit User</a>
	<a href="admin_deleteuser.php">Delete User</a>
	<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>
