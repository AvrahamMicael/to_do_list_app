<?php

	require 'access_validator.php';

?>
<html>
	<head>
		<meta charset="utf-8" />
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
				<ul class="navbar-nav ml-auto">
                	<li class="nav-item"><a href="logoff.php" class="nav-link">Logoff</a></li>
            	</ul>
			</div>
		</nav>

		<?php if(!empty($_GET['added']) && $_GET['added'] == 1) { ?>

			<div class="bg-success pt-2 text-white d-flex justify-content-center">
				<h5>Task successfully added!</h5>
			</div>

		<?php }; ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a class="d-block" href="pending_tasks.php">Pending</a></li>
						<li class="list-group-item active"><a class="d-block" href="#">New</a></li>
						<li class="list-group-item"><a class="d-block" href="all_tasks.php">All</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container page">
						<div class="row">
							<div class="col">
								<h4>New Task</h4>
								<hr />

								<form method="post" action="task_controller.php?action=create">
									<div class="form-group">
										<label>Task description:</label>
										<input type="text" class="form-control" name="task" placeholder="Ex.: Buy milk">
									</div>

									<button type="submit" class="btn btn-success">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>