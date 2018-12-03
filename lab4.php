<?php
	include ('server.php');
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Lab4</title>
		<link rel="stylesheet" type="text/css" href="lab4.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<meta charset="utf-8">
	</head>

	<body>
		<script src="lab4.js"></script>

		<fieldset>
			<legend class="boxName" align="center">
				Registration Form
			</legend>

			<form method="post" action="lab4.php">
				<?php include('errors.php'); ?>

				<div class="firstBloc">
					<label class="labblock">Full name :</label>
					<input type="text" id="name" name="fname">
					<label id="result1"></label>
				</div>

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

				<div class="otherBloc">
					<label class="labblock">Retype password :</label>
					<input type="password" id="repass" name="repass">
					<label id="result4"></label>
				</div>


				<div class="submitBttn">
					<button type="submit" name="register">Sign Up</button>
				</div>

				<p>
					Already a member ? <a href="lab4a.php">Log in</a>
				</p>
			</form>
		</fieldset>

	</body>
</html>
