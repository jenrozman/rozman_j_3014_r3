<?php

	function createUser($fname, $username, $password, $email, $lvllist){
		include('connect.php');
		$userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}', '{$email}', NULL, '{$lvllist}', 'no', 'yes' )";
		//echo $userstring;
		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			redirect_to('admin_index.php');
		}else{
			$message = "Please try again, there was an error.";
			return $message;
		}
		mysqli_close($link);
	}

	function editUser($id, $fname, $username, $password, $email) {
		include('connect.php');

		$updatestring = "UPDATE tbl_user SET user_fname='{$fname}', user_name='{$username}', user_pass='{$password}', user_email='{$email}', user_firstlogin='no' WHERE user_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);
		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "Maybe you should have a talk with your boss...";
			return $message;
		}

		mysqli_close($link);
	}

	function deleteUser($id) {
		include('connect.php');
		$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery) {
			redirect_to("../admin_index.php");
		}else{
			$message = "In the words of Jean Paul Sartre, Au revoir, gopher";
			return $message;
		}
		mysqli_close($link);
	}
?>
