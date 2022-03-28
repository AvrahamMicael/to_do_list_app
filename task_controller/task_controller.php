<?php

    require 'task_controller/task.model.php';
    require 'task_controller/task.service.php';
    require 'task_controller/connection.php';


    $action = isset($_GET['action']) ? $_GET['action'] : $action;

    if($action == 'create') {

        session_start();

        $task = new Task();
        $task->__set('task', $_POST['task']);
        $task->__set('id_user', $_SESSION['id_user']);
        
        $connection = new Connection();
        
        $taskService = new TaskService($connection, $task);
    
        $taskService->taskCreate();
    
        header('location: new_task.php?added=1');

    } else if($action == 'read') {

        $task = new Task();
        $task->__set('id_user', $_SESSION['id_user']);

        $connection = new Connection();

        $taskService = new TaskService($connection, $task);

        $tasks = $taskService->taskRead();

    } else if($action == 'update') {

        $task = new Task();
        
        $id_test = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
        $task->__set('id', $id_test);

        if(isset($_POST['task'])) $task->__set('task', $_POST['task']);
        else $task->__set('status', $_GET['status']);

        $connection = new Connection();

        $taskService = new TaskService($connection, $task);

        $taskService->taskUpdate(isset($_GET['status']), $_GET['page']);

    } else if ($action == 'delete') {

        $task = new Task();
        $task->__set('id', $_GET['id']);

        $connection = new Connection();

        $taskService = new TaskService($connection, $task);

        $taskService->taskDelete($_GET['page']);
        
    }