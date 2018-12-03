<?php
	session_start();

	$cookie_name = "logged";

	$fname = $email = $pass1 = $pass2 = "";

	$errors = array();

	$db = mysqli_connect('localhost','root','','clc2015');
	mysqli_set_charset($db,"utf8");

	if (isset($_POST['register'])){
		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$pass1 = $_POST['pass'];
		$pass2 = $_POST['repass'];

		if (empty($fname)){
			array_push($errors, "Full name is required");
		}
		if (empty($email)){
			array_push($errors, "Email is required");
		}
		if (empty($pass1)){
			array_push($errors, "Password is required");
		}
		if ($pass1 != $pass2){
			array_push($errors, "Re-type not match");
		}

		if (count($errors) == 0){
			$pwd = md5($pass1);
			$sql = "INSERT INTO sample_table(fname,email,pwd)
						VALUES ('$fname','$email','$pwd')";
			$rrt = mysqli_query($db, $sql);
			if ($rrt) {
			    echo "Sign up sucessfull!";
			} else {
			    echo "Email is used by other user! Please choose another one!";
			}

		}
	}

	if (isset($_COOKIE[$cookie_name])){
		$temp = $_COOKIE[$cookie_name];
		$query = "SELECT * FROM sessions WHERE ssString='$temp'";
		$result = mysqli_query ($db,$query);
		if (mysqli_num_rows($result) == 1){
			$query_new = "SELECT * FROM sample_table WHERE email='$email'";
			$result_new = mysqli_query ($db,$query_new);
			if (mysqli_num_rows($result_new) == 1) {
				$row = mysqli_fetch_assoc($result_new);
				$_SESSION['email'] = $row["email"];
				$_SESSION['fname'] = $row["fname"];
				$_SESSION['success'] = "Log in successfull!";
			}
		}
	}

	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$_SESSION['check_time'] = time();

		if (empty($email)){
			array_push($errors, "Email is required");
		}
		if (empty($pass)){
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0){
			$pwd = md5($pass);
			echo($pwd);
			$query = "SELECT * FROM sample_table WHERE email='$email' AND pwd='$pwd'";


			$result = mysqli_query ($db,$query);

			if (mysqli_num_rows($result) == 1) {
				$row = mysqli_fetch_assoc($result);

				$_SESSION['email'] = $row["email"];
				$_SESSION['fname'] = $row["fname"];
				$_SESSION['success'] = "Log in successfull!";
				$cookie_value = md5($email);
				$ac_time = time();
				if (!isset($_COOKIE[$cookie_name])){
					setcookie($cookie_name,$cookie_value,time()+30,"/");
					$query_add = "INSERT INTO sessions(ssString,accesstTime,email)
								VALUES ('$cookie_value','$ac_time','$email')";
					mysqli_query ($db,$query_add);
				}
				header ('location: index.php');
			}else{
				array_push($errors, "Wrong email or password ");
			}

		}
	}



	if (isset($_GET['logout'])) {
		session_destroy();
		$temp = $_SESSION['email'];
		$query = "DELETE FROM sessions WHERE email='$temp'";
		mysqli_query ($db,$query);
		unset($_SESSION['email']);
		unset($_SESSION['fname']);
		unset($_SESSION['success']);
		unset($_SESSION['check_time']);
		header('location: lab4a.php');
	}
?>
