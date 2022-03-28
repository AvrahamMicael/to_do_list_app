<?php

    require 'task_controller/connection.php';
    session_start();

    $_SESSION['authenticated'] = false;
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $connection = new Connection();
    $conn = $connection->connect();
    
    $query = "select * from tb_users";

    $stmt = $conn->query($query);
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);

    foreach($users as $user_obj) {
        if($username == $user_obj->username && $password == $user_obj->password) {
            $_SESSION['authenticated'] = true;
            $id_user = $user_obj->id_user;
            break;
        }
    };

    if($_SESSION['authenticated']) header('location: pending_tasks.php');
    else header('location: index.php?authenticated=0');

?>