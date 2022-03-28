<?php

    require 'task_controller/connection.php';
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $connection = new Connection();
    $conn = $connection->connect();

    $query = "select * from tb_users";

    $stmt = $conn->query($query);
    $users = $stmt->fetchAll(PDO::FETCH_OBJ);

    $sameUsername = false;

    foreach($users as $user_obj) {
        if($username == $user_obj->username) {
            $sameUsername = true;
            break;
        }
    };

    if($sameUsername) header('location: signup.php?sameUsername=1');
    else {
        $query = "
            insert into tb_users(username, password) values(:username, :password)
        ";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        header('location: index.php?signup=1');
    }

?>