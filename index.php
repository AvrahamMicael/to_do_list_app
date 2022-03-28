<?php

	session_start();
	if(isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) header('location: pending_tasks.php');

?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type ="image/x-icon" href="img/logo.png">
		<title>To Do List App</title>

		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					To Do List App
				</a>
			</div>
		</nav>

		<div class="container app d-flex justify-content-center">
			<div class="page">
				<h3 class="text-info">Login</h3>
				<form class="form-group" action="login_validation.php" method="post">
					<label>Username:</label><br>
					<input class="form-control" type="text" name="username">
					<label>Password:</label><br>
					<input class="form-control" type="password" name="password">

					<?php if(isset($_GET['authenticated']) && $_GET['authenticated'] == 0) { ?>

						<div class="text-danger my-2">Incorrect username or password</div>

					<?php } else if(isset($_GET['signup']) && $_GET['signup'] == 1) { ?>

						<div class="text-success my-2">Successfully signed up</div>

					<?php } else { ?>

						<br>

					<?php }; ?>

					<div class="d-flex justify-content-center">
						<button type="submit" class="btn btn-info">Login</button>
					</div>
				</form>
				<hr>
				<div class="lead d-flex justify-content-center little-small">Doesn't have an account?</div>
				<br>
				<div class="d-flex justify-content-center">
					<a href="signup.php" class="btn btn-success">Sign Up</a>
				</div>
			</div>
		</div>
	</body>
</html>