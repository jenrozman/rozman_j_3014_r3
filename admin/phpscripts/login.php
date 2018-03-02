<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		//$crypted = md5($password); //cryptpw-fran
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";//has crpt in frans
		$user_set = mysqli_query($link, $loginstring);
		//echo mysqli_num_rows($user_set);
		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name']= $founduser['user_fname'];

						if($founduser['user_firstlogin'] === 'yes'){

								if(mysqli_query($link, $loginstring)){
									$update = "UPDATE tbl_user SET user_ip = '{$ip}' WHERE user_id={$id}";
									$updatequery = mysqli_query($link, $update);
								}
							redirect_to("admin_edituser.php");
						}else{

			if(mysqli_query($link, $loginstring)){
				$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}  SET user_firstlogin TIME=NOW()";
				$updatequery = mysqli_query($link, $update);
			}
			redirect_to("admin_index.php");
		}
		}else{
			$message = "Please check your spelling";
			return $message;
		}

		mysqli_close($link);

}


?>
