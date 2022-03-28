<?php

	require 'access_validator.php';

	$action = 'read';
	require 'task_controller.php';

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

		<script src="app.js"></script>

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

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a class="d-block" href="#">Pending</a></li>
						<li class="list-group-item"><a class="d-block" href="new_task.php">New</a></li>
						<li class="list-group-item"><a class="d-block" href="all_tasks.php">All</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container page">
						<div class="row">
							<div class="col">
								<h4>Pending Tasks</h4>
								<hr>

								<?php

									$amount = 0;
								
									foreach($tasks as $task_data) {
										$task = $task_data->task;
										$id = $task_data->id;
										$status = $task_data->status;

										$user = '';

										if($_SESSION['id_user'] == 1) {
											$user = "<em>[$task_data->username-$task_data->id_user]</em>";
										}

										if($status == 'Pending') {
											$amount++

								?>

									<div class="row mb-3 d-flex align-items-center">
										<div class="col-sm-9" id="task_<?= $id ?>">
											<?= $task ?> <?= $user ?>
										</div>
										<div class="col-sm-3 mt-2 d-flex justify-content-around">
											<a href="#"><i class="fas fa-trash-alt fa-lg text-danger" onclick="deleteTask(<?= $id ?>, 'pending_tasks.php')"></i></a>
											<a href="#"><i class="fas fa-edit fa-lg text-info" onclick="editTask(<?= $id ?>, '<?= $task ?>', 'pending_tasks.php')"></i></a>
											<a href="#"><i class="fas fa-check-square fa-lg text-success" onclick="finishTask(<?= $id ?>, '<?= $status ?>', 'pending_tasks.php')"></i></a>
										</div>
									</div>

								<?php };};
								
									if($amount == 0) {
								
								?>

									<h5 class="text-center display-5 text-black-50 mb-0">
										You do not have pending tasks. Try creating one!
									</h5>

								<?php }; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>