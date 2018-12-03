<?php include('server.php');
if (isset($_SESSION['fname'])){
	header('location: index.php');
}
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Lab4b</title>
		<link rel="stylesheet" type="text/css" href="lab4.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<meta charset="utf-8">
	</head>

	<body>
		<fieldset>
			<legend class="boxName" align="center">
				Login
			</legend>

			<form method="post" action="lab4a.php">
				<?php include('errors.php');?>
				<div class="otherBloc">
					<label class="labblock">Email :</label>
					<input type="text" id="email" name="email">
					<label id="result2"></label>
				</div>

				<div class="otherBloc">
					<label class="labblock">Password :</label>
					<input type="password" id="pass" name="pass">
					<label id="result3"></label>
				</div>

				<div class="submitBttn">
					<button type="submit" name="login">Log in</button>
				</div>

				<p>
					Not yet a member ? <a href="lab4.php">Sign up</a>
				</p>
			</form>
		</fieldset>

	</body>
</html>
