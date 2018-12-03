<?php include('server.php');
	if (empty($_SESSION['fname'])){
		header('location: lab4a.php');
	}elseif((time()-$_SESSION['check_time'])>5){
		header("location:index.php?logout='1'");
	}else{
		$_SESSION['check_time'] = time();
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<div class="content">
		<?php if (isset($_SESSION['success'])): ?>
			<div class="error success">
				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<?php if (isset($_SESSION['fname'])): ?>
			<p>Welcome <strong><?php echo $_SESSION['fname']; ?></strong></p>
			<!-- <?php if (isset($_COOKIE[$cookie_name])): ?>
				<p>Your email is <?php echo $_COOKIE[$cookie_name] ; ?></p>
			<?php endif ?> -->
			<p> <a href="index.php?logout='1'" style="color: red;">Logout</a>
		<?php endif ?>
	</div>

</body>
</html>
