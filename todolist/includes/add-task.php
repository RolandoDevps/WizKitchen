<?php
    $task_name = strip_tags($_POST['new-task"'] );
    $date = date('Y-m-d');
    $time = date('H:i:s');

    require("connect.php");

        $stmt = $pdo->prepare('INSERT INTO tasks(task, date, time) VALUE(:task)');
        $stmt->bindValue(':id', $task_id);
        $resultat = $stmt->execute();

    var_dump($resultat);die();
?>